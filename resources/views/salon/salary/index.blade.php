@extends('salon.layouts.app')

@section('content')

<style>
/* ================ STAFF SALARY REPORT PAGE - DARK GOLD THEME ================ */

/* ================ PAGE CONTAINER ================ */
.salary-wrapper{
    padding:25px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.salary-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
}

.salary-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 40px var(--glow);
}

.salary-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ CARD HEADER ================ */
.card-header{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim)) !important;
    border-bottom:1px solid var(--border);
    padding:10px 15px;
}

.card-header h5{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:16px;
    color:#000000;
    margin:0;
    display:flex;
    align-items:center;
    gap:10px;
}

.card-header h5 i{
    color:#000000;
}

/* ================ ALERT MESSAGES ================ */
.alert-success{
    background:rgba(25, 135, 84, 0.15);
    border-left:4px solid #198754;
    border-radius:12px;
    padding:15px 20px;
    color:#198754;
    font-weight:500;
    margin-bottom:20px;
    border:1px solid #198754;
}

.alert-warning{
    background:rgba(255, 193, 7, 0.15);
    border-left:4px solid #ffc107;
    border-radius:12px;
    padding:15px 20px;
    color:#ffc107;
    font-weight:500;
    margin-bottom:20px;
    border:1px solid #ffc107;
}

/* Dark mode adjustments */
body:not(.light) .alert-success{
    background:rgba(25, 135, 84, 0.25);
    color:#6fcf97;
}

body:not(.light) .alert-warning{
    background:rgba(255, 193, 7, 0.25);
    color:#ffe083;
}

/* ================ FILTER SECTION ================ */
.filter-section{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    align-items:center;
}

.search-input{
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:40px;
    padding:10px 18px;
    color:var(--text);
    font-size:14px;
    width:250px;
    transition:.3s;
}

.search-input:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

.search-input::placeholder{
    color:var(--text-soft);
    opacity:0.7;
}

.btn-generate{
    background:transparent;
    border:1.5px solid #000000;
    color:#000000;
    border-radius:40px;
    padding:10px 22px;
    font-size:14px;
    font-weight:500;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
}

.btn-generate:hover{
    background:#000000;
    color:var(--gold-rich);
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

/* Date inputs */
.date-input{
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:40px;
    padding:8px 15px;
    color:var(--text);
    font-size:13px;
    width:140px;
}

.date-input:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

.btn-filter{
    background:var(--gold-rich);
    color:#000000;
    border:none;
    border-radius:40px;
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:.3s;
}

.btn-filter:hover{
    background:var(--gold-glow);
    transform:translateY(-2px);
    box-shadow:0 8px 20px var(--glow);
}

/* ================ TABLE CONTAINER ================ */
.table-container{
    padding:25px;
    overflow-x:auto;
}

/* ================ TABLE ================ */
.table{
    width:100%;
    border-collapse:collapse;
    min-width:1200px;
}

.table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.table thead th{
    color:#000000;
    font-weight:600;
    font-size:13px;
    padding:15px 10px;
    text-align:center;
    white-space:nowrap;
    border:none;
}

.table tbody td{
    padding:15px 10px;
    color:var(--text);
    border-bottom:1px solid var(--border);
    background:var(--card);
    text-align:center;
    vertical-align:middle;
    font-size:13px;
}

/* Alternate row shading */
.table tbody tr:nth-child(even) td{
    background:var(--hover);
}

/* Row hover */
.table tbody tr:hover td{
    background:var(--gold-dim) !important;
}

/* Staff name */
.staff-name{
    font-weight:600;
    color:var(--gold-rich);
    text-align:left;
    display:flex;
    align-items:center;
    gap:8px;
}

.staff-name i{
    color:var(--gold-rich);
}

/* ================ BADGES ================ */
.badge{
    padding:5px 12px;
    border-radius:30px;
    font-size:11px;
    font-weight:600;
    display:inline-block;
}

.badge.bg-primary{
    background:rgba(13, 110, 253, 0.15) !important;
    color:#0d6efd;
    border:1px solid #0d6efd;
}

.badge.bg-warning{
    background:rgba(255, 193, 7, 0.15) !important;
    color:#ffc107;
    border:1px solid #ffc107;
}

/* Dark mode badges */
body:not(.light) .badge.bg-primary{
    background:rgba(13, 110, 253, 0.25) !important;
    color:#8bb9fe;
}

body:not(.light) .badge.bg-warning{
    background:rgba(255, 193, 7, 0.25) !important;
    color:#ffe083;
}

/* ================ AMOUNT STYLES ================ */
.amount-service{
    font-weight:600;
    color:var(--gold-rich);
}

.amount-bonus{
    font-weight:600;
    color:#0d6efd;
}

.amount-final{
    font-weight:700;
    color:#198754;
    font-size:14px;
}

/* ================ ACTION BUTTONS ================ */
.action-buttons{
    display:flex;
    gap:5px;
    justify-content:center;
    flex-wrap:wrap;
}

.btn-action{
    padding:6px 12px;
    border-radius:8px;
    font-size:11px;
    font-weight:500;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:4px;
    border:1.5px solid transparent;
    text-decoration:none;
}

.btn-view{
    background:transparent;
    border-color:var(--gold-dim);
    color:var(--gold-rich);
}

.btn-view:hover{
    background:var(--gold-rich);
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px var(--glow);
}

.btn-edit{
    background:transparent;
    border-color:#ffc107;
    color:#ffc107;
}

.btn-edit:hover{
    background:#ffc107;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px rgba(255,193,7,0.3);
}

.btn-delete{
    background:transparent;
    border-color:#dc3545;
    color:#dc3545;
}

.btn-delete:hover{
    background:#dc3545;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px rgba(220,53,69,0.3);
}

/* ================ SUMMARY CARDS ================ */
.summary-section{
    padding:0 25px 25px 25px;
}

.summary-card{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:16px;
    padding:18px;
    transition:.3s;
}

.summary-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 8px 20px var(--glow);
    transform:translateY(-3px);
}

.summary-label{
    color:var(--text-soft);
    font-size:13px;
    margin-bottom:8px;
    display:flex;
    align-items:center;
    gap:6px;
}

.summary-label i{
    color:var(--gold-rich);
}

.summary-value{
    font-family:'Playfair Display', serif;
    font-size:26px;
    font-weight:700;
}

.summary-value.service{
    color:#0d6efd;
}

.summary-value.salary{
    color:#198754;
}

/* ================ EMPTY STATE ================ */
.empty-state{
    text-align:center;
    padding:40px;
    color:var(--text-soft);
}

.empty-state i{
    font-size:48px;
    color:var(--gold-rich);
    margin-bottom:15px;
    opacity:0.5;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .salary-card{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

body.light .search-input,
body.light .date-input{
    background:#ffffff;
    border-color:#E5E0D8;
    color:#1A1A1A;
}

body.light .summary-card{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .card-header{
        padding:15px;
    }
    
    .filter-section{
        flex-direction:column;
        width:100%;
    }
    
    .search-input{
        width:100%;
    }
    
    .date-input{
        width:100%;
    }
    
    .btn-filter{
        width:100%;
        height:45px;
    }
    
    .table-container{
        padding:15px;
    }
    
    .summary-section{
        padding:0 15px 15px 15px;
    }
    
    .summary-value{
        font-size:22px;
    }
}

/* ================ PERIOD TEXT ================ */
.period-text{
    font-size:12px;
    color:var(--text-soft);
}

.period-text i{
    color:var(--gold-rich);
    margin-right:4px;
}
</style>

<div class="salary-wrapper">
    <div class="salary-card">

        <!-- Card Header -->
        <div class="card-header">
            @if(session('success'))
            <div class="alert-success">
                <i class="fa fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
            @endif

            @if(session('warning'))
            <div class="alert-warning">
                <i class="fa fa-exclamation-triangle me-2"></i>
                {{ session('warning') }}
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h5>
                    <i class="fa fa-chart-line"></i>
                    Monthly Staff Salary Report
                </h5>

                <div class="filter-section">
                    <input type="text"
                           id="staffSearch"
                           class="search-input"
                           placeholder="🔍 Search Staff Name...">

                    <a href="{{ route('salary.generate.form') }}"
                       class="btn-generate">
                        <i class="fa fa-calculator"></i>
                        Generate Salary
                    </a>

                    <form method="GET" class="d-flex gap-2">
                        <input type="month"
                               name="from_month"
                               value="{{ request('from_month') }}"
                               class="date-input"
                               placeholder="From">

                        <input type="month"
                               name="to_month"
                               value="{{ request('to_month') }}"
                               class="date-input"
                               placeholder="To">

                        <button class="btn-filter">
                            <i class="fa fa-filter"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Staff Name</th>
                            <th>Service Amount</th>
                            <th>Jobs Done</th>
                            <th>Salary Type</th>
                            <th>Commission %</th>
                            <th>Bonus (₹)</th>
                            <th>Period</th>
                            <th>Final Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="staffTable">
                        @forelse($salaries as $index => $salary)
                        <tr>
                            <td>
                                <span style="color:var(--gold-rich); font-weight:600;">
                                    {{ $index + 1 }}
                                </span>
                            </td>

                            <td class="staff-name">
                                <i class="fa fa-user-circle"></i>
                                {{ $salary->staff->name }}
                            </td>

                            <td>
                                <span class="amount-service">
                                    ₹{{ number_format($salary->service_total ?? 0, 2) }}
                                </span>
                            </td>

                            <td>
                                <span class="badge" style="background:var(--hover); color:var(--gold-rich); border-color:var(--gold-dim);">
                                    <i class="fa fa-check-circle me-1"></i>
                                    {{ $salary->service_count ?? 0 }}
                                </span>
                            </td>

                            <td>
                                @if($salary->staff->salary_type == 'fixed')
                                    <span class="badge bg-primary">
                                        <i class="fa fa-lock me-1"></i>
                                        Fixed
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="fa fa-percent me-1"></i>
                                        Commission
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($salary->staff->salary_type == 'commission')
                                    <span style="color:var(--gold-rich); font-weight:600;">
                                        {{ $salary->staff->commission_percent ?? 0 }}%
                                    </span>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                <span class="amount-bonus">
                                    ₹{{ number_format($salary->bonus ?? 0, 2) }}
                                </span>
                            </td>

                            <td>
                                <div class="period-text">
                                    <i class="fa fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($salary->from_date)->format('d M') }} -
                                    {{ \Carbon\Carbon::parse($salary->to_date)->format('d M Y') }}
                                </div>
                            </td>

                            <td>
                                <span class="amount-final">
                                    ₹{{ number_format($salary->final_salary ?? 0, 2) }}
                                </span>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="https://wa.me/91{{ $salary->staff->phone }}?text=
Hello%20{{ $salary->staff->name }}%0A
Your%20salary%20slip%20is%20ready.%0A%0A
Service%20Earnings:%20₹{{ number_format($salary->service_total,2) }}%0A
Bonus:%20₹{{ number_format($salary->bonus,2) }}%0A
Total%20Salary:%20₹{{ number_format($salary->final_salary,2) }}%0A%0A
Period:%20{{ $salary->from_date }}%20to%20{{ $salary->to_date }}%0A%0A
Download%20Slip:%0A
{{ url('/salary-slip/'.$salary->id) }}"
target="_blank"
class="btn-action "
style="background:#25D366;color:white;border:1px solid #25D366"
title="Send Salary Slip">
<i class="fab fa-whatsapp"></i>
</a>
                                    <a href="{{ route('salary.staff.details', $salary->staff_id) }}"
                                       class="btn-action btn-view"
                                       title="View Details">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route('salary.edit', $salary->id) }}"
                                       class="btn-action btn-edit"
                                       title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('salary.delete', $salary->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('Delete this salary record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn-action btn-delete"
                                                title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                <div class="empty-state">
                                    <i class="fa fa-money-bill-wave"></i>
                                    <p>No Salary Records Found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Summary Section -->
        <div class="summary-section">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="summary-card">
                        <div class="summary-label">
                            <i class="fa fa-chart-pie"></i>
                            Total Service Revenue
                        </div>
                        <div class="summary-value service">
                            ₹{{ number_format($grandTotalService ?? 0, 2) }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="summary-card">
                        <div class="summary-label">
                            <i class="fa fa-wallet"></i>
                            Total Salary Payable
                        </div>
                        <div class="summary-value salary">
                            ₹{{ number_format($grandTotalSalary ?? 0, 2) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('staffSearch');
    
    if(searchInput) {
        searchInput.addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#staffTable tr");
            
            rows.forEach(function(row) {
                let nameElement = row.querySelector(".staff-name");
                
                if(nameElement) {
                    let text = nameElement.innerText.toLowerCase();
                    row.style.display = text.includes(value) ? "" : "none";
                }
            });
        });
    }
});
</script>

@endsection