<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Course;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Enquiry List
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $enquiries = Enquiry::with(['course','trainer'])
                        ->latest()
                        ->paginate(10);

        return view('admin.enquiries.index', compact('enquiries'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create Enquiry (Admin Manual Entry)
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $courses = Course::where('status',1)->get();
        return view('admin.enquiries.create', compact('courses'));
    }

    /*
    |--------------------------------------------------------------------------
    | Store Enquiry
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'nullable|email|max:255',
            'course_id' => 'required|exists:courses,id',
            'message'   => 'nullable|string'
        ]);

        $course = Course::with('trainer')->findOrFail($request->course_id);

        Enquiry::create([
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'course_id'  => $course->id,
            'trainer_id' => $course->trainer_id,
            'message'    => $request->message,
        ]);

     
    return redirect()
        ->back()
        ->with('success','✅ Enquiry Submitted Successfully');
}

    /*
    |--------------------------------------------------------------------------
    | Show Single Enquiry Detail
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $enquiry = Enquiry::with(['course','trainer'])->findOrFail($id);
        return view('admin.enquiries.show', compact('enquiry'));
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Enquiry
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry Deleted Successfully 🗑');
    }

    /*
    |--------------------------------------------------------------------------
    | Send WhatsApp
    |--------------------------------------------------------------------------
    */
    public function sendWhatsapp($id)
    {
        $enquiry = Enquiry::with('course')->findOrFail($id);

        $phone = '91' . $enquiry->phone;

        $message = "Hello {$enquiry->name},\n"
            . "Regarding your enquiry for {$enquiry->course->title}.\n"
            . "Fees: ₹{$enquiry->course->fees}\n"
            . "Duration: {$enquiry->course->duration}";

        $url = "https://wa.me/{$phone}?text=" . urlencode($message);

        return redirect()->away($url);
    }
}