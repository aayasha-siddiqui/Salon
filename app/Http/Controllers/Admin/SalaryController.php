<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;

class SalaryController extends Controller
{
    public function salaryReport()
    {
       $courses = Course::with(['trainers','students'])
            ->paginate(10);

        return view('admin.salary.report', compact('courses'));
    }
}