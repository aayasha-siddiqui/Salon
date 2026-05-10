<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student; // Your Student model
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    // Show the form to enter student name
    public function create()
    {
        return view('admin.certificate.create');
    }

    // Generate certificate dynamically
    public function generate(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        $student = Student::with('course')->findOrFail($request->student_id);

        return view('admin.certificate.template', compact('student'));
    }
     public function show($id)
{
    $student = Student::with('course')->findOrFail($id);
    return view('admin.certificate.template', compact('student'));
}

}
