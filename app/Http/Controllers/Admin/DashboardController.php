<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Batch;
use App\Models\Fee;
use App\Models\Trainer;
use App\Models\Notification;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $now = Carbon::now();

        // ==============================
        // BASIC COUNTS
        // ==============================

        $totalStudents = Student::count();

        $activeCourses = Course::where('status', 1)->count();

        $pendingEnquiries = Enquiry::count();

        $totalTrainers = Trainer::count();

        $todayClasses = Batch::whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->count();


        // ==============================
        // FINANCIAL CALCULATIONS
        // ==============================

        // Total Trainer Salary
        $totalTrainerSalary = Trainer::sum('salary');

        // Total Course Income (Students × Course Fees)
        $totalCourseIncome = Student::with('course')
            ->get()
            ->sum(function ($student) {
                return $student->course->fees ?? 0;
            });

        // Net Profit
        $netProfit = $totalCourseIncome - $totalTrainerSalary;

        // Fees Pending (if using fee table)
        $feesPending = Fee::where('due_amount', '>', 0)->sum('due_amount');

        // Monthly Revenue (if using fee table)
       $monthlyRevenue = \App\Models\Student::with('course')
    ->whereYear('created_at', now()->year)
    ->whereMonth('created_at', now()->month)
    ->get()
    ->sum(function ($student) {
        return $student->course->fees ?? 0;
    });

$feesPending = 0;


        // ==============================
        // NOTIFICATIONS
        // ==============================

        $notifications = Notification::latest()->take(5)->get();

        $alerts = [];

        if ($feesPending > 0) {
            $alerts[] = "₹" . number_format($feesPending, 2) . " fees pending";
        }

        if ($pendingEnquiries > 0) {
            $alerts[] = $pendingEnquiries . " new enquiries";
        }

        if ($todayClasses > 0) {
            $alerts[] = $todayClasses . " classes running today";
        }


        // ==============================
        // RETURN VIEW
        // ==============================

        return view('admin.dashboard', compact(
            'totalStudents',
            'activeCourses',
            'pendingEnquiries',
            'todayClasses',
            'feesPending',
            'monthlyRevenue',
            'totalTrainers',
            'notifications',
            'alerts',
            'totalTrainerSalary',
            'totalCourseIncome',
            'netProfit'
        ));
    }
}