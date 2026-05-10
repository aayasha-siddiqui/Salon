<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\BillItem;
use App\Models\StaffSalary;

class SalaryGenerateController extends Controller
{

    // ✅ Salary Report
    public function index()
    {
        $salaries = StaffSalary::with('staff')
                    ->latest()
                    ->get();

        return view('salon.salary.index',
            compact('salaries'));
    }


    // ✅ Generate Page
    public function create()
    {
        $staffs = Staff::all();
        return view('salon.salary.create',
            compact('staffs'));
    }


    // ✅ Store Salary
    public function store(Request $request)
    {
        $staff = Staff::findOrFail($request->staff_id);

        $month = $request->month;

        $totalService = BillItem::where('staff_id',$staff->id)
            ->whereMonth('created_at',
                date('m',strtotime($month)))
            ->whereYear('created_at',
                date('Y',strtotime($month)))
            ->sum('price');

        // Salary Logic
        if($staff->salary_type == 'fixed'){
            $salary = $staff->fixed_salary;
        }else{
            $salary =
            ($totalService *
            $staff->commission_percent)/100;
        }

        $bonus = $request->bonus ?? 0;

        $finalSalary = $salary + $bonus;

        StaffSalary::create([
            'staff_id'=>$staff->id,
            'month'=>$month,
            'service_total'=>$totalService,
            'salary_amount'=>$salary,
            'bonus'=>$bonus,
            'final_salary'=>$finalSalary
        ]);

        return redirect()
            ->route('salary.index')
            ->with('success','✅ Salary Generated');
    }
}