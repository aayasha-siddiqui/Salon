@extends('salon.layouts.app')

@section('content')

<style>
/* ================ STAFF CREATE PAGE - DARK GOLD THEME ================ */

/* Container */
.container-py{
    padding:20px 0;
}

/* ================ COMPACT CARDS ================ */
.compact-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:18px;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
    padding:22px;
    margin-bottom:22px;
    transition:.3s;
    position:relative;
    overflow:hidden;
}

.compact-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 30px var(--glow);
}

/* Gold accent on top */
.compact-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:3px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

.compact-card:hover::before{
    opacity:1;
}

/* Card Headings */
.compact-card h5{
    font-family:'Playfair Display', serif;
    font-size:24px;
    font-weight:700;
    color:var(--gold-rich);
    margin-bottom:20px;
    padding-bottom:10px;
    border-bottom:1px solid var(--border);
    letter-spacing:0.3px;
}

.compact-card h6{
    font-family:'Playfair Display', serif;
    font-size:18px;
    font-weight:600;
    color:var(--text);
    margin-bottom:18px;
    display:flex;
    align-items:center;
    gap:8px;
    padding-bottom:8px;
    border-bottom:1px dashed var(--border);
}

/* Section Icons */
.section-icon{
    font-size:18px;
    color:var(--gold-rich) !important;
}

.icon-basic,
.icon-salary,
.icon-service,
.icon-photo{
    color:var(--gold-rich) !important;
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
    height:45px;
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:12px;
    color:var(--text);
    font-size:14px;
    padding:10px 15px;
    transition:.3s;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

.form-control:focus,
.form-select:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
    background:var(--bg);
    color:var(--text);
}

.form-control::placeholder{
    color:var(--text-soft);
    opacity:0.6;
}

/* Select dropdown */
.form-select option{
    background:var(--card);
    color:var(--text);
}

/* Checkbox styling */
.form-check-input{
    width:18px;
    height:18px;
    background:var(--bg);
    border:2px solid var(--gold-dim);
    border-radius:4px;
    cursor:pointer;
    transition:.2s;
}

.form-check-input:checked{
    background:var(--gold-rich);
    border-color:var(--gold-rich);
}

.form-check-label{
    color:var(--text-soft);
    font-size:14px;
    margin-left:5px;
    cursor:pointer;
}

.form-check-label:hover{
    color:var(--gold-rich);
}

/* Row gap */
.row.g-2{
    margin:-4px;
}

.row.g-2 > [class*="col-"]{
    padding:4px;
}

/* ================ FILE INPUT ================ */
input[type="file"].form-control{
    padding:8px 15px;
    height:auto;
}

input[type="file"]::file-selector-button{
    background:var(--gold-dim);
    border:1px solid var(--gold-rich);
    border-radius:8px;
    color:white;
    padding:8px 15px;
    margin-right:15px;
    transition:.3s;
}

input[type="file"]::file-selector-button:hover{
    background:var(--gold-rich);
}

/* ================ SUBMIT BUTTON ================ */
.submit-btn{
    background:var(--gold-rich);
    border:none;
    padding:12px 35px;
    border-radius:12px;
    color:#000000;
    font-weight:600;
    font-size:16px;
    transition:.3s;
    box-shadow:0 8px 20px var(--glow);
    display:inline-flex;
    align-items:center;
    gap:10px;
    border:1px solid var(--gold-rich);
}

.submit-btn:hover{
    background:var(--gold-glow);
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    color:#000000;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .compact-card{
    box-shadow:0 5px 15px rgba(0,0,0,0.03);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
}

body.light .form-check-input{
    background:#ffffff;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .compact-card{
        padding:18px;
    }
    
    .compact-card h5{
        font-size:22px;
    }
    
    .compact-card h6{
        font-size:17px;
    }
    
    .form-control,
    .form-select{
        height:42px;
        font-size:13px;
    }
    
    .submit-btn{
        width:100%;
        justify-content:center;
    }
}

/* ================ UTILITY CLASSES ================ */
.text-warning{
    color:var(--gold-rich) !important;
}

.fw-bold{
    font-weight:700 !important;
}

.small{
    font-size:13px;
}

/* Form validation styling */
.is-invalid{
    border-color:#ff6b6b !important;
}

.invalid-feedback{
    color:#ff6b6b;
    font-size:12px;
    margin-top:5px;
}
</style>

<div class="container-fluid py-3">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">

            <!-- Page Title -->
            <h4 class="page-title mb-4">
                <i class="fa-solid fa-user-plus me-2"></i>
                Add New Staff Member
            </h4>

            <!-- Main Card -->
            <div class="compact-card">
                
                <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- BASIC INFORMATION -->
                    <div class="compact-card mb-4">
                        <h6>
                            <i class="fa-solid fa-id-badge section-icon me-2"></i>
                            Basic Information
                        </h6>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <input type="text" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Full Name *" 
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="text" 
                                       name="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       placeholder="Phone Number"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="Email Address"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender')=='other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="text" 
                                       name="role" 
                                       class="form-control @error('role') is-invalid @enderror" 
                                       placeholder="Role (e.g., Hair Stylist)"
                                       value="{{ old('role') }}">
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="date" 
                                       name="joining_date" 
                                       class="form-control @error('joining_date') is-invalid @enderror"
                                       value="{{ old('joining_date') }}">
                                @error('joining_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <textarea name="address" 
                                          class="form-control @error('address') is-invalid @enderror" 
                                          placeholder="Full Address"
                                          rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SALARY DETAILS -->
                    <div class="compact-card mb-4">
                        <h6>
                            <i class="fa-solid fa-money-bill-wave section-icon me-2"></i>
                            Salary Details
                        </h6>

                        <div class="row g-2 align-items-end">
                            <div class="col-md-4">
                                <select name="salary_type" id="salaryType" class="form-select">
                                    <option value="fixed" {{ old('salary_type')=='fixed' ? 'selected' : '' }}>Fixed Salary</option>
                                    <option value="commission" {{ old('salary_type')=='commission' ? 'selected' : '' }}>Commission Based</option>
                                </select>
                            </div>

                            <div class="col-md-4" id="fixedDiv">
                                <input type="number" 
                                       name="fixed_salary" 
                                       id="fixedInput"
                                       class="form-control" 
                                       placeholder="Fixed Salary (₹)"
                                       value="{{ old('fixed_salary') }}">
                            </div>

                            <div class="col-md-4" id="commissionDiv" style="{{ old('salary_type')=='commission' ? '' : 'display:none;' }}">
                                <input type="number" 
                                       name="commission_percent" 
                                       id="commissionInput"
                                       class="form-control" 
                                       placeholder="Commission %"
                                       value="{{ old('commission_percent') }}"
                                       step="0.01"
                                       min="0"
                                       max="100">
                            </div>
                            
                            <div class="col-md-4">
                                <small class="text-muted">* Select salary type first</small>
                            </div>
                        </div>
                    </div>

                    <!-- SERVICES -->
                    <div class="compact-card mb-4">
                        <h6>
                            <i class="fa-solid fa-scissors section-icon me-2"></i>
                            Assign Services
                        </h6>

                        <div class="row g-2">
                            @forelse($services as $service)
                            <div class="col-md-4 col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           name="services[]" 
                                           value="{{ $service->id }}" 
                                           id="service{{ $service->id }}"
                                           {{ is_array(old('services')) && in_array($service->id, old('services')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="service{{ $service->id }}">
                                        {{ $service->name }} 
                                        <span class="text-gold">(₹{{ number_format($service->price) }})</span>
                                    </label>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-muted mb-0">No services available. <a href="{{ route('services.create') }}" class="text-gold">Add services first</a></p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- PHOTO -->
                    <div class="compact-card mb-4">
                        <h6>
                            <i class="fa-solid fa-image section-icon me-2"></i>
                            Profile Photo
                        </h6>

                        <div class="row g-2">
                            <div class="col-md-8">
                                <input type="file" 
                                       name="photo" 
                                       class="form-control @error('photo') is-invalid @enderror"
                                       accept="image/*">
                                <small class="text-muted">* Max size: 2MB (JPG, PNG, GIF)</small>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <small class="text-gold">Recommended: 300x300px</small>
                            </div>
                        </div>
                    </div>

                    <!-- FORM ACTIONS -->
                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="{{ route('staff.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-times me-2"></i> Cancel
                        </a>
                        <button type="submit" class="submit-btn">
                            <i class="fa-solid fa-check me-2"></i> Save Staff
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Salary Type Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const salaryType = document.getElementById('salaryType');
    const fixedDiv = document.getElementById('fixedDiv');
    const commissionDiv = document.getElementById('commissionDiv');
    const fixedInput = document.getElementById('fixedInput');
    const commissionInput = document.getElementById('commissionInput');
    
    if(!salaryType) return;
    
    function toggleSalaryFields() {
        if(salaryType.value === 'commission') {
            // Show commission, hide fixed
            commissionDiv.style.display = 'block';
            fixedDiv.style.display = 'none';
            
            // Enable/disable inputs
            commissionInput.disabled = false;
            fixedInput.disabled = true;
            fixedInput.value = ''; // Clear fixed salary
        } else {
            // Show fixed, hide commission
            fixedDiv.style.display = 'block';
            commissionDiv.style.display = 'none';
            
            // Enable/disable inputs
            fixedInput.disabled = false;
            commissionInput.disabled = true;
            commissionInput.value = ''; // Clear commission
        }
    }
    
    // Initial toggle based on old value
    toggleSalaryFields();
    
    // Add event listener
    salaryType.addEventListener('change', toggleSalaryFields);
});
</script>

@endsection