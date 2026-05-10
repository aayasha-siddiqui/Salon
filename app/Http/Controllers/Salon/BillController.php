<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Customer;        // Add this
use App\Models\CustomerLedger;  // Add this
use Illuminate\Support\Facades\Http;

class BillController extends Controller
{

    /* =========================
       Bill List
    ========================== */

    public function index(Request $request)
    {
        $query = Bill::with('items.service','items.staff', 'customer'); // Add 'customer'

        if($request->search){
            $query->where('customer_name','like','%'.$request->search.'%')
                  ->orWhere('bill_number','like','%'.$request->search.'%');
        }

        if($request->from_date){
            $query->whereDate('bill_date','>=',$request->from_date);
        }

        if($request->to_date){
            $query->whereDate('bill_date','<=',$request->to_date);
        }

        if($request->status){
            $query->where('payment_status',$request->status);
        }

        $bills = $query->latest()->paginate(10);

        return view('salon.billing.index',compact('bills'));
    }

    /* =========================
       Create Bill Page
    ========================== */

    public function create()
    {
        $services = Service::all();
        $staffs   = Staff::all();

        return view('salon.billing.create',
        compact('services','staffs'));
    }

    /* =========================
       Store Bill with Khata System
    ========================== */

    public function store(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required',
            'customer_phone' => 'required',
            'service_id'     => 'required|array',
            'staff_id'       => 'required|array',
            'payment_method' => 'required',
            'paid_amount'    => 'nullable|numeric|min:0'
        ]);

        // ========== STEP 1: Find or Create Customer ==========
        $customer = Customer::firstOrCreate(
            ['phone' => $request->customer_phone],
            [
                'name' => $request->customer_name,
                'total_outstanding' => 0,
                'total_paid' => 0,
                'total_billed' => 0,
                'total_visits' => 0
            ]
        );

        // Update customer name if changed
        if ($customer->name != $request->customer_name) {
            $customer->name = $request->customer_name;
            $customer->save();
        }

        // Get previous outstanding balance
        $previousOutstanding = $customer->total_outstanding;

        // ========== STEP 2: Generate Invoice ==========
        $invoiceNumber = 'INV-'.date('Ymd').'-'.rand(1000,9999);

        $bill = Bill::create([
            'customer_id'    => $customer->id,           // Add customer_id
            'bill_number'    => $invoiceNumber,
            'customer_name'  => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'bill_date'      => now(),
            'subtotal'       => 0,
            'discount'       => $request->discount ?? 0,
            'total_amount'   => 0,
            'paid_amount'    => $request->paid_amount ?? 0,
            'remaining_amount' => 0,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status ?? 'pending'
        ]);

        // ========== STEP 3: Add Services ==========
        $subtotal = 0;

        foreach ($request->service_id as $key => $serviceId) {
            $service = Service::findOrFail($serviceId);
            BillItem::create([
                'bill_id'   => $bill->id,
                'service_id'=> $serviceId,
                'staff_id'  => $request->staff_id[$key],
                'price'     => $service->price
            ]);
            $subtotal += $service->price;
        }

        // ========== STEP 4: Calculate Totals ==========
        $discount = $request->discount ?? 0;
        $finalTotal = $subtotal - $discount;
        
        if($finalTotal < 0){
            $finalTotal = 0;
        }
        
        $paidAmount = $request->paid_amount ?? 0;
        $remainingAmount = max(0, $finalTotal - $paidAmount);
        
        // Auto-update payment status
        if ($paidAmount >= $finalTotal) {
            $paymentStatus = 'paid';
        } elseif ($paidAmount > 0) {
            $paymentStatus = 'partial';
        } else {
            $paymentStatus = 'pending';
        }

        // Update bill with calculated values
        $bill->update([
            'subtotal'        => $subtotal,
            'total_amount'    => $finalTotal,
            'paid_amount'     => $paidAmount,
            'remaining_amount' => $remainingAmount,
            'payment_status'  => $paymentStatus
        ]);

        // ========== STEP 5: Update Customer Khata ==========
        $customer->total_billed += $finalTotal;
        $customer->total_paid += $paidAmount;
        $customer->total_visits += 1;
        $customer->last_visit = now();
        $customer->total_outstanding = $customer->total_billed - $customer->total_paid;
        $customer->save();

        // ========== STEP 6: Add Ledger Entries ==========

        // Ledger entry for new bill
        CustomerLedger::create([
            'customer_id'       => $customer->id,
            'bill_id'           => $bill->id,
            'transaction_type'  => 'bill',
            'amount'            => $finalTotal,
            'previous_balance'  => $previousOutstanding,
            'new_balance'       => $previousOutstanding + $finalTotal,
            'notes'             => "New bill #{$bill->bill_number} generated"
        ]);

        // If payment received, add payment entry
        if ($paidAmount > 0) {
            CustomerLedger::create([
                'customer_id'       => $customer->id,
                'bill_id'           => $bill->id,
                'transaction_type'  => 'payment',
                'amount'            => $paidAmount,
                'previous_balance'  => $previousOutstanding + $finalTotal,
                'new_balance'       => $customer->total_outstanding,
                'payment_method'    => $request->payment_method,
                'notes'             => "Payment received for bill #{$bill->bill_number}"
            ]);
        }

        // ========== STEP 7: WhatsApp Message with Khata Info ==========
        $message = "🧾 *A1 Makeover Salon*\n\n";
        $message .= "📋 *Invoice: {$bill->bill_number}*\n";
        $message .= "👤 Customer: {$bill->customer_name}\n";
        $message .= "📞 Phone: {$bill->customer_phone}\n";
        $message .= "━━━━━━━━━━━━━━━━━━\n";
        $message .= "💰 Total Bill: ₹{$finalTotal}\n";
        $message .= "💳 Paid: ₹{$paidAmount}\n";
        
        if ($remainingAmount > 0) {
            $message .= "⏳ *Remaining: ₹{$remainingAmount}*\n";
        }
        
        $message .= "━━━━━━━━━━━━━━━━━━\n";
        
        if ($customer->total_outstanding > 0) {
            $message .= "📊 *Total Outstanding: ₹{$customer->total_outstanding}*\n";
            $message .= "⚠️ Please clear previous dues!\n";
        } else {
            $message .= "✅ No Dues - Thank You!\n";
        }
        
        $message .= "━━━━━━━━━━━━━━━━━━\n";
        $message .= "✨ Visit again! 💇‍♀️";

        $phone = $bill->customer_phone;

        // WhatsApp API (Uncomment when ready)
        // Http::post('WHATSAPP_API_URL',[
        //     'phone' => $phone,
        //     'message' => $message
        // ]);

        // ========== STEP 8: Redirect with Success Message ==========
        $outstandingMsg = $customer->total_outstanding > 0 
            ? " (Outstanding: ₹{$customer->total_outstanding})" 
            : "";

        return redirect()
            ->route('billing.show', $bill->id)
            ->with('success', "✅ Bill Generated Successfully{$outstandingMsg}");
    }

    /* =========================
       Show Bill
    ========================== */

    public function show($id)
    {
        $bill = Bill::with([
            'items.service',
            'items.staff',
            'customer'  // Add this
        ])->findOrFail($id);

        // Get customer's recent outstanding if any
        if ($bill->customer) {
            $bill->customer_outstanding = $bill->customer->total_outstanding;
        }

        return view('salon.billing.show', compact('bill'));
    }

    /* =========================
       Update Payment Status
    ========================== */

    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'payment_status' => 'required'
        ]);

        $oldStatus = $bill->payment_status;
        $oldPaidAmount = $bill->paid_amount;

        $bill->update([
            'payment_status' => $request->payment_status
        ]);

        // If status changed to paid, update customer khata
        if ($request->payment_status == 'paid' && $oldStatus != 'paid') {
            $remainingToPay = $bill->remaining_amount;
            
            if ($remainingToPay > 0 && $bill->customer) {
                $customer = $bill->customer;
                $previousOutstanding = $customer->total_outstanding;
                
                // Update bill
                $bill->paid_amount = $bill->total_amount;
                $bill->remaining_amount = 0;
                $bill->save();
                
                // Update customer
                $customer->total_paid += $remainingToPay;
                $customer->total_outstanding -= $remainingToPay;
                $customer->save();
                
                // Ledger entry
                CustomerLedger::create([
                    'customer_id' => $customer->id,
                    'bill_id' => $bill->id,
                    'transaction_type' => 'payment',
                    'amount' => $remainingToPay,
                    'previous_balance' => $previousOutstanding,
                    'new_balance' => $customer->total_outstanding,
                    'notes' => "Payment completed for bill #{$bill->bill_number}"
                ]);
            }
        }

        return back()->with('success', 'Payment Status Updated');
    }

    /* =========================
       Delete Bill
    ========================== */

    public function destroy(Bill $billing)
    {
        // Update customer khata before deleting
        if ($billing->customer) {
            $customer = $billing->customer;
            
            // Reverse the effects of this bill
            $customer->total_billed -= $billing->total_amount;
            $customer->total_paid -= $billing->paid_amount;
            $customer->total_visits -= 1;
            $customer->total_outstanding = $customer->total_billed - $customer->total_paid;
            $customer->save();
            
            // Delete ledger entries for this bill
            CustomerLedger::where('bill_id', $billing->id)->delete();
        }

        $billing->items()->delete();
        $billing->delete();

        return redirect()
            ->route('billing.index')
            ->with('success', 'Bill Deleted Successfully');
    }

    /* =========================
       Customer Khata Page
    ========================== */

    public function customerKhata(Customer $customer)
    {
        $bills = $customer->bills()->latest()->paginate(10);
        $ledgers = $customer->ledgers()->with('bill')->latest()->take(50)->get();
        
        return view('salon.customers.khata', compact('customer', 'bills', 'ledgers'));
    }

    /* =========================
       Collect Outstanding Payment
    ========================== */

    public function collectPayment(Request $request, Customer $customer)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1|max:' . $customer->total_outstanding,
            'payment_method' => 'required'
        ]);
        
        $previousOutstanding = $customer->total_outstanding;
        
        // Update customer
        $customer->total_paid += $request->amount;
        $customer->total_outstanding -= $request->amount;
        $customer->save();
        
        // Find oldest unpaid bill and update it
        $oldestUnpaidBill = $customer->bills()
            ->where('payment_status', '!=', 'paid')
            ->where('remaining_amount', '>', 0)
            ->oldest()
            ->first();
        
        if ($oldestUnpaidBill) {
            $billRemaining = $oldestUnpaidBill->remaining_amount;
            
            if ($request->amount >= $billRemaining) {
                $oldestUnpaidBill->paid_amount = $oldestUnpaidBill->total_amount;
                $oldestUnpaidBill->remaining_amount = 0;
                $oldestUnpaidBill->payment_status = 'paid';
            } else {
                $oldestUnpaidBill->paid_amount += $request->amount;
                $oldestUnpaidBill->remaining_amount -= $request->amount;
                $oldestUnpaidBill->payment_status = 'partial';
            }
            $oldestUnpaidBill->save();
        }
        
        // Ledger entry
        CustomerLedger::create([
            'customer_id' => $customer->id,
            'transaction_type' => 'payment',
            'amount' => $request->amount,
            'previous_balance' => $previousOutstanding,
            'new_balance' => $customer->total_outstanding,
            'payment_method' => $request->payment_method,
            'notes' => 'Outstanding payment collected'
        ]);
        
        return back()->with('success', "₹{$request->amount} payment collected successfully");
    }

    /* =========================
       Check Customer by Phone (AJAX)
    ========================== */

    public function checkCustomer($phone)
    {
        $customer = Customer::where('phone', $phone)->first();
        
        if ($customer) {
            return response()->json([
                'exists' => true,
                'id' => $customer->id,
                'name' => $customer->name,
                'outstanding' => $customer->total_outstanding,
                'total_visits' => $customer->total_visits,
                'last_visit' => $customer->last_visit ? $customer->last_visit->format('d M Y') : null
            ]);
        }
        
        return response()->json(['exists' => false]);
    }
}