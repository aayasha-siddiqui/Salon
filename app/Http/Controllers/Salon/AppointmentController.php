<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;

class AppointmentController extends Controller
{

    // 📋 Appointment List
    public function index()
    {
        $appointments = Appointment::with(['services','staff'])
            ->latest()
            ->get();

        return view(
            'salon.appointments.index',
            compact('appointments')
        );
    }


    // ➕ Create Page
    public function create()
    {
        $services = Service::all();
        $staffs   = Staff::all();

        return view(
            'salon.appointments.create',
            compact('services','staffs')
        );
    }


    // 💾 Store Appointment
    public function store(Request $request)
    {

        $request->validate([
            'customer_name'=>'required',
            'customer_phone'=>'required',
            'service_ids'=>'required',
            'staff_id'=>'required'
        ]);

        // Selected services
        $services = Service::whereIn(
            'id',
            $request->service_ids
        )->get();

        // Total calculate
        $total = $services->sum('price');

        // Discount
        $discount = $request->discount ?? 0;

        $final = $total - ($total * $discount / 100);


        // Create appointment
        $appointment = Appointment::create([
            'customer_name' => $request->customer_name,
            'customer_phone'=> $request->customer_phone,
            'staff_id'      => $request->staff_id,
            'appointment_date'=> $request->appointment_date,
            'appointment_time'=> $request->appointment_time,
            'discount'      => $discount,
            'amount'        => $final,
            'payment_status'=> 'pending',
            'status'        => 'booked'
        ]);


        // Save services
        $appointment->services()
            ->sync($request->service_ids);


        return redirect()
        ->route('appointments.index')
        ->with('success','✅ Appointment Booked');

    }


    // ✏ Edit

public function edit($id)
{
    $appointment = Appointment::with('services')->findOrFail($id);

    $services = Service::all();   // services
    $staffs   = Staff::all();     // staffs

    return view('salon.appointments.edit', compact('appointment','services','staffs'));
}


    // 🔄 Update Status
    public function update(Request $request, Appointment $appointment)
{
    $request->validate([
        'status' => 'required',
        'payment_status' => 'required'
    ]);

    $appointment->update([
        'payment_status' => $request->payment_status,
        'status' => $request->status
    ]);

    return redirect()
        ->route('appointments.index')
        ->with('success','✅ Updated');
}

    // 🗑 Delete
    public function destroy(Appointment $appointment)
    {

        $appointment->delete();

        return back()
        ->with('success','Deleted');

    }

}