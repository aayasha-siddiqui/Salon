<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Staff;

class ServiceController extends Controller
{

    // ✅ List Page
    public function index(Request $request)
{
    $search = $request->search;

    $services = Service::with('staffs')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        })
          ->latest()
        ->paginate(9)
        ->withQueryString();

    return view('salon.services.index', compact('services'));
}

    // ✅ Create Page
    public function create()
    {
        // ⭐ ALL STAFF FETCH
        $staffs = Staff::all();

        return view('salon.services.create', compact('staffs'));
    }

    // ✅ Store Service
    public function store(Request $request)
{
    $request->validate([
        'service_name' => 'nullable',
        'name' => 'required',
        'type' => 'required',
        'gender' => 'required',
        'price' => 'required|numeric',
        'duration' => 'nullable|numeric'
    ]);

    $service = Service::create([
        'service_name' => $request->service_name,
        'name' => $request->name,
        'type' => $request->type,
        'gender' => $request->gender,
        'price' => $request->price,
        // 'duration' => $request->duration,
        'description' => $request->description
    ]);

    return redirect()
        ->route('services.index')
        ->with('success','Service Added Successfully');
}

    // ✅ Edit Page
    public function edit(Service $service)
    {
        $staffs = Staff::all();

        return view('salon.services.edit',
            compact('service','staffs')
        );
    }

    // ✅ Update
    public function update(Request $request, Service $service)
{
    $service->update([
        'service_name' => $request->service_name,
        'name' => $request->name,
        'type' => $request->type,
        'gender' => $request->gender,
        'price' => $request->price,
        'duration' => $request->duration,
        'description' => $request->description
    ]);

    $service->staffs()->sync($request->staff_ids ?? []);

    return redirect()
        ->route('services.index')
        ->with('success','Service Updated Successfully');
}

    // ✅ Delete
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success','Service Deleted');
    }
}