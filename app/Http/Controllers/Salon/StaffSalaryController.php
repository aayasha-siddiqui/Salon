<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\BillItem;
use App\Models\StaffSalary;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class StaffSalaryController extends Controller
{

/*
|--------------------------------------------------------------------------
| 1️⃣ Monthly Salary Report
|--------------------------------------------------------------------------
*/
public function staffDetails($id)
{
    // staff
    $staff = Staff::findOrFail($id);

    // staff services with bill + service
    $services = BillItem::with(['service','bill'])
        ->where('staff_id',$id)
        ->latest()
        ->get();

    return view(
        'salon.salary.staff-details',
        compact('staff','services')
    );
}

public function index(Request $request)
{
    $query = StaffSalary::with('staff');

    // From Month Filter
    if ($request->filled('from_month')) {
        $from = \Carbon\Carbon::createFromFormat('Y-m', $request->from_month)
                ->startOfMonth();

        $query->whereDate('from_date', '>=', $from);
    }

    // To Month Filter
    if ($request->filled('to_month')) {
        $to = \Carbon\Carbon::createFromFormat('Y-m', $request->to_month)
              ->endOfMonth();

        $query->whereDate('to_date', '<=', $to);
    }

    // IMPORTANT: query se data lo
    $salaries = $query->latest()->get();

    $grandTotalSalary  = 0;
    $grandTotalService = 0;

    foreach ($salaries as $salary) {

        $billItems = BillItem::where('staff_id',$salary->staff_id)
            ->whereBetween('created_at',[
                \Carbon\Carbon::parse($salary->from_date)->startOfDay(),
                \Carbon\Carbon::parse($salary->to_date)->endOfDay()
            ])
            ->get();

        $salary->service_total = $billItems->sum('price');
        $salary->service_count = $billItems->count();

        $grandTotalSalary  += $salary->final_salary;
        $grandTotalService += $salary->service_total;
    }

    return view('salon.salary.index',compact(
        'salaries',
        'grandTotalSalary',
        'grandTotalService'
    ));
}
/*
|--------------------------------------------------------------------------
| 2️⃣ Open Generate Salary Page
|--------------------------------------------------------------------------
*/

public function generateForm()
{
    $staffs = Staff::all();
    return view('salon.salary.generate',compact('staffs'));
}

public function calculate(Request $request)
{
    $request->validate([
        'staff_id'=>'required',
         'from_date'=>'required|date',
    'to_date'=>'required|date'
    ]);

    $staff = Staff::findOrFail($request->staff_id);

  $from = $request->from_date;
$to   = $request->to_date;

   $billItems = BillItem::where('staff_id',$staff->id)
    ->whereBetween('created_at',[$from,$to])
    ->get();

    $totalService = $billItems->sum('price');
    $totalJobs = $billItems->count();

    if($staff->salary_type == 'fixed'){
        $baseSalary = $staff->fixed_salary;
        $commission = 0;
    }else{
        $commission = $staff->commission_percent ?? 10;
        $baseSalary = ($totalService * $commission)/100;
    }

    return view('salon.salary.generate',[
        'staffs'=>Staff::all(),
        'selectedStaff'=>$staff,
       'from_date'=>$request->from_date,
'to_date'=>$request->to_date,
        'totalService'=>$totalService,
        'totalJobs'=>$totalJobs,
        'commission'=>$commission,
        'baseSalary'=>$baseSalary
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'staff_id'  => 'required',
        'from_date' => 'required|date',
        'to_date'   => 'required|date'
    ]);

    $staff = Staff::findOrFail($request->staff_id);

    $from = $request->from_date;
    $to   = $request->to_date;
 $exists = StaffSalary::where('staff_id',$staff->id)
        ->where('from_date',$from)
        ->where('to_date',$to)
        ->exists();
    $billItems = BillItem::where('staff_id',$staff->id)
        ->whereBetween('created_at',[$from,$to])
        ->get();

    $totalServiceAmount = $billItems->sum('price');

    if(strtolower($staff->salary_type) == 'fixed'){
        $commissionAmount = 0;
        $baseSalary = $staff->fixed_salary;
    } else {
        $commissionPercent = $staff->commission_percent ?? 0;
        $commissionAmount = ($totalServiceAmount * $commissionPercent) / 100;
        $baseSalary = $commissionAmount;
    }

    $bonus = $request->bonus ?? 0;
    $finalSalary = $baseSalary + $bonus;

    StaffSalary::updateOrCreate(
        [
            'staff_id'  => $staff->id,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ],
        [
            'total_service_amount' => $totalServiceAmount,
            'commission_amount'    => $commissionAmount,
            'bonus'                => $bonus,
            'final_salary'         => $finalSalary,
        ]
    );
 if($exists){
        return redirect()
        ->route('salary.index')
        ->with('warning','⚠️ Salary already generated for this period. It has been updated.');
    }

    return redirect()
        ->route('salary.index')
        ->with('success','✅ Salary Generated Successfully');
}
public function destroy($id)
{
    StaffSalary::findOrFail($id)->delete();

    return back()->with('success','Salary Deleted');
}
public function edit($id)
{
    $salary = StaffSalary::findOrFail($id);

    $staff = Staff::findOrFail($salary->staff_id);

    return view(
        'salon.salary.edit',
        compact('salary','staff')
    );
}
public function showSlip($id)
{
   $salary = Salary::with('staff')->findOrFail($id);

    $pdf = Pdf::loadView('salon.salary.slip', compact('salary'));

    return $pdf->download('salary-slip-'.$salary->id.'.pdf');
}
public function update(Request $request,$id)
{
    $salary = StaffSalary::findOrFail($id);

    $bonus = $request->bonus ?? 0;

    // base salary nikalna
    if($salary->commission_amount){
        $baseSalary = $salary->commission_amount;
    }else{
        $staff = Staff::find($salary->staff_id);
        $baseSalary = $staff->fixed_salary;
    }

    $finalSalary = $baseSalary + $bonus;

    $salary->update([
        'bonus'=>$bonus,
        'final_salary'=>$finalSalary
    ]);

    return redirect()
    ->route('salary.index')
    ->with('success','Salary Updated Successfully');
}
} 