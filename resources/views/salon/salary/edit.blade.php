@extends('salon.layouts.app')

@section('content')

<style>
/* ================ EDIT STAFF SALARY PAGE - PROFESSIONAL DARK GOLD ================ */

/* ================ PAGE CONTAINER ================ */
.edit-salary-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
    display:flex;
    align-items:flex-start;
    justify-content:center;
}

/* ================ MAIN CARD ================ */
.edit-card{
    max-width:900px;
    width:100%;
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
}

.edit-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

.edit-card::before{
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
    padding:20px 25px;
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
    font-size:22px;
}

/* ================ CARD BODY ================ */
.card-body{
    padding:25px;
    background:var(--card);
}

/* ================ SECTION TITLE ================ */
.section-title{
    font-family:'Playfair Display', serif;
    font-weight:600;
    font-size:16px;
    color:var(--gold-rich);
    margin:20px 0 15px;
    padding-bottom:8px;
    border-bottom:1px dashed var(--border);
    display:flex;
    align-items:center;
    gap:8px;
}

.section-title i{
    color:var(--gold-rich);
}

.section-title:first-of-type{
    margin-top:0;
}

/* ================ FORM LABELS ================ */
.form-label{
    font-weight:500;
    margin-bottom:6px;
    color:var(--text-soft);
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:0.3px;
    display:flex;
    align-items:center;
    gap:5px;
}

.form-label i{
    color:var(--gold-rich);
    font-size:12px;
}

/* ================ FORM CONTROLS ================ */
.form-control{
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:12px;
    color:var(--text);
    font-size:14px;
    padding:12px 15px;
    transition:.3s;
    width:100%;
    height:45px;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

.form-control:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

.form-control[readonly]{
    background:var(--hover);
    cursor:default;
    color:var(--text);
    border-color:var(--border);
}

/* ================ READONLY FIELDS STYLING ================ */
.readonly-field{
    background:var(--hover) !important;
    border-color:var(--border) !important;
    color:var(--text) !important;
    font-weight:500;
}

.readonly-field i{
    color:var(--gold-rich);
    margin-right:5px;
}

/* ================ VALUE HIGHLIGHT ================ */
.value-highlight{
    color:var(--gold-rich);
    font-weight:600;
}

/* ================ AMOUNT DISPLAY ================ */
.amount-display{
    font-size:15px;
    font-weight:600;
}

.amount-display.commission{
    color:#0d6efd;
}

.amount-display.final{
    color:#198754;
    font-size:16px;
}

/* ================ BONUS INPUT ================ */
.bonus-input{
    background:var(--bg);
    border:1.5px solid var(--gold-dim);
    border-radius:12px;
    color:var(--text);
    font-size:14px;
    padding:12px 15px;
    transition:.3s;
    width:100%;
    height:45px;
}

.bonus-input:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

/* ================ FINAL SALARY BOX ================ */
.final-salary-box{
    background:linear-gradient(135deg, var(--gold-dim), var(--gold-rich));
    border-radius:12px;
    padding:15px;
    text-align:center;
    height:45px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.final-salary-box span{
    color:#000000;
    font-weight:700;
    font-size:16px;
}

/* ================ BUTTONS ================ */
.btn-update{
    background:#198754;
    color:white;
    border:none;
    border-radius:40px;
    padding:12px 30px;
    font-weight:600;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    border:1px solid #198754;
}

.btn-update:hover{
    background:#146c43;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(25,135,84,0.3);
    color:white;
}

.btn-back{
    background:transparent;
    color:var(--text-soft);
    border:1.5px solid var(--gold-dim);
    border-radius:40px;
    padding:12px 30px;
    font-weight:500;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    margin-left:10px;
}

.btn-back:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
    transform:translateY(-2px);
    box-shadow:0 5px 15px var(--glow);
}

/* ================ INFO GRID ================ */
.info-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));
    gap:20px;
    margin-bottom:20px;
}

.info-item{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:12px;
    padding:15px;
}

.info-label{
    color:var(--text-soft);
    font-size:11px;
    text-transform:uppercase;
    letter-spacing:0.3px;
    margin-bottom:5px;
    display:flex;
    align-items:center;
    gap:5px;
}

.info-label i{
    color:var(--gold-rich);
}

.info-value{
    color:var(--text);
    font-size:16px;
    font-weight:600;
}

/* ================ DIVIDER ================ */
.divider{
    border-top:1px solid var(--border);
    margin:25px 0;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .edit-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .form-control{
    background:#ffffff;
    border-color:#E5E0D8;
    color:#1A1A1A;
}

body.light .form-control[readonly]{
    background:#f8f8f8;
}

body.light .info-item{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .card-body{
        padding:20px;
    }
    
    .card-header h5{
        font-size:18px;
    }
    
    .info-grid{
        grid-template-columns:1fr;
        gap:15px;
    }
    
    .btn-update,
    .btn-back{
        width:100%;
        justify-content:center;
        margin:5px 0;
    }
    
    .btn-back{
        margin-left:0;
    }
}

/* ================ ANIMATION ================ */
@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.edit-card{
    animation:fadeIn 0.4s ease;
}
</style>

<div class="edit-salary-wrapper">
    <div class="edit-card">

        <!-- Card Header -->
        <div class="card-header">
            <h5>
                <i class="fa fa-edit"></i>
                Edit Staff Salary
            </h5>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <form method="POST"
                  action="{{ route('salary.update', $salary->id) }}">

                @csrf
                @method('PUT')

                <!-- Staff Information Section -->
                <div class="section-title">
                    <i class="fa fa-user-circle"></i>
                    Staff Information
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa fa-user"></i>
                            Staff Name
                        </div>
                        <div class="info-value">
                            <i class="fa fa-user-tie" style="color:var(--gold-rich); margin-right:5px;"></i>
                            {{ $staff->name }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa fa-calendar"></i>
                            From Date
                        </div>
                        <div class="info-value">
                            <i class="fa fa-calendar-alt" style="color:var(--gold-rich); margin-right:5px;"></i>
                            {{ \Carbon\Carbon::parse($salary->from_date)->format('d M, Y') }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa fa-calendar"></i>
                            To Date
                        </div>
                        <div class="info-value">
                            <i class="fa fa-calendar-check" style="color:var(--gold-rich); margin-right:5px;"></i>
                            {{ \Carbon\Carbon::parse($salary->to_date)->format('d M, Y') }}
                        </div>
                    </div>
                </div>

                <!-- Salary Details Section -->
                <div class="section-title">
                    <i class="fa fa-chart-line"></i>
                    Salary Details
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa fa-money-bill-wave"></i>
                            Service Amount
                        </div>
                        <div class="info-value" style="color:var(--gold-rich);">
                            ₹{{ number_format($salary->total_service_amount, 2) }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa fa-tag"></i>
                            Salary Type
                        </div>
                        <div class="info-value">
                            @if($staff->salary_type == 'fixed')
                                <span style="color:#0d6efd;">📌 Fixed Salary</span>
                            @else
                                <span style="color:#ffc107;">📊 Commission Based</span>
                            @endif
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa fa-percent"></i>
                            Commission Rate
                        </div>
                        <div class="info-value" style="color:#ffc107;">
                            @if($staff->salary_type == 'commission')
                                {{ $staff->commission_percent ?? 0 }}%
                            @else
                                —
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Calculation Section -->
                <div class="section-title">
                    <i class="fa fa-calculator"></i>
                    Salary Calculation
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label">
                            <i class="fa fa-percent"></i>
                            Commission Amount
                        </label>
                        <input type="text"
                               class="form-control readonly-field"
                               value="₹{{ number_format($salary->commission_amount ?? 0, 2) }}"
                               readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            <i class="fa fa-gift"></i>
                            Bonus Amount
                        </label>
                        <input type="number"
                               name="bonus"
                               id="bonusInput"
                               class="bonus-input"
                               value="{{ $salary->bonus }}"
                               min="0"
                               step="100"
                               oninput="calculateFinal()"
                               placeholder="Enter bonus">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            <i class="fa fa-money-bill-wave"></i>
                            Final Salary
                        </label>
                        <div class="final-salary-box" id="finalSalaryBox">
                            <span id="finalSalaryDisplay">₹{{ number_format($salary->final_salary, 2) }}</span>
                        </div>
                        <input type="hidden"
                               name="final_salary"
                               id="finalSalaryHidden"
                               value="{{ $salary->final_salary }}">
                        <input type="text"
                               id="finalSalary"
                               class="form-control"
                               value="{{ number_format($salary->final_salary, 2) }}"
                               readonly
                               style="display:none;">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4">
                    <button type="submit" class="btn-update">
                        <i class="fa fa-save"></i>
                        Update Salary Record
                    </button>

                    <a href="{{ route('salary.index') }}" class="btn-back">
                        <i class="fa fa-arrow-left"></i>
                        Back to List
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>

<!-- Calculation Script -->
<script>
function calculateFinal() {
    @php
        $baseAmount = $staff->salary_type == 'fixed' 
            ? ($staff->fixed_salary ?? 0) 
            : ($salary->commission_amount ?? 0);
    @endphp

    let base = parseFloat({{ $baseAmount }}) || 0;
    let bonus = parseFloat(document.getElementById('bonusInput').value) || 0;
    let final = base + bonus;

    // Update display
    document.getElementById('finalSalaryDisplay').innerText = '₹' + final.toFixed(2);
    document.getElementById('finalSalary').value = final.toFixed(2);
    document.getElementById('finalSalaryHidden').value = final;
}

// Auto-run on page load
document.addEventListener('DOMContentLoaded', function() {
    calculateFinal();
});
</script>

@endsection