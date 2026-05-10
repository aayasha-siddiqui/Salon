<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // List all students
    public function index()
    {
        $students = Student::with(['trainer'])->get(); // eager load trainer
        $courses = Course::all();
        return view('admin.students.index', compact('students','courses'));
    }

    // Show create form
    public function create()
    {
        $trainers = Trainer::all();
        $courses = Course::all();
        return view('admin.students.create', compact('trainers','courses'));
    }

    // Store a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email',
            'phone'=>'required|string|max:20',
            'address'=>'required|string',

'course_id'=>'required|exists:courses,id',
            'category'=>'required|string',
            'subcategory'=>'required|string',
            'trainer_id'=>'nullable|exists:trainers,id',
            'joining_date'=>'required|date',
            'status'=>'required|in:Active,Completed,Dropped',
            'photo'=>'nullable|image|max:2048'
        ]);

        if($request->hasFile('photo')){
            $validated['photo'] = $request->file('photo')->store('students','public');
        }

        Student::create($validated);

        return redirect()->route('admin.students.index')->with('success','Student added successfully!');
    }

    // Show edit form
    public function edit(Student $student)
    {
        $trainers = Trainer::all();
        $courses = Course::all();
        return view('admin.students.edit', compact('student','trainers','courses'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email,'.$student->id,
            'phone'=>'required|string|max:20',
            'address'=>'required|string',
            'category'=>'required|string',
            'course_id'=>'required|exists:courses,id',
            'subcategory'=>'required|string',
            'trainer_id'=>'nullable|exists:trainers,id',
            'joining_date'=>'required|date',
            'status'=>'required|in:Active,Completed,Dropped',
            'photo'=>'nullable|image|max:2048'
        ]);

        if($request->hasFile('photo')){
            // Delete old photo if exists
            if($student->photo && Storage::disk('public')->exists($student->photo)){
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('photo')->store('students','public');
        }

        $student->update($validated);

        return redirect()->route('admin.students.index')->with('success','Student updated successfully!');
    }

    // Delete student
    public function destroy(Student $student)
    {
        if($student->photo && Storage::disk('public')->exists($student->photo)){
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with('success','Student deleted successfully!');
    }
}
