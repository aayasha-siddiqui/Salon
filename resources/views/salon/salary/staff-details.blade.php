@extends('salon.layouts.app')

@section('content')

<style>
/* ================ STAFF SERVICE DETAILS PAGE - PROFESSIONAL DARK GOLD ================ */

/* ================ PAGE CONTAINER ================ */
.details-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.details-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
}

.details-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

.details-card::before{
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
    padding:18px 25px;
}

.card-header h5{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:20px;
    color:#000000;
    margin:0;
    display:flex;
    align-items:center;
    gap:10px;
}

.card-header h5 i{
    color:#000000;
}

/* Back button */
.btn-back{
    background:rgba(0,0,0,0.2);
    color:#000000;
    border:1px solid rgba(0,0,0,0.3);
    border-radius:30px;
    padding:6px 16px;
    font-size:13px;
    font-weight:500;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:6px;
    text-decoration:none;
}

.btn-back:hover{
    background:rgba(0,0,0,0.3);
    color:#000000;
    transform:translateX(-3px);
}

/* Staff badge */
.staff-badge{
    background:rgba(0,0,0,0.2);
    color:#000000;
    border-radius:30px;
    padding:5px 15px;
    font-size:13px;
    font-weight:600;
    border:1px solid rgba(0,0,0,0.3);
}

.staff-badge i{
    margin-right:5px;
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
    min-width:900px;
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

/* Date styling */
.date-cell{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
}

.date-cell i{
    color:var(--gold-rich);
}

/* Bill number */
.bill-number{
    font-weight:600;
    color:var(--gold-rich);
}

/* Customer name */
.customer-name{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
}

.customer-name i{
    color:var(--gold-rich);
}

/* Service name */
.service-name{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
}

.service-name i{
    color:var(--gold-rich);
}

/* Price column */
.price-column{
    font-weight:700;
    color:var(--gold-rich);
}

/* Commission column */
.commission-column{
    color:#ffc107;
    font-weight:600;
}

/* Earn column */
.earn-column{
    font-weight:700;
    color:#198754;
}

/* Fixed salary text */
.fixed-text{
    color:var(--text-soft);
    font-style:italic;
}

/* ================ SUMMARY CARDS ================ */
.summary-section{
    padding:0 25px 25px 25px;
}

.summary-card{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:20px;
    padding:20px;
    transition:.3s;
    height:100%;
    text-align:center;
}

.summary-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 10px 25px var(--glow);
    transform:translateY(-5px);
}

.summary-label{
    color:var(--text-soft);
    font-size:13px;
    margin-bottom:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    text-transform:uppercase;
    letter-spacing:0.3px;
}

.summary-label i{
    color:var(--gold-rich);
}

.summary-value{
    font-family:'Playfair Display', serif;
    font-size:28px;
    font-weight:800;
    line-height:1.2;
}

.summary-value.service{
    color:#0d6efd;
}

.summary-value.earn{
    color:#198754;
}

.summary-value.type{
    color:var(--gold-rich);
    font-size:24px;
}

/* Salary type badge in summary */
.type-badge{
    display:inline-block;
    padding:5px 20px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
}

.type-badge.fixed{
    background:rgba(13, 110, 253, 0.15);
    color:#0d6efd;
    border:1px solid #0d6efd;
}

.type-badge.commission{
    background:rgba(255, 193, 7, 0.15);
    color:#ffc107;
    border:1px solid #ffc107;
}

/* Dark mode badges */
body:not(.light) .type-badge.fixed{
    background:rgba(13, 110, 253, 0.25);
    color:#8bb9fe;
}

body:not(.light) .type-badge.commission{
    background:rgba(255, 193, 7, 0.25);
    color:#ffe083;
}

/* ================ DIVIDER ================ */
.divider{
    border-top:1px solid var(--border);
    margin:20px 25px;
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
body.light .details-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .summary-card{
    background:#f8f8f8;
}

body.light .table thead{
    background:#f0f0f0;
}

body.light .table thead th{
    color:#1A1A1A;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .card-header{
        padding:15px;
    }
    
    .card-header h5{
        font-size:18px;
    }
    
    .btn-back{
        padding:4px 12px;
        font-size:12px;
    }
    
    .staff-badge{
        padding:4px 10px;
        font-size:12px;
    }
    
    .table-container{
        padding:15px;
    }
    
    .summary-section{
        padding:0 15px 15px 15px;
    }
    
    .summary-value{
        font-size:24px;
    }
    
    .summary-value.type{
        font-size:20px;
    }
    
    .divider{
        margin:15px;
    }
}

/* ================ ANIMATION ================ */
@keyframes slideIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.details-card{
    animation:slideIn 0.5s ease;
}
</style>

<div class="details-wrapper">
    <div class="details-card">

        <!-- Card Header -->
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <a href="{{ route('staff-salary.index') }}" 
                   class="btn-back">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>

                <h5>
                    <i class="fa fa-user-circle"></i>
                    {{ $staff->name }} - Service Details
                </h5>

                <span class="staff-badge">
                    <i class="fa fa-tag"></i>
                    {{ ucfirst($staff->salary_type) }} Salary
                </span>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Bill No.</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Price (₹)</th>
                            <th>Commission</th>
                            <th>Staff Earn (₹)</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $totalService = 0;
                        $totalEarn = 0;
                        @endphp

                        @forelse($services as $index => $item)
                        @php
                        $price = $item->price;
                        $totalService += $price;

                        if($staff->salary_type == 'commission'){
                            $commission = $staff->commission_percent;
                            $earn = ($price * $commission) / 100;
                        } else {
                            $commission = 0;
                            $earn = 0;
                        }

                        $totalEarn += $earn;
                        @endphp

                        <tr>
                            <td>
                                <span style="color:var(--gold-rich); font-weight:600;">
                                    {{ $index + 1 }}
                                </span>
                            </td>

                            <td>
                                <div class="date-cell">
                                    <i class="fa fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                </div>
                            </td>

                            <td>
                                <span class="bill-number">
                                    <i class="fa fa-receipt"></i>
                                    #{{ $item->bill_id }}
                                </span>
                            </td>

                            <td>
                                <div class="customer-name">
                                    <i class="fa fa-user"></i>
                                    {{ $item->bill->customer_name ?? '—' }}
                                </div>
                            </td>

                            <td>
                                <div class="service-name">
                                    <i class="fa fa-scissors"></i>
                                    {{ $item->service->name ?? '—' }}
                                </div>
                            </td>

                            <td>
                                <span class="price-column">
                                    ₹{{ number_format($price, 2) }}
                                </span>
                            </td>

                            <td>
                                @if($staff->salary_type == 'commission')
                                    <span class="commission-column">
                                        <i class="fa fa-percent"></i>
                                        {{ $staff->commission_percent }}%
                                    </span>
                                @else
                                    <span class="fixed-text">—</span>
                                @endif
                            </td>

                            <td>
                                @if($staff->salary_type == 'commission')
                                    <span class="earn-column">
                                        <i class="fa fa-money-bill-wave"></i>
                                        ₹{{ number_format($earn, 2) }}
                                    </span>
                                @else
                                    <span class="fixed-text">
                                        <i class="fa fa-lock"></i>
                                        Fixed Salary
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="empty-state">
                                    <i class="fa fa-calendar-times"></i>
                                    <p>No service records found for this staff member</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($services->count() > 0)
        <!-- Divider -->
        <div class="divider"></div>

        <!-- Summary Section -->
        <div class="summary-section">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="summary-card">
                        <div class="summary-label">
                            <i class="fa fa-chart-pie"></i>
                            Total Service Revenue
                        </div>
                        <div class="summary-value service">
                            ₹{{ number_format($totalService, 2) }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="summary-card">
                        <div class="summary-label">
                            <i class="fa fa-wallet"></i>
                            Staff Earnings
                        </div>
                        <div class="summary-value earn">
                            @if($staff->salary_type == 'commission')
                                ₹{{ number_format($totalEarn, 2) }}
                            @else
                                <span style="color:var(--text-soft); font-size:16px;">Fixed Salary Structure</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="summary-card">
                        <div class="summary-label">
                            <i class="fa fa-tag"></i>
                            Salary Type
                        </div>
                        <div class="summary-value type">
                            <span class="type-badge {{ $staff->salary_type }}">
                                {{ ucfirst($staff->salary_type) }}
                                @if($staff->salary_type == 'commission')
                                    ({{ $staff->commission_percent }}%)
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

@endsection