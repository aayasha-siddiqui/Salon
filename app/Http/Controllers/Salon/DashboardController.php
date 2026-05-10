<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\SalonEnquiry;
use App\Models\StaffSalary;
use App\Models\BillItem;
use Carbon\Carbon;

class DashboardController extends Controller
{

public function index()
{

/* ========= COUNTS ========= */

$totalStaff        = Staff::count();
$totalServices     = Service::count();
$totalAppointments = Appointment::count();
$totalEnquiries    = SalonEnquiry::count();

/* ========= INCOME ========= */

$totalIncome = BillItem::sum('price');

$thisMonthIncome =
BillItem::whereMonth('created_at',now()->month)
->sum('price');

/* ========= STAFF SALARY ========= */

$totalSalary =
StaffSalary::sum('final_salary');

/* ========= CHART DATA ========= */

$months=[];
$incomeData=[];

for($i=5;$i>=0;$i--)
{
$date=Carbon::now()->subMonths($i);

$months[]=$date->format('M');

$incomeData[]=
BillItem::whereYear('created_at',$date->year)
->whereMonth('created_at',$date->month)
->sum('price');
}

/* ========= LATEST ========= */

$latestAppointments=
Appointment::latest()
->take(5)
->get();

$latestEnquiries=
SalonEnquiry::latest()
->take(5)
->get();

return view('salon.dashboard',compact(
'totalStaff',
'totalServices',
'totalAppointments',
'totalEnquiries',
'totalIncome',
'thisMonthIncome',
'totalSalary',
'months',
'incomeData',
'latestAppointments',
'latestEnquiries'
));

}
}