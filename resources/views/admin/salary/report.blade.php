@extends('layouts.admin')

@section('content')

<style>
    /* Theme variables ke saath styling */
    .bg-card {
        background-color: var(--card);
    }
    .border-border {
        border-color: var(--border);
    }
    .text-soft {
        color: var(--text-soft);
    }
    .text-text {
        color: var(--text);
    }
    .text-gold {
        color: var(--gold-rich) !important;
    }
    .border-gold {
        border-color: var(--gold-rich) !important;
    }
    .bg-gold {
        background-color: var(--gold-rich) !important;
    }
    .bg-gold-light {
        background-color: rgba(139, 107, 62, 0.1);
    }
    
    /* Table styling */
    .report-table thead tr {
        background: linear-gradient(to right, #8B6B3E, #A07D4A) !important;
    }
    
    .report-table thead th {
        color: white !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 1rem 1rem;
    }
    
    .report-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .report-table tbody tr:hover {
        background-color: var(--hover) !important;
    }
    
    /* Amount styling */
    .amount-fees {
        color: #3B82F6;
        font-weight: 600;
    }
    
    .amount-income {
        color: #8B5CF6;
        font-weight: 700;
    }
    
    .amount-salary {
        color: #10B981;
        font-weight: 700;
    }
    
    /* Stats cards */
    .stats-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-left: 4px solid #8B6B3E;
        border-radius: 12px;
        padding: 1.25rem;
        transition: all 0.3s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px var(--glow);
    }
    
    /* Student count badge */
    .student-badge {
        background: linear-gradient(135deg, #8B6B3E20, #A07D4A20);
        color: var(--gold-rich);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Pagination styling */
    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        margin-top: 2rem;
    }
    
    .pagination .page-link {
        padding: 0.5rem 1rem;
        background-color: var(--card);
        border: 1px solid var(--border);
        color: var(--text-soft);
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .pagination .page-link:hover {
        background-color: var(--gold-rich);
        color: white;
        border-color: var(--gold-rich);
        transform: translateY(-2px);
    }
    
    .pagination .active .page-link {
        background-color: var(--gold-rich);
        color: white;
        border-color: var(--gold-rich);
    }
    
    /* Summary row */
    .summary-row {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.05) 0%, rgba(182, 143, 92, 0.05) 100%);
        font-weight: 600;
    }
    
    /* Mobile card */
    .mobile-report-card {
        background-color: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        transition: all 0.3s ease;
    }
    
    .mobile-report-card:hover {
        border-color: var(--gold-rich);
        box-shadow: 0 4px 15px var(--glow);
        transform: translateY(-2px);
    }
    
    /* Print styles */
    @media print {
        .no-print {
            display: none !important;
        }
        body {
            background: white;
            color: black;
        }
        .report-table thead tr {
            background: #333 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <!-- Page Header with Actions -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-chart-line mr-3" style="color: var(--gold-rich);"></i>
                Trainer Salary & Income Report
            </h2>
            <p class="text-sm text-soft mt-1">Financial overview of courses, students, and trainer earnings</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-2 no-print">
            <button onclick="window.print()" 
                    class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
                    style="border-color: var(--gold-rich); color: var(--gold-rich);"
                    onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
                <i class="fas fa-print mr-2"></i> Print Report
            </button>
            
          
        </div>
    </div>

    <!-- Summary Stats Cards -->
    @php
        $totalCourses = $courses->count();
        $totalStudentsAll = $courses->sum(function($course) { return $course->students->count(); });
        $totalIncomeAll = $courses->sum(function($course) { return $course->fees * $course->students->count(); });
        $totalSalaryAll = $courses->sum(function($course) { return $course->trainer->salary ?? 0; });
        $avgSalary = $courses->whereNotNull('trainer')->count() > 0 
            ? $totalSalaryAll / $courses->whereNotNull('trainer')->count() 
            : 0;
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 no-print">
        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Total Courses</p>
                    <p class="text-2xl font-bold" style="color: var(--text);">{{ $totalCourses }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-book-open text-gold text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Total Students</p>
                    <p class="text-2xl font-bold" style="color: var(--text);">{{ $totalStudentsAll }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-users text-gold text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Total Income</p>
                    <p class="text-2xl font-bold amount-income">₹{{ number_format($totalIncomeAll, 2) }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-rupee-sign text-gold text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Avg Trainer Salary</p>
                    <p class="text-2xl font-bold amount-salary">₹{{ number_format($avgSalary, 2) }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-gold text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- DESKTOP TABLE VIEW -->
    <div class="hidden md:block bg-card border border-border rounded-xl shadow-lg overflow-hidden">
        <table class="report-table min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-3">Course Details</th>
                    <th class="px-4 py-3">Duration</th>
                    <th class="px-4 py-3">Fees (₹)</th>
                    <th class="px-4 py-3 text-center">Students</th>
                    <th class="px-4 py-3">Total Income (₹)</th>
                    <th class="px-4 py-3">Trainer</th>
                    <th class="px-4 py-3">Trainer Salary (₹)</th>
                   
                </tr>
            </thead>
            <tbody class="divide-y" style="border-color: var(--border);">
                @php
                    $grandTotalStudents = 0;
                    $grandTotalIncome = 0;
                    $grandTotalSalary = 0;
                @endphp

                @foreach($courses as $course)
                @php
                    $totalStudents = $course->students->count();
                    $totalIncome = $course->fees * $totalStudents;
                  $trainerSalary = $course->trainers->first()->salary ?? 0;
                      $grandTotalStudents += $totalStudents;
                    $grandTotalIncome += $totalIncome;
                    $grandTotalSalary += $trainerSalary;
                @endphp
                <tr class="hover:bg-hover transition">
                    <td class="px-4 py-3">
                        <div class="font-semibold" style="color: var(--text);">{{ $course->title }}</div>
                        <div class="text-xs" style="color: var(--text-soft);">{{ $course->category }} / {{ $course->subcategory }}</div>
                    </td>
                    
                    <td class="px-4 py-3" style="color: var(--text-soft);">
                        <i class="far fa-clock mr-1" style="color: var(--gold-rich);"></i>
                        {{ $course->duration }}
                    </td>
                    
                    <td class="px-4 py-3 amount-fees">
                        ₹{{ number_format($course->fees, 2) }}
                    </td>
                    
                    <td class="px-4 py-3 text-center">
                        <span class="student-badge">
                            <i class="fas fa-user-graduate mr-1"></i>
                            {{ $totalStudents }}
                        </span>
                    </td>
                    
                    <td class="px-4 py-3 amount-income">
                        ₹{{ number_format($totalIncome, 2) }}
                    </td>
                    
                    <td class="px-4 py-3">
                      @if($course->trainers->count())
  
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gold-light flex items-center justify-center">
                                    <i class="fas fa-user-tie text-gold text-xs"></i>
                                </div>
                                <span style="color: var(--text);">  {{ $course->trainers->first()->name }}</span>
                            </div>
                        @else
                            <span class="text-soft">Not Assigned</span>
                        @endif
                    </td>
                    
                    <td class="px-4 py-3 amount-salary">
                        ₹{{ number_format($trainerSalary, 2) }}
                    </td>
                    
                  
                </tr>
                @endforeach

                <!-- Summary Row -->
                <tr class="summary-row" style="background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);">
                    <td colspan="3" class="px-4 py-3 font-bold" style="color: var(--text);">TOTALS</td>
                    <td class="px-4 py-3 text-center font-bold" style="color: var(--gold-rich);">
                        {{ $grandTotalStudents }}
                    </td>
                    <td class="px-4 py-3 amount-income font-bold">
                        ₹{{ number_format($grandTotalIncome, 2) }}
                    </td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3 amount-salary font-bold">
                        ₹{{ number_format($grandTotalSalary, 2) }}
                    </td>
                   
                </tr>
            </tbody>
        </table>
    </div>

    <!-- MOBILE CARD VIEW -->
    <div class="md:hidden space-y-4">
        @php
            $mobileGrandTotalStudents = 0;
            $mobileGrandTotalIncome = 0;
            $mobileGrandTotalSalary = 0;
        @endphp

        @foreach($courses as $course)
        @php
            $totalStudents = $course->students->count();
            $totalIncome = $course->fees * $totalStudents;
            $trainerSalary = $course->trainer->salary ?? 0;
            
            $mobileGrandTotalStudents += $totalStudents;
            $mobileGrandTotalIncome += $totalIncome;
            $mobileGrandTotalSalary += $trainerSalary;
        @endphp
        <div class="mobile-report-card">
            <!-- Course Header -->
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-lg" style="color: var(--text);">{{ $course->title }}</h3>
                    <p class="text-xs" style="color: var(--text-soft);">{{ $course->category }} / {{ $course->subcategory }}</p>
                </div>
                <span class="student-badge">
                    <i class="fas fa-user-graduate mr-1"></i>
                    {{ $totalStudents }} students
                </span>
            </div>

            <!-- Course Stats Grid -->
            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>
                    <p class="text-xs text-soft">Duration</p>
                    <p class="font-semibold" style="color: var(--text);">
                        <i class="far fa-clock mr-1" style="color: var(--gold-rich);"></i>
                        {{ $course->duration }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-soft">Fees</p>
                    <p class="font-semibold amount-fees">₹{{ number_format($course->fees, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-soft">Total Income</p>
                    <p class="font-semibold amount-income">₹{{ number_format($totalIncome, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-soft">Trainer Salary</p>
                    <p class="font-semibold amount-salary">₹{{ number_format($trainerSalary, 2) }}</p>
                </div>
            </div>

            <!-- Trainer Info -->
            <div class="flex items-center justify-between pt-2 border-t" style="border-color: var(--border);">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-gold-light flex items-center justify-center">
                        <i class="fas fa-user-tie text-gold"></i>
                    </div>
                    <div>
                        <p class="text-xs text-soft">Trainer</p>
                        <p class="font-semibold" style="color: var(--text);">
                            {{ $course->trainer->name ?? 'Not Assigned' }}
                        </p>
                    </div>
                </div>
               


        </div>
        @endforeach

        <!-- Mobile Summary Card -->
        <div class="mobile-report-card" style="background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);">
            <h4 class="font-bold mb-2" style="color: var(--text);">Summary</h4>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="text-xs text-soft">Total Students</p>
                    <p class="text-xl font-bold" style="color: var(--gold-rich);">{{ $mobileGrandTotalStudents }}</p>
                </div>
                <div>
                    <p class="text-xs text-soft">Total Income</p>
                    <p class="text-xl font-bold amount-income">₹{{ number_format($mobileGrandTotalIncome, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-soft">Total Salary</p>
                    <p class="text-xl font-bold amount-salary">₹{{ number_format($mobileGrandTotalSalary, 2) }}</p>
                </div>
                <div>
                   

                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6 no-print">
        {{ $courses->links() }}
    </div>

    <!-- Report Footer -->
    <div class="mt-4 text-right text-xs text-soft no-print">
        <i class="fas fa-calendar-alt mr-1" style="color: var(--gold-rich);"></i>
        Report generated on {{ now()->format('d M Y, h:i A') }}
    </div>
</div>

<!-- Custom Pagination Styling -->
<style>
    /* Override default pagination */
    nav[role="navigation"] {
        display: flex;
        justify-content: center;
    }
    
    nav[role="navigation"] div:first-child {
        display: none;
    }
    
    nav[role="navigation"] div:last-child {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    nav[role="navigation"] span,
    nav[role="navigation"] a {
        padding: 0.5rem 1rem !important;
        background-color: var(--card) !important;
        border: 1px solid var(--border) !important;
        color: var(--text-soft) !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
        margin: 0 !important;
    }
    
    nav[role="navigation"] a:hover {
        background-color: var(--gold-rich) !important;
        color: white !important;
        border-color: var(--gold-rich) !important;
        transform: translateY(-2px);
    }
    
    nav[role="navigation"] span[aria-current="page"] span {
        background-color: var(--gold-rich) !important;
        color: white !important;
        border-color: var(--gold-rich) !important;
    }
</style>

@endsection