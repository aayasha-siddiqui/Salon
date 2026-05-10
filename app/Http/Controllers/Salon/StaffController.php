<?php

namespace App\Http\Controllers\Salon;
use App\Models\BillItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffSalary;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
class StaffController extends Controller
{
public function show($id)
    {
        // Load staff with all relationships
        $staff = Staff::with([
            'services',
            'salaries' => function($query) {
                $query->latest()->limit(10);
            }
        ])->findOrFail($id);
        
        // ========== EARNINGS CALCULATIONS ==========
        
        // Total earnings from all salaries
        $totalEarnings = staffSalary::where('staff_id', $staff->id)
                              ->sum('final_salary');
        
        // This month's earnings
        $monthEarnings = staffSalary::where('staff_id', $staff->id)
                              ->whereYear('created_at', now()->year)
                              ->whereMonth('created_at', now()->month)
                              ->sum('final_salary');
        
        // Last month's earnings
        $lastMonthEarnings = staffSalary::where('staff_id', $staff->id)
                                   ->whereYear('created_at', now()->subMonth()->year)
                                   ->whereMonth('created_at', now()->subMonth()->month)
                                   ->sum('final_salary');
        
        // ========== SERVICE STATISTICS ==========
        
        // Get all appointments where this staff provided service
        $appointmentItems = BillItem::where('staff_id', $staff->id)
                                    ->with('bill', 'service')
                                    ->get();
        
        // Total services performed
        $totalServicesCount = $appointmentItems->count();
        
        // Unique appointments count
        $appointmentsCount = $appointmentItems->pluck('bill_id')->unique()->count();
        
        // Total service revenue generated
        $totalServiceRevenue = $appointmentItems->sum('price');
        
        // Average earning per service
        $avgEarningPerService = $totalServicesCount > 0 
            ? $totalServiceRevenue / $totalServicesCount 
            : 0;
        
        // ========== SERVICE BREAKDOWN ==========
        
        // Services performed with counts
        $serviceBreakdown = $appointmentItems
            ->groupBy('service_id')
            ->map(function($items, $serviceId) {
                $service = $items->first()->service;
                return [
                    'name' => $service->name ?? 'Unknown',
                    'count' => $items->count(),
                    'revenue' => $items->sum('price')
                ];
            })->values();
        
        // ========== MONTHLY PERFORMANCE ==========
        
        // Last 6 months performance
        $monthlyPerformance = collect(range(5, 0))->map(function($monthsAgo) use ($staff) {
            $date = now()->subMonths($monthsAgo);
            $earnings = staffSalary::where('staff_id', $staff->id)
                             ->whereYear('created_at', $date->year)
                             ->whereMonth('created_at', $date->month)
                             ->sum('final_salary');
            
            $services = BillItem::where('staff_id', $staff->id)
                               ->whereYear('created_at', $date->year)
                               ->whereMonth('created_at', $date->month)
                               ->count();
            
            return [
                'month' => $date->format('M Y'),
                'earnings' => $earnings,
                'services' => $services
            ];
        });
        
        // ========== SALARY HISTORY ==========
        
        $salaryHistory = staffSalary::where('staff_id', $staff->id)
                               ->with('staff')
                               ->latest()
                               ->paginate(10);
        
        // ========== RECENT ACTIVITY ==========
        
        $recentActivity = BillItem::where('staff_id', $staff->id)
                                  ->with(['bill', 'service'])
                                  ->latest()
                                  ->limit(10)
                                  ->get();
        
        return view('salon.staff.show', compact(
            'staff',
            'totalEarnings',
            'monthEarnings',
            'lastMonthEarnings',
            'totalServicesCount',
            'appointmentsCount',
            'totalServiceRevenue',
            'avgEarningPerService',
            'serviceBreakdown',
            'monthlyPerformance',
            'salaryHistory',
            'recentActivity'
        ));
    }
    // ✅ Staff List (with services eager load)
public function index(Request $request)
{
    $search = $request->search;

    $staffs = Staff::with('services')
        ->when($search, function ($query) use ($search) {
            $query->where(function($q) use ($search){
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('salon.staff.index', compact('staffs'));
}


    // ✅ Create Page
    public function create()
    {
        $services = Service::all();
        return view('salon.staff.create', compact('services'));
    }


    // ✅ Store Staff
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    $data = [
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'gender' => $request->gender,
        'role' => $request->role,
        'joining_date' => $request->joining_date,
        'address' => $request->address,
        'salary_type' => $request->salary_type ?? 'fixed',
        'fixed_salary' => $request->salary_type == 'fixed' 
                            ? $request->fixed_salary ?? 0 
                            : 0,
        'commission_percent' => $request->salary_type == 'commission'
                            ? $request->commission_percent ?? 0
                            : 0,
    ];

 if ($request->hasFile('photo')) {

    $file = $request->file('photo');
    $name = time().'.'.$file->getClientOriginalExtension();

    $data['photo'] = $file->storeAs('staff', $name, 'public');
}
$staff = Staff::create($data);

if($request->has('services')){
    $staff->services()->sync($request->services);
}

return redirect()
    ->route('staff.index')
    ->with('success','✅ Staff Added Successfully');
}

public function edit($id)
{
    $staff = Staff::with('services')->findOrFail($id);
    $services = Service::all();

    return view('salon.staff.edit',
        compact('staff','services'));
}
    // ✅ Update Staff
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'role' => $request->role,
            'joining_date' => $request->joining_date,
            'address' => $request->address,
            'salary_type' => $request->salary_type ?? 'fixed',
            'fixed_salary' => $request->fixed_salary ?? 0,
            'commission_percent' => $request->commission_percent ?? 0,
        ];

        // ✅ UPDATE PHOTO
      if ($request->hasFile('photo')) {

    // old photo delete
    if ($staff->photo && Storage::disk('public')->exists($staff->photo)) {
        Storage::disk('public')->delete($staff->photo);
    }

    // new photo upload
$file = $request->file('photo');
$name = time().'.'.$file->getClientOriginalExtension();

$data['photo'] = $file->storeAs('staff', $name, 'public');}

$staff->update($data);

// services sync
$staff->services()->sync($request->services ?? []);

return redirect()
    ->route('staff.index')
    ->with('success', '✅ Staff Updated Successfully');
    }

    // ✅ Delete Staff
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);

        // detach pivot first
        $staff->services()->detach();

        $staff->delete();

        return redirect()
            ->route('staff.index')
            ->with('success', '🗑 Staff Deleted Successfully');
    }
}