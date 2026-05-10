<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Active courses fetch karo
        $courses = Course::where('status', 1)->get();
        
        // All services fetch karo (gender filter AJAX se hoga)
        $services = Service::orderBy('name')->get();
        
        return view('home', compact('courses', 'services'));
    }
}