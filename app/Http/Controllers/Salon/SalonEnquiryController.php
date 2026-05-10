<?php

namespace App\Http\Controllers\Salon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalonEnquiry;
use App\Models\Service;
use App\Models\Course;
class SalonEnquiryController extends Controller
{

/*
|--------------------------------------------------------------------------
| 1️⃣ WEBSITE ENQUIRY FORM
|--------------------------------------------------------------------------
*/
public function create()
{
    $courses = Course::where('status',1)->get();

    return view('website.salon-enquiry', compact('courses'));
}
/*
|--------------------------------------------------------------------------
| 2️⃣ GET SERVICES BY GENDER (AJAX)
|--------------------------------------------------------------------------
*/

public function getServices($gender)
{
    if (strtolower($gender) == 'unisex') {

        // UNISEX SELECT → SHOW ALL SERVICES
        $services = Service::select('id','name','price')
                    ->orderBy('name')
                    ->get();

    } else {

        // MALE / FEMALE SELECT
        $services = Service::where(function ($query) use ($gender) {

            $query->where('gender', strtolower($gender))
                  ->orWhere('gender', 'unisex');

        })
        ->select('id','name','price')
        ->orderBy('name')
        ->get();
    }

    return response()->json($services);
}

/*
|--------------------------------------------------------------------------
| 3️⃣ STORE CUSTOMER ENQUIRY
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:100',
        'contact'  => 'required|string|max:20',
        'gender'   => 'required',
        'service'  => 'required'
    ]);

    SalonEnquiry::create([
        'name'     => $request->name,
        'contact'  => $request->contact,
        'gender'   => strtolower($request->gender),
        'service'  => $request->service,
        'message'  => $request->message
    ]);

//     return redirect()
//         ->back()
//         ->with('success','✅ Enquiry Submitted Successfully');
// }
   $admin = "918949878232"; // admin whatsapp number

    $message = urlencode(
        "✨ New Salon Booking ✨\n\n".
        "👤 Name: ".$request->name."\n".
        "📞 Phone: ".$request->contact."\n".
        "🚻 Gender: ".$request->gender."\n".
        "💇 Service: ".$request->service."\n".
        "📝 Message: ".$request->message
    );

    $whatsapp = "https://wa.me/".$admin."?text=".$message;

    return redirect($whatsapp);
}

/*
|--------------------------------------------------------------------------
| 4️⃣ ADMIN PANEL - ALL ENQUIRIES
|--------------------------------------------------------------------------
*/

public function index()
{
    $enquiries = SalonEnquiry::latest()
                    ->paginate(10);

    return view(
        'salon.enquiries.index',
        compact('enquiries')
    );
}


/*
|--------------------------------------------------------------------------
| 5️⃣ VIEW SINGLE ENQUIRY
|--------------------------------------------------------------------------
*/

public function show($id)
{
    $enquiry = SalonEnquiry::findOrFail($id);

    return view(
        'salon.enquiries.show',
        compact('enquiry')
    );
}


/*
|--------------------------------------------------------------------------
| 6️⃣ DELETE ENQUIRY
|--------------------------------------------------------------------------
*/

public function destroy($id)
{
    $enquiry = SalonEnquiry::findOrFail($id);

    $enquiry->delete();

    return redirect()
        ->route('salon.enquiries.index')
        ->with('success','🗑 Enquiry Deleted Successfully');
}

}