<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Student;

class PaymentController extends Controller
{

    // Payment list
    public function index()
    {
        $payments = Payment::with('student')->latest()->paginate(10);

        return view('admin.payments.index', compact('payments'));
    }

    // Show payment form
    public function create($student_id)
    {
        $student = Student::with('course','payments')->findOrFail($student_id);

        $totalPaid = $student->payments->sum('amount');
        $courseFee = $student->course->fees ?? 0;
        $pending = $courseFee - $totalPaid;

        return view('admin.payments.create', compact('student','totalPaid','pending','courseFee'));
    }

    // Store payment
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:Cash,Online',
            'payment_date' => 'required|date'
        ]);

        Payment::create([
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date
        ]);

        return redirect()
        ->route('admin.payments.index')
        ->with('success','Payment added successfully!');
    }

    // Student payment history
    public function studentPayments($student_id)
    {
        $student = Student::with('payments','course')->findOrFail($student_id);

        $totalPaid = $student->payments->sum('amount');
        $courseFee = $student->course->fees ?? 0;
        $pending = $courseFee - $totalPaid;

        return view('admin.payments.student', compact('student','totalPaid','pending','courseFee'));
    }

    // Delete payment
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return back()->with('success','Payment deleted successfully');
    }
    public function indexx()
{
    $students = Student::with(['course','payments'])->get();

    return view('admin.payments.indexx',compact('students'));
}
}