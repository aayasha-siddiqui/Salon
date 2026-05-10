<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('trainers')->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.courses.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'fees' => 'required|numeric',
            'trainer_ids' => 'required|array',
            'trainer_ids.*' => 'exists:trainers,id',
            'status' => 'required|in:0,1'
        ]);

        $course = Course::create($validated);

        // attach trainers
        $course->trainers()->sync($request->trainer_ids);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course Added Successfully');
    }

    public function edit(Course $course)
    {
        $course->load('trainers');

        $trainers = Trainer::all();

        return view('admin.courses.edit', compact('course','trainers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subcategory' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'fees' => 'required|numeric',
            'trainer_ids' => 'required|array',
            'trainer_ids.*' => 'exists:trainers,id',
            'status' => 'required|in:0,1'
        ]);

        $course->update($validated);

        $course->trainers()->sync($request->trainer_ids);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course Updated Successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course Deleted Successfully');
    }
}