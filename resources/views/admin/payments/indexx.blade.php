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
    .fees-table thead tr {
        background: linear-gradient(to right, #8B6B3E, #A07D4A) !important;
    }
    
    .fees-table thead th {
        color: white !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 1rem 1rem;
    }
    
    .fees-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .fees-table tbody tr:hover {
        background-color: var(--hover) !important;
    }
    
    /* Amount styling */
    .amount-fee {
        color: #3B82F6;
        font-weight: 600;
    }
    
    .amount-paid {
        color: #10B981;
        font-weight: 700;
    }
    
    .amount-pending {
        color: #F59E0B;
        font-weight: 700;
    }
    
    .amount-overdue {
        color: #EF4444;
        font-weight: 700;
    }
    
    /* Status badges */
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .status-paid {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981;
    }
    
    .status-partial {
        background: rgba(245, 158, 11, 0.1);
        color: #F59E0B;
    }
    
    .status-pending {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
    }
    
    /* Action buttons */
    .action-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-payment {
        background: #10B981;
        color: white;
    }
    
    .btn-payment:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
    
    .btn-history {
        background: #3B82F6;
        color: white;
    }
    
    .btn-history:hover {
        background: #2563EB;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
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
    
    /* Search input */
    .search-input {
        background-color: var(--card);
        border: 1px solid var(--border);
        color: var(--text);
        padding: 0.5rem 1rem 0.5rem 2.5rem;
        border-radius: 8px;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        border-color: var(--gold-rich);
        box-shadow: 0 0 0 3px var(--glow);
        outline: none;
    }
    
    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-soft);
    }
    
    /* Progress bar */
    .progress-bar {
        width: 60px;
        height: 4px;
        background-color: var(--border);
        border-radius: 9999px;
        overflow: hidden;
        display: inline-block;
        margin-left: 0.5rem;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(to right, #8B6B3E, #B68F5C);
        border-radius: 9999px;
    }
    
    /* Mobile card */
    .mobile-student-card {
        background-color: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        transition: all 0.3s ease;
    }
    
    .mobile-student-card:hover {
        border-color: var(--gold-rich);
        box-shadow: 0 4px 15px var(--glow);
        transform: translateY(-2px);
    }
    
    /* Course badge */
    .course-badge {
        background-color: var(--hover);
        color: var(--text-soft);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        display: inline-block;
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-rupee-sign mr-3" style="color: var(--gold-rich);"></i>
                Student Fees Management
            </h2>
            <p class="text-sm text-soft mt-1">Track and manage all student fee payments</p>
        </div>

        <!-- Summary Stats -->
        @php
            $totalStudents = $students->count();
            $totalFees = $students->sum(function($s) { return $s->course->fees ?? 0; });
            $totalPaid = $students->sum(function($s) { return $s->payments->sum('amount'); });
            $totalPending = $totalFees - $totalPaid;
            $fullyPaid = $students->filter(function($s) { 
                $courseFee = $s->course->fees ?? 0;
                $totalPaid = $s->payments->sum('amount');
                return $courseFee > 0 && $totalPaid >= $courseFee;
            })->count();
        @endphp

        <div class="flex gap-2">
            <div class="stats-card py-2 px-3">
                <p class="text-xs text-soft">Total Fees</p>
                <p class="text-lg font-bold amount-fee">₹{{ number_format($totalFees, 2) }}</p>
            </div>
            <div class="stats-card py-2 px-3">
                <p class="text-xs text-soft">Collected</p>
                <p class="text-lg font-bold amount-paid">₹{{ number_format($totalPaid, 2) }}</p>
            </div>
            <div class="stats-card py-2 px-3">
                <p class="text-xs text-soft">Pending</p>
                <p class="text-lg font-bold amount-pending">₹{{ number_format($totalPending, 2) }}</p>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="flex justify-end mb-4">
        <div class="relative w-full sm:w-80">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="tableSearch" placeholder="Search by student name, course..."
                   class="search-input pl-10">
        </div>
    </div>

    <!-- DESKTOP TABLE VIEW -->
    <div class="hidden md:block bg-card border border-border rounded-xl shadow-lg overflow-hidden">
        <table id="feesTable" class="fees-table min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-3">Student</th>
                    <th class="px-4 py-3">Course</th>
                    <th class="px-4 py-3">Course Fee</th>
                    <th class="px-4 py-3">Paid</th>
                    <th class="px-4 py-3">Pending</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y" style="border-color: var(--border);">
                @foreach($students as $student)
                @php
                    $courseFee = $student->course->fees ?? 0;
                    $totalPaid = $student->payments->sum('amount');
                    $pending = $courseFee - $totalPaid;
                    
                    if($courseFee == 0) {
                        $status = 'No Course';
                        $statusClass = 'status-pending';
                    } elseif($pending <= 0) {
                        $status = 'Fully Paid';
                        $statusClass = 'status-paid';
                    } elseif($totalPaid > 0) {
                        $status = 'Partial';
                        $statusClass = 'status-partial';
                    } else {
                        $status = 'Pending';
                        $statusClass = 'status-pending';
                    }
                    
                    $paymentPercentage = $courseFee > 0 ? ($totalPaid / $courseFee) * 100 : 0;
                @endphp
                <tr class="hover:bg-hover transition student-row">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gold-light flex items-center justify-center">
                                <i class="fas fa-user-graduate text-gold text-sm"></i>
                            </div>
                            <div>
                                <div class="font-semibold" style="color: var(--text);">{{ $student->name }}</div>
                                <div class="text-xs" style="color: var(--text-soft);">ID: ST{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-4 py-3">
                        @if($student->course)
                            <div style="color: var(--text);">{{ $student->course->title }}</div>
                            <div class="text-xs" style="color: var(--text-soft);">{{ $student->course->duration }}</div>
                        @else
                            <span class="text-soft">Not enrolled</span>
                        @endif
                    </td>
                    
                    <td class="px-4 py-3 amount-fee">
                        ₹{{ number_format($courseFee, 2) }}
                        @if($courseFee > 0)
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $paymentPercentage }}%"></div>
                        </div>
                        @endif
                    </td>
                    
                    <td class="px-4 py-3 amount-paid">
                        ₹{{ number_format($totalPaid, 2) }}
                    </td>
                    
                    <td class="px-4 py-3 {{ $pending > 0 ? 'amount-pending' : 'amount-paid' }}">
                        ₹{{ number_format($pending, 2) }}
                    </td>
                    
                    <td class="px-4 py-3">
                        <span class="status-badge {{ $statusClass }}">
                            {{ $status }}
                        </span>
                    </td>
                    
                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.payments.create', $student->id) }}"
                               class="action-btn btn-payment">
                                <i class="fas fa-plus-circle"></i>
                                Add
                            </a>

                            <a href="{{ route('admin.payments.student', $student->id) }}"
                               class="action-btn btn-history">
                                <i class="fas fa-history"></i>
                                History
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <!-- Summary Row -->
            <tfoot style="background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);">
                <tr>
                    <td colspan="2" class="px-4 py-3 font-bold" style="color: var(--text);">TOTALS</td>
                    <td class="px-4 py-3 amount-fee font-bold">₹{{ number_format($totalFees, 2) }}</td>
                    <td class="px-4 py-3 amount-paid font-bold">₹{{ number_format($totalPaid, 2) }}</td>
                    <td class="px-4 py-3 amount-pending font-bold">₹{{ number_format($totalPending, 2) }}</td>
                    <td class="px-4 py-3" colspan="2">
                        <span class="text-xs" style="color: var(--text-soft);">
                            Fully Paid: {{ $fullyPaid }}/{{ $totalStudents }}
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>

        <!-- Table Info -->
        <div class="flex justify-between items-center p-4 border-t" style="border-color: var(--border); background-color: var(--card);">
            <div id="tableInfo" class="text-sm" style="color: var(--text-soft);"></div>
            <div class="text-sm" style="color: var(--text-soft);">
                <i class="fas fa-info-circle mr-1" style="color: var(--gold-rich);"></i>
                {{ $totalStudents }} total students
            </div>
        </div>
    </div>

    <!-- MOBILE CARD VIEW -->
    <div class="md:hidden space-y-4" id="mobileStudentContainer">
        @foreach($students as $student)
        @php
            $courseFee = $student->course->fees ?? 0;
            $totalPaid = $student->payments->sum('amount');
            $pending = $courseFee - $totalPaid;
            
            if($courseFee == 0) {
                $status = 'No Course';
                $statusClass = 'status-pending';
            } elseif($pending <= 0) {
                $status = 'Fully Paid';
                $statusClass = 'status-paid';
            } elseif($totalPaid > 0) {
                $status = 'Partial';
                $statusClass = 'status-partial';
            } else {
                $status = 'Pending';
                $statusClass = 'status-pending';
            }
            
            $paymentPercentage = $courseFee > 0 ? ($totalPaid / $courseFee) * 100 : 0;
        @endphp
        <div class="mobile-student-card student-card" data-search="{{ strtolower($student->name.' '.($student->course->title ?? '')) }}">
            <!-- Header -->
            <div class="flex items-center gap-3 mb-3">
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-user-graduate text-gold text-xl"></i>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold" style="color: var(--text);">{{ $student->name }}</h3>
                    <p class="text-xs" style="color: var(--text-soft);">ID: ST{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                <span class="status-badge {{ $statusClass }}">{{ $status }}</span>
            </div>

            <!-- Course Info -->
            <div class="mb-3">
                <span class="course-badge">
                    <i class="fas fa-book-open mr-1" style="color: var(--gold-rich);"></i>
                    {{ $student->course->title ?? 'No Course' }}
                </span>
                @if($student->course)
                <span class="course-badge ml-1">
                    <i class="far fa-clock mr-1" style="color: var(--gold-rich);"></i>
                    {{ $student->course->duration }}
                </span>
                @endif
            </div>

            <!-- Fee Details -->
            <div class="grid grid-cols-3 gap-2 mb-3">
                <div>
                    <p class="text-xs text-soft">Course Fee</p>
                    <p class="font-semibold amount-fee">₹{{ number_format($courseFee, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-soft">Paid</p>
                    <p class="font-semibold amount-paid">₹{{ number_format($totalPaid, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-soft">Pending</p>
                    <p class="font-semibold {{ $pending > 0 ? 'amount-pending' : 'amount-paid' }}">
                        ₹{{ number_format($pending, 2) }}
                    </p>
                </div>
            </div>

            <!-- Progress Bar -->
            @if($courseFee > 0)
            <div class="mb-3">
                <div class="flex justify-between text-xs mb-1">
                    <span style="color: var(--text-soft);">Progress</span>
                    <span style="color: var(--gold-rich);">{{ number_format($paymentPercentage, 1) }}%</span>
                </div>
                <div class="progress-bar w-full">
                    <div class="progress-fill" style="width: {{ $paymentPercentage }}%"></div>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex gap-2 mt-3 pt-3 border-t" style="border-color: var(--border);">
                <a href="{{ route('admin.payments.create', $student->id) }}"
                   class="flex-1 btn-payment action-btn justify-center">
                    <i class="fas fa-plus-circle"></i>
                    Add Payment
                </a>

                <a href="{{ route('admin.payments.student', $student->id) }}"
                   class="flex-1 btn-history action-btn justify-center">
                    <i class="fas fa-history"></i>
                    History
                </a>
            </div>
        </div>
        @endforeach

        <!-- No Results Message -->
        <div id="mobileNoMatch" class="text-center py-8 hidden">
            <i class="fas fa-search text-4xl mb-3" style="color: var(--text-soft);"></i>
            <p class="text-lg font-semibold" style="color: var(--text);">No students found</p>
            <p class="text-sm" style="color: var(--text-soft);">Try adjusting your search</p>
        </div>
    </div>
</div>

<!-- Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('tableSearch');
    const tableRows = document.querySelectorAll('#feesTable tbody tr.student-row');
    const mobileCards = document.querySelectorAll('.student-card');
    const tableInfo = document.getElementById('tableInfo');
    const mobileNoMatch = document.getElementById('mobileNoMatch');

    function filterStudents() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let desktopVisible = 0;
        let mobileVisible = 0;

        // Filter desktop table
        tableRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matches = text.includes(searchTerm);
            row.style.display = matches ? '' : 'none';
            if (matches) desktopVisible++;
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const searchData = card.dataset.search || card.innerText.toLowerCase();
            const matches = searchData.includes(searchTerm);
            card.style.display = matches ? 'block' : 'none';
            if (matches) mobileVisible++;
        });

        // Update table info
        if (tableInfo) {
            tableInfo.textContent = `Showing ${desktopVisible} of ${tableRows.length} students`;
        }

        // Show/hide no results on mobile
        if (mobileVisible === 0 && mobileCards.length > 0) {
            mobileNoMatch.classList.remove('hidden');
        } else {
            mobileNoMatch.classList.add('hidden');
        }
    }

    if (searchInput) {
        searchInput.addEventListener('keyup', filterStudents);
        
        // Initial count
        if (tableInfo) {
            tableInfo.textContent = `Showing ${tableRows.length} of ${tableRows.length} students`;
        }
    }
});
</script>

<!-- Export Button (Optional) -->
<div class="mt-6 flex justify-end no-print">
    <button onclick="exportToCSV()" 
            class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
            style="border-color: var(--gold-rich); color: var(--gold-rich);"
            onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
        <i class="fas fa-download mr-2"></i> Export Report
    </button>
</div>

<script>
function exportToCSV() {
    // Simple CSV export function
    let csv = "Student,ID,Course,Course Fee,Paid,Pending,Status\n";
    
    @foreach($students as $student)
        @php
            $courseFee = $student->course->fees ?? 0;
            $totalPaid = $student->payments->sum('amount');
            $pending = $courseFee - $totalPaid;
            $status = $pending <= 0 ? 'Fully Paid' : ($totalPaid > 0 ? 'Partial' : 'Pending');
        @endphp
        csv += "{{ $student->name }},ST{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }},{{ $student->course->title ?? 'No Course' }},{{ $courseFee }},{{ $totalPaid }},{{ $pending }},{{ $status }}\n";
    @endforeach
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'fees_report.csv';
    a.click();
}
</script>

@endsection