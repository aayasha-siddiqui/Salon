@extends('salon.layouts.app')

@section('content')

<style>
/* ================ SALARY GENERATE PAGE - PROFESSIONAL DARK GOLD ================ */

/* ================ PAGE CONTAINER ================ */
.salary-generate-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
    display:flex;
    align-items:flex-start;
    justify-content:center;
}

/* ================ MAIN CARD ================ */
.generate-card{
    max-width:900px;
    width:100%;
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    padding:35px;
    position:relative;
    overflow:hidden;
    transition:.3s;
}

.generate-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

/* Gold accent on top */
.generate-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ CARD TITLE ================ */
.card-title{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:26px;
    color:var(--gold-rich);
    margin-bottom:25px;
    padding-bottom:12px;
    border-bottom:2px solid var(--border);
    display:flex;
    align-items:center;
    gap:12px;
}

.card-title i{
    color:var(--gold-rich);
    font-size:28px;
}

/* ================ SECTION TITLE ================ */
.section-title{
    font-family:'Playfair Display', serif;
    font-weight:600;
    font-size:18px;
    color:var(--gold-rich);
    margin:25px 0 20px;
    display:flex;
    align-items:center;
    gap:8px;
}

.section-title i{
    color:var(--gold-rich);
}

/* ================ FORM LABELS ================ */
.form-label{
    font-weight:500;
    margin-bottom:8px;
    color:var(--text-soft);
    font-size:13px;
    display:flex;
    align-items:center;
    gap:6px;
    text-transform:uppercase;
    letter-spacing:0.3px;
}

.form-label i{
    color:var(--gold-rich);
    font-size:14px;
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:14px;
    color:var(--text);
    font-size:14px;
    padding:12px 16px;
    transition:.3s;
    width:100%;
    height:48px;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

.form-control:focus,
.form-select:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

.form-control::placeholder{
    color:var(--text-soft);
    opacity:0.6;
}

/* ================ SELECT DROPDOWN ================ */
.form-select{
    appearance:none;
    background-image:url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238B6B3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat:no-repeat;
    background-position:right 16px center;
    background-size:16px;
    padding-right:45px;
}

.form-select option{
    background:var(--card);
    color:var(--text);
    padding:10px;
}

/* ================ GENERATE BUTTON ================ */
.btn-generate{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-glow));
    color:#000000;
    border:none;
    border-radius:40px;
    padding:12px 30px;
    font-weight:600;
    font-size:14px;
    transition:.4s;
    box-shadow:0 8px 20px var(--glow);
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    width:100%;
    height:48px;
    border:1px solid var(--gold-rich);
}

.btn-generate:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    background:linear-gradient(135deg, var(--gold-glow), var(--gold-rich));
}

.btn-generate i{
    font-size:16px;
}

/* ================ DIVIDER ================ */
.divider{
    border-top:1px solid var(--border);
    margin:30px 0;
    position:relative;
}

.divider::before{
    content:'💰';
    position:absolute;
    top:-12px;
    left:50%;
    transform:translateX(-50%);
    background:var(--card);
    padding:0 15px;
    color:var(--gold-rich);
    font-size:16px;
}

/* ================ RESULT CARD ================ */
.result-card{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:20px;
    padding:25px;
    margin-top:20px;
}

/* ================ DETAILS TABLE ================ */
.details-table{
    width:100%;
    border-collapse:collapse;
    margin:15px 0;
}

.details-table tr{
    border-bottom:1px solid var(--border);
}

.details-table tr:last-child{
    border-bottom:none;
}

.details-table th{
    padding:15px 10px;
    color:var(--text-soft);
    font-weight:500;
    font-size:14px;
    width:40%;
    text-align:left;
}

.details-table td{
    padding:15px 10px;
    color:var(--text);
    font-weight:600;
    font-size:15px;
    text-align:right;
}

.details-table td.amount-highlight{
    color:var(--gold-rich);
    font-size:18px;
    font-weight:700;
}

/* Salary type badge */
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

/* Dark mode badges */
body:not(.light) .salary-badge.fixed{
    background:rgba(13, 110, 253, 0.25);
    color:#8bb9fe;
}

body:not(.light) .salary-badge.commission{
    background:rgba(255, 193, 7, 0.25);
    color:#ffe083;
}

/* ================ BONUS SECTION ================ */
.bonus-section{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:16px;
    padding:20px;
    margin:20px 0;
}

/* ================ FINAL SALARY DISPLAY ================ */
.final-salary-box{
    background:linear-gradient(135deg, var(--gold-dim), var(--gold-rich));
    border-radius:16px;
    padding:20px;
    text-align:center;
    margin:15px 0;
}

.final-salary-label{
    color:#000000;
    font-size:14px;
    font-weight:500;
    margin-bottom:8px;
    text-transform:uppercase;
    letter-spacing:0.5px;
}

.final-salary-value{
    color:#000000;
    font-size:36px;
    font-weight:800;
    line-height:1.2;
}

/* ================ SAVE BUTTON ================ */
.btn-save{
    background:#198754;
    color:white;
    border:none;
    border-radius:40px;
    padding:14px 30px;
    font-weight:600;
    font-size:15px;
    transition:.3s;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    width:100%;
    height:50px;
}

.btn-save:hover{
    background:#146c43;
    transform:translateY(-3px);
    box-shadow:0 8px 20px rgba(25,135,84,0.3);
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .generate-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
    color:#1A1A1A;
}

body.light .result-card{
    background:#f8f8f8;
}

body.light .bonus-section{
    background:#ffffff;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .generate-card{
        padding:25px 20px;
    }
    
    .card-title{
        font-size:22px;
    }
    
    .section-title{
        font-size:17px;
    }
    
    .details-table th{
        font-size:13px;
        padding:12px 8px;
    }
    
    .details-table td{
        font-size:14px;
        padding:12px 8px;
    }
    
    .final-salary-value{
        font-size:28px;
    }
    
    .btn-generate,
    .btn-save{
        height:45px;
        font-size:14px;
    }
}

/* ================ ANIMATIONS ================ */
@keyframes slideDown{
    from{
        opacity:0;
        transform:translateY(-20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.result-card{
    animation:slideDown 0.5s ease;
}

/* ================ UTILITY CLASSES ================ */
.text-gold{
    color:var(--gold-rich);
}

.mb-3{
    margin-bottom:15px;
}

.mt-3{
    margin-top:15px;
}

.me-2{
    margin-right:8px;
}

.w-100{
    width:100%;
}
</style>

<div class="salary-generate-wrapper">
    <div class="generate-card">

        <!-- Card Title -->
        <h4 class="card-title">
            <i class="fa fa-calculator"></i>
            Generate Staff Salary
        </h4>

        <!-- Generation Form -->
        <form method="POST" action="{{ route('salary.calculate') }}">
            @csrf

            <div class="row g-4">
                <div class="col-md-5">
                    <label class="form-label">
                        <i class="fa fa-user-tie"></i>
                        Select Staff Member
                    </label>
                    <select name="staff_id" class="form-select" required>
                        <option value="">— Choose Staff —</option>
                        @foreach($staffs as $staff)
                        <option value="{{ $staff->id }}"
                            {{ isset($selectedStaff) && $selectedStaff->id == $staff->id ? 'selected' : '' }}>
                            👤 {{ $staff->name }} 
                            @if($staff->salary_type == 'fixed')
                                (Fixed Salary)
                            @else
                                (Commission: {{ $staff->commission_percent }}%)
                            @endif
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">
                        <i class="fa fa-calendar-alt"></i>
                        From Date
                    </label>
                    <input type="date" 
                           name="from_date" 
                           class="form-control" 
                           value="{{ request('from_date') }}"
                           max="{{ date('Y-m-d') }}"
                           required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">
                        <i class="fa fa-calendar-alt"></i>
                        To Date
                    </label>
                    <input type="date" 
                           name="to_date" 
                           class="form-control" 
                           value="{{ request('to_date') }}"
                           max="{{ date('Y-m-d') }}"
                           required>
                </div>

                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn-generate">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Salary Results -->
        @if(isset($selectedStaff))
        <div class="divider"></div>

        <div class="section-title">
            <i class="fa fa-file-invoice"></i>
            Salary Details — {{ $selectedStaff->name }}
        </div>

        <div class="result-card">
            <table class="details-table">
                <tr>
                    <th>📊 Total Service Revenue</th>
                    <td class="amount-highlight">₹{{ number_format($totalService, 2) }}</td>
                </tr>
                <tr>
                    <th>✅ Jobs Completed</th>
                    <td>{{ $totalJobs }} Services</td>
                </tr>
                <tr>
                    <th>💰 Salary Type</th>
                    <td>
                        <span class="salary-badge {{ $selectedStaff->salary_type }}">
                            {{ ucfirst($selectedStaff->salary_type) }}
                        </span>
                    </td>
                </tr>
                @if($selectedStaff->salary_type == 'commission')
                <tr>
                    <th>📈 Commission Rate</th>
                    <td class="amount-highlight">{{ $commission }}%</td>
                </tr>
                @endif
                <tr>
                    <th>💵 Base Salary</th>
                    <td class="amount-highlight">₹{{ number_format($baseSalary, 2) }}</td>
                </tr>
            </table>

            <!-- Bonus & Final Section -->
            <form method="POST" action="{{ route('salary.store') }}">
                @csrf
                <input type="hidden" name="staff_id" value="{{ $selectedStaff->id }}">
                <input type="hidden" name="from_date" value="{{ $from_date }}">
                <input type="hidden" name="to_date" value="{{ $to_date }}">
                <input type="hidden" name="final_salary" id="finalSalaryHidden" value="{{ $baseSalary }}">

                <div class="bonus-section">
                    <div class="row g-4 align-items-end">
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="fa fa-gift"></i>
                                Bonus Amount (₹)
                            </label>
                            <input type="number"
                                   name="bonus"
                                   id="bonusInput"
                                   class="form-control"
                                   value="0"
                                   min="0"
                                   step="100"
                                   oninput="calculateFinal()"
                                   placeholder="Enter bonus amount">
                        </div>

                        <div class="col-md-6">
                            <div class="final-salary-box">
                                <div class="final-salary-label">
                                    <i class="fa fa-money-bill-wave"></i>
                                    Final Salary
                                </div>
                                <div class="final-salary-value" id="finalSalaryDisplay">
                                    ₹{{ number_format($baseSalary, 2) }}
                                </div>
                                <input type="text"
                                       id="finalSalary"
                                       class="form-control"
                                       value="{{ number_format($baseSalary, 2) }}"
                                       readonly
                                       style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('salary.generate.form') }}" class="btn-generate" style="background:transparent; border-color:var(--gold-dim); color:var(--text-soft);">
                            <i class="fa fa-undo"></i>
                            Reset
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn-save">
                            <i class="fa fa-save"></i>
                            Save Salary Record
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @else
        <!-- Empty State -->
        <div class="result-card" style="text-align:center; padding:40px;">
            <i class="fa fa-hand-pointer" style="font-size:48px; color:var(--gold-rich); opacity:0.5; margin-bottom:15px;"></i>
            <h5 style="color:var(--text); font-family:'Playfair Display'; margin-bottom:10px;">Select Staff & Date Range</h5>
            <p style="color:var(--text-soft); font-size:14px;">
                Choose a staff member and date range above to calculate salary
            </p>
        </div>
        @endif

    </div>
</div>

<!-- Calculation Script -->
<script>
function calculateFinal() {
    @if(isset($baseSalary))
    let base = {{ $baseSalary }};
    let bonus = parseFloat(document.getElementById('bonusInput').value) || 0;
    let final = base + bonus;
    
    // Update display
    document.getElementById('finalSalaryDisplay').innerText = '₹' + final.toFixed(2);
    document.getElementById('finalSalary').value = final.toFixed(2);
    document.getElementById('finalSalaryHidden').value = final;
    @endif
}

// Auto-run on page load if bonus has value
document.addEventListener('DOMContentLoaded', function() {
    @if(isset($baseSalary) && old('bonus'))
    calculateFinal();
    @endif
});
</script>

@endsection