@extends('salon.layouts.app')

@section('content')

<style>
/* ================ STAFF VIEW PAGE - COMPLETE PROFILE ================ */

/* ================ PAGE CONTAINER ================ */
.staff-view-wrapper{
    padding:20px 10px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.profile-card{
    background:var(--card);
    border:1px solid var(--gold-dim);
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
    max-width:100%;
    margin:0 auto;
}

.profile-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

.profile-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:2px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ PROFILE HEADER ================ */
.profile-header{
    background:linear-gradient(135deg, var(--gold-dim), var(--gold-rich));
    padding:20px 15px;
    position:relative;
    overflow:hidden;
}

.profile-header::after{
    content:'';
    position:absolute;
    top:-50px;
    right:-50px;
    width:200px;
    height:200px;
    background:rgba(255,255,255,0.1);
    border-radius:50%;
}

.profile-header-content{
    display:flex;
    align-items:center;
    gap:30px;
    flex-wrap:wrap;
    position:relative;
    z-index:2;
}

/* Profile Photo */
.profile-photo{
    width:120px;
    height:120px;
    border-radius:50%;
    border:4px solid #FFFFFF;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    object-fit:cover;
    background:var(--card);
}

.profile-photo-placeholder{
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(255,255,255,0.2);
    display:flex;
    align-items:center;
    justify-content:center;
    border:4px solid #FFFFFF;
}

.profile-photo-placeholder i{
    font-size:50px;
    color:#FFFFFF;
}

/* Profile Info */
.profile-info{
    flex:1;
}

.profile-name{
    font-family:'Playfair Display', serif;
    font-size:32px;
    font-weight:800;
    color:#FFFFFF;
    margin-bottom:5px;
}

.profile-role{
    font-size:16px;
    color:rgba(255,255,255,0.9);
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:10px;
}

.profile-role i{
    color:rgba(255,255,255,0.8);
}

.profile-meta{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.meta-item{
    display:flex;
    align-items:center;
    gap:8px;
    color:#FFFFFF;
    font-size:14px;
    background:rgba(255,255,255,0.1);
    padding:5px 15px;
    border-radius:30px;
}

.meta-item i{
    color:rgba(255,255,255,0.8);
}

/* Action Buttons in Header */
.header-actions{
    display:flex;
    gap:10px;
    margin-left:auto;
}

.btn-header{
    background:rgba(255,255,255,0.2);
    color:#FFFFFF;
    border:1px solid rgba(255,255,255,0.3);
    border-radius:40px;
    padding:10px 20px;
    font-size:14px;
    font-weight:500;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
}

.btn-header:hover{
    background:rgba(255,255,255,0.3);
    transform:translateY(-2px);
}

/* ================ PROFILE BODY ================ */
.profile-body{
    padding:30px;
}

/* Section Title */
.section-title{
    font-family:'Playfair Display', serif;
    font-size:20px;
    font-weight:700;
    color:var(--gold-rich);
    margin:30px 0 20px;
    display:flex;
    align-items:center;
    gap:10px;
    padding-bottom:10px;
    border-bottom:2px solid var(--border);
}

.section-title i{
    color:var(--gold-rich);
}

.section-title:first-of-type{
    margin-top:0;
}

/* Info Grid */
.info-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));
    gap:20px;
    margin-bottom:20px;
}

.info-card{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:16px;
    padding:18px;
    transition:.3s;
}

.info-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 8px 20px var(--glow);
    transform:translateY(-3px);
}

.info-label{
    color:var(--text-soft);
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:0.5px;
    margin-bottom:8px;
    display:flex;
    align-items:center;
    gap:6px;
}

.info-label i{
    color:var(--gold-rich);
}

.info-value{
    color:var(--text);
    font-size:18px;
    font-weight:600;
}

.info-value small{
    font-size:13px;
    color:var(--text-soft);
    font-weight:normal;
    margin-left:5px;
}

/* Salary Type Badge */
.salary-badge{
    display:inline-block;
    padding:5px 15px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.salary-badge.fixed{
    background:rgba(13, 110, 253, 0.15);
    color:#0d6efd;
    border:1px solid #0d6efd;
}

.salary-badge.commission{
    background:rgba(255, 193, 7, 0.15);
    color:#ffc107;
    border:1px solid #ffc107;
}

/* Stats Cards */
.stats-row{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));
    gap:20px;
    margin:20px 0;
}

.stat-card-mini{
    background:linear-gradient(135deg, var(--card), var(--hover));
    border:1px solid var(--border);
    border-radius:16px;
    padding:20px;
    text-align:center;
    transition:.3s;
}

.stat-card-mini:hover{
    border-color:var(--gold-rich);
    box-shadow:0 10px 25px var(--glow);
    transform:translateY(-5px);
}

.stat-icon-mini{
    width:50px;
    height:50px;
    border-radius:50%;
    background:var(--gold-dim);
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 15px;
    color:#000000;
    font-size:20px;
}

.stat-label-mini{
    color:var(--text-soft);
    font-size:12px;
    text-transform:uppercase;
    margin-bottom:5px;
}

.stat-value-mini{
    color:var(--text);
    font-size:24px;
    font-weight:700;
    font-family:'Playfair Display', serif;
}

.stat-value-mini.service{
    color:#0d6efd;
}

.stat-value-mini.earn{
    color:#198754;
}

.stat-value-mini.salary{
    color:var(--gold-rich);
}

/* Services Grid */
.services-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(250px, 1fr));
    gap:15px;
    margin:15px 0;
}

.service-tag{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:12px;
    padding:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    transition:.3s;
}

.service-tag:hover{
    border-color:var(--gold-rich);
    box-shadow:0 5px 15px var(--glow);
    transform:translateY(-2px);
}

.service-tag-left{
    display:flex;
    align-items:center;
    gap:10px;
}

.service-tag-left i{
    color:var(--gold-rich);
    font-size:16px;
}

.service-tag-left span{
    color:var(--text);
    font-weight:500;
}

.service-tag-right{
    color:var(--gold-rich);
    font-weight:600;
}

/* Salary History Table */
.table-container{
    overflow-x:auto;
    margin:20px 0;
    border-radius:16px;
    border:1px solid var(--border);
}

.table{
    width:100%;
    border-collapse:collapse;
    min-width:600px;
}

.table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.table thead th{
    color:#000000;
    font-weight:600;
    font-size:13px;
    padding:15px 12px;
    text-align:left;
}

.table tbody td{
    padding:15px 12px;
    color:var(--text);
    border-bottom:1px solid var(--border);
    background:var(--card);
}

.table tbody tr:hover td{
    background:var(--hover);
}

/* Amount colors */
.amount-positive{
    color:#198754;
    font-weight:600;
}

.amount-gold{
    color:var(--gold-rich);
    font-weight:600;
}

/* Back Button */
.back-button{
    margin-bottom:20px;
}

.btn-back{
    background:transparent;
    border:1.5px solid var(--gold-dim);
    color:var(--text-soft);
    border-radius:40px;
    padding:10px 25px;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
}

.btn-back:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
    transform:translateX(-5px);
}

/* Empty State */
.empty-state{
    text-align:center;
    padding:40px;
    color:var(--text-soft);
    background:var(--hover);
    border-radius:16px;
    border:1px dashed var(--gold-dim);
}

.empty-state i{
    font-size:48px;
    color:var(--gold-rich);
    margin-bottom:15px;
    opacity:0.5;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .profile-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .info-card{
    background:#f8f8f8;
}

body.light .service-tag{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .profile-header{
        padding:25px;
    }
    
    .profile-header-content{
        flex-direction:column;
        text-align:center;
    }
    
    .header-actions{
        margin-left:0;
        width:100%;
        justify-content:center;
    }
    
    .profile-name{
        font-size:26px;
    }
    
    .profile-meta{
        justify-content:center;
    }
    
    .info-grid{
        grid-template-columns:1fr;
    }
    
    .stats-row{
        grid-template-columns:1fr;
    }
    
    .services-grid{
        grid-template-columns:1fr;
    }
}
</style>

<div class="staff-view-wrapper">
    <!-- Back Button -->
    <div class="back-button">
        <a href="{{ route('staff.index') }}" class="btn-back">
            <i class="fa fa-arrow-left"></i>
            Back to Staff List
        </a>
    </div>

    <!-- Main Profile Card -->
    <div class="profile-card">

        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-header-content">
                <!-- Photo -->
                @if($staff->photo)
                <img src="{{ asset('storage/'.$staff->photo) }}" 
                     class="profile-photo" 
                     alt="{{ $staff->name }}">
                @else
                <div class="profile-photo-placeholder">
                    <i class="fa fa-user-circle"></i>
                </div>
                @endif

                <!-- Basic Info -->
                <div class="profile-info">
                    <h1 class="profile-name">{{ $staff->name }}</h1>
                    <div class="profile-role">
                        <i class="fa fa-briefcase"></i>
                        {{ $staff->role ?? 'Staff Member' }}
                    </div>
                    <div class="profile-meta">
                        <span class="meta-item">
                            <i class="fa fa-phone"></i>
                            {{ $staff->phone ?? 'N/A' }}
                        </span>
                        <span class="meta-item">
                            <i class="fa fa-envelope"></i>
                            {{ $staff->email ?? 'N/A' }}
                        </span>
                        <span class="meta-item">
                            <i class="fa fa-calendar"></i>
                            Joined: {{ $staff->joining_date ? \Carbon\Carbon::parse($staff->joining_date)->format('d M Y') : 'N/A' }}
                        </span>
                    </div>
                </div>

                <!-- Header Actions -->
                <div class="header-actions">
                    <a href="{{ route('staff.edit', $staff->id) }}" class="btn-header">
                        <i class="fa fa-edit"></i>
                        Edit Profile
                    </a>
                    <a href="{{ route('staff-salary.index') }}?staff_id={{ $staff->id }}" class="btn-header">
                        <i class="fa fa-money-bill"></i>
                        Salary History
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Body -->
        <div class="profile-body">

            <!-- Personal Information -->
            <div class="section-title">
                <i class="fa fa-id-card"></i>
                Personal Information
            </div>

            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-venus-mars"></i>
                        Gender
                    </div>
                    <div class="info-value">
                        {{ ucfirst($staff->gender ?? 'Not specified') }}
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-map-marker"></i>
                        Address
                    </div>
                    <div class="info-value">
                        {{ $staff->address ?? 'Not provided' }}
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-calendar-plus"></i>
                        Joining Date
                    </div>
                    <div class="info-value">
                        {{ $staff->joining_date ? \Carbon\Carbon::parse($staff->joining_date)->format('d F Y') : 'Not set' }}
                    </div>
                </div>
            </div>

            <!-- Salary Information -->
            <div class="section-title">
                <i class="fa fa-money-bill-wave"></i>
                Salary Information
            </div>

            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-tag"></i>
                        Salary Type
                    </div>
                    <div class="info-value">
                        @if($staff->salary_type == 'fixed')
                            <span class="salary-badge fixed">
                                <i class="fa fa-lock"></i> Fixed Salary
                            </span>
                        @else
                            <span class="salary-badge commission">
                                <i class="fa fa-percent"></i> Commission Based
                            </span>
                        @endif
                    </div>
                </div>

                @if($staff->salary_type == 'fixed')
                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-money-bill"></i>
                        Fixed Salary
                    </div>
                    <div class="info-value">
                        ₹{{ number_format($staff->fixed_salary ?? 0, 2) }}
                        <small>per month</small>
                    </div>
                </div>
                @else
                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-percent"></i>
                        Commission Rate
                    </div>
                    <div class="info-value">
                        {{ $staff->commission_percent ?? 0 }}%
                        <small>of service price</small>
                    </div>
                </div>
                @endif

                <div class="info-card">
                    <div class="info-label">
                        <i class="fa fa-calculator"></i>
                        Total Earnings (All Time)
                    </div>
                    <div class="info-value amount-gold">
                        ₹{{ number_format($totalEarnings ?? 0, 2) }}
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-row">
                <div class="stat-card-mini">
                    <div class="stat-icon-mini">
                        <i class="fa fa-scissors"></i>
                    </div>
                    <div class="stat-label-mini">Total Services</div>
                    <div class="stat-value-mini service">{{ $totalServicesCount ?? 0 }}</div>
                </div>

                <div class="stat-card-mini">
                    <div class="stat-icon-mini">
                        <i class="fa fa-calendar-check"></i>
                    </div>
                    <div class="stat-label-mini">Appointments Done</div>
                    <div class="stat-value-mini service">{{ $appointmentsCount ?? 0 }}</div>
                </div>

                <div class="stat-card-mini">
                    <div class="stat-icon-mini">
                        <i class="fa fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-label-mini">This Month Earning</div>
                    <div class="stat-value-mini earn">₹{{ number_format($monthEarnings ?? 0, 2) }}</div>
                </div>

                <div class="stat-card-mini">
                    <div class="stat-icon-mini">
                        <i class="fa fa-chart-line"></i>
                    </div>
                    <div class="stat-label-mini">Average per Service</div>
                    <div class="stat-value-mini salary">
                        ₹{{ number_format($avgEarningPerService ?? 0, 2) }}
                    </div>
                </div>
            </div>

            <!-- Assigned Services -->
            <div class="section-title">
                <i class="fa fa-scissors"></i>
                Services This Staff Can Perform
            </div>

            @if($staff->services && $staff->services->count() > 0)
            <div class="services-grid">
                @foreach($staff->services as $service)
                <div class="service-tag">
                    <div class="service-tag-left">
                        <i class="fa fa-tag"></i>
                        <span>{{ $service->name }}</span>
                    </div>
                    <div class="service-tag-right">
                        ₹{{ number_format($service->price, 2) }}
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <i class="fa fa-scissors"></i>
                <p>No services assigned to this staff member yet.</p>
                <a href="{{ route('staff.edit', $staff->id) }}" class="btn-header" style="display:inline-block; margin-top:10px;">
                    <i class="fa fa-plus"></i> Assign Services
                </a>
            </div>
            @endif

            <!-- Recent Salary History -->
            <div class="section-title">
                <i class="fa fa-history"></i>
                Recent Salary History
            </div>

            @if($salaryHistory && $salaryHistory->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            <th>Service Total</th>
                            <th>Commission</th>
                            <th>Bonus</th>
                            <th>Final Salary</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salaryHistory->take(5) as $salary)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($salary->from_date)->format('d M') }} - 
                                {{ \Carbon\Carbon::parse($salary->to_date)->format('d M Y') }}
                            </td>
                            <td class="amount-gold">₹{{ number_format($salary->total_service_amount, 2) }}</td>
                            <td>
                                @if($staff->salary_type == 'commission')
                                    ₹{{ number_format($salary->commission_amount, 2) }}
                                @else
                                    Fixed
                                @endif
                            </td>
                            <td class="amount-positive">+ ₹{{ number_format($salary->bonus, 2) }}</td>
                            <td class="amount-gold">₹{{ number_format($salary->final_salary, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($salary->created_at)->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($salaryHistory->count() > 5)
            <div style="text-align:right; margin-top:10px;">
                <a href="{{ route('staff-salary.index') }}?staff_id={{ $staff->id }}" class="btn-back" style="border-color:var(--gold-rich); color:var(--gold-rich);">
                    View All Salary Records <i class="fa fa-arrow-right ms-2"></i>
                </a>
            </div>
            @endif
            @else
            <div class="empty-state">
                <i class="fa fa-money-bill"></i>
                <p>No salary records found for this staff member.</p>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection