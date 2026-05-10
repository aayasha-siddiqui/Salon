@extends('salon.layouts.app')

@section('content')

<style>
/* ================ STAFF EDIT PAGE - DARK GOLD THEME ================ */

/* Container */
.container-py-4{
    padding:25px 0;
}

/* ================ MAIN CARD ================ */
.main-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,0.2);
    transition:.3s;
    position:relative;
    overflow:hidden;
}

.main-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 35px var(--glow);
}

/* Gold accent on top */
.main-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* Card Body */
.card-body-p-4{
    padding:28px;
}

/* ================ PAGE TITLE ================ */
.page-title{
    font-family:'Playfair Display', serif;
    font-size:26px;
    font-weight:700;
    color:var(--gold-rich);
    margin-bottom:25px;
    padding-bottom:12px;
    border-bottom:2px solid var(--border);
    letter-spacing:0.5px;
    display:flex;
    align-items:center;
    gap:10px;
}

.page-title i{
    color:var(--gold-rich);
}

/* ================ SECTION HEADINGS ================ */
.section-heading{
    font-family:'Playfair Display', serif;
    font-size:20px;
    font-weight:600;
    color:var(--text);
    margin:25px 0 20px 0;
    padding-bottom:10px;
    border-bottom:1px dashed var(--gold-dim);
    display:flex;
    align-items:center;
    gap:8px;
}

.section-heading i{
    color:var(--gold-rich);
    font-size:20px;
}

/* ================ FORM LABELS ================ */
.form-label{
    font-size:14px;
    font-weight:500;
    color:var(--text-soft);
    margin-bottom:6px;
    display:block;
}

.form-label i{
    color:var(--gold-rich);
    margin-right:5px;
    font-size:14px;
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
    width:100%;
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

/* Readonly inputs */
.form-control[readonly]{
    background:var(--hover);
    cursor:not-allowed;
}

/* ================ CHECKBOX STYLING ================ */
.checkbox-wrapper{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:10px;
    padding:12px 15px;
    transition:.2s;
    height:100%;
}

.checkbox-wrapper:hover{
    border-color:var(--gold-rich);
    box-shadow:0 0 15px var(--glow);
    transform:translateY(-2px);
}

.checkbox-label{
    display:flex;
    align-items:center;
    gap:10px;
    cursor:pointer;
    margin:0;
    color:var(--text);
    font-size:14px;
    font-weight:500;
}

.checkbox-label input[type="checkbox"]{
    width:18px;
    height:18px;
    accent-color:var(--gold-rich);
    cursor:pointer;
}

.service-price{
    color:var(--gold-rich);
    font-weight:600;
    margin-left:auto;
    font-size:13px;
}

/* ================ PHOTO SECTION ================ */
.photo-preview{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:20px;
    flex-wrap:wrap;
}

.current-photo{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid var(--gold-rich);
    box-shadow:0 4px 12px var(--glow);
}

.photo-info{
    color:var(--text-soft);
    font-size:13px;
}

.photo-info i{
    color:var(--gold-rich);
    margin-right:5px;
}

/* File input */
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

/* ================ ALERT MESSAGES ================ */
.alert-success{
    background:var(--card);
    border-left:4px solid #10b981;
    border-radius:12px;
    padding:15px 20px;
    color:var(--text);
    font-weight:500;
    box-shadow:0 4px 15px var(--glow);
    border:1px solid var(--gold-dim);
    margin-bottom:25px;
}

/* ================ DIVIDER ================ */
.divider{
    border-top:1px solid var(--border);
    margin:25px 0;
}

/* ================ BUTTONS ================ */
.btn-update{
    background:var(--gold-rich);
    border:none;
    padding:12px 40px;
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

.btn-update:hover{
    background:var(--gold-glow);
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    color:#000000;
}

.btn-update i{
    font-size:16px;
}

/* ================ GRID SPACING ================ */
.row.g-3{
    margin:-8px;
}

.row.g-3 > [class*="col-"]{
    padding:8px;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .main-card{
    box-shadow:0 5px 15px rgba(0,0,0,0.03);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
}

body.light .checkbox-wrapper{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .card-body-p-4{
        padding:20px;
    }
    
    .page-title{
        font-size:24px;
    }
    
    .section-heading{
        font-size:18px;
    }
    
    .form-control,
    .form-select{
        height:42px;
        font-size:13px;
    }
    
    .btn-update{
        width:100%;
        justify-content:center;
    }
    
    .photo-preview{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }
}

/* ================ UTILITY CLASSES ================ */
.text-muted{
    color:var(--text-soft) !important;
}

.fw-bold{
    font-weight:600 !important;
}

.shadow-border-0{
    box-shadow:none !important;
    border:none !important;
}

/* Salary fields visibility */
#fixedField,
#commissionField{
    transition:.3s;
}
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">

            <!-- Main Card -->
            <div class="main-card">
                <div class="card-body-p-4">

                    <!-- Page Title -->
                    <h5 class="page-title">
                        <i class="fa fa-edit me-2"></i> 
                        Edit Staff Member
                    </h5>

                    @if(session('success'))
                    <div class="alert-success">
                        <i class="fa fa-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('staff.update', $staff->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- BASIC INFORMATION -->
                        <h6 class="section-heading">
                            <i class="fa fa-id-badge"></i>
                            Basic Information
                        </h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="fa fa-user"></i> Full Name *
                                </label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $staff->name) }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="fa fa-phone"></i> Phone Number
                                </label>
                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $staff->phone) }}"
                                       class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="fa fa-envelope"></i> Email Address
                                </label>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $staff->email) }}"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="fa fa-venus-mars"></i> Gender
                                </label>
                                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                    <option value="male" {{ old('gender', $staff->gender)=='male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $staff->gender)=='female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $staff->gender)=='other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="fa fa-briefcase"></i> Role / Position
                                </label>
                                <input type="text"
                                       name="role"
                                       value="{{ old('role', $staff->role) }}"
                                       class="form-control @error('role') is-invalid @enderror"
                                       placeholder="e.g., Hair Stylist">
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="fa fa-calendar"></i> Joining Date
                                </label>
                                <input type="date"
                                       name="joining_date"
                                       value="{{ old('joining_date', $staff->joining_date) }}"
                                       class="form-control @error('joining_date') is-invalid @enderror">
                                @error('joining_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    <i class="fa fa-map-marker"></i> Address
                                </label>
                                <textarea name="address"
                                          class="form-control @error('address') is-invalid @enderror"
                                          rows="2">{{ old('address', $staff->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="divider"></div>

                        <!-- SALARY DETAILS -->
                        <h6 class="section-heading">
                            <i class="fa fa-money-bill-wave"></i>
                            Salary Details
                        </h6>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Salary Type</label>
                                <select name="salary_type"
                                        id="salaryType"
                                        class="form-select">
                                    <option value="fixed"
                                        {{ old('salary_type', $staff->salary_type) == 'fixed' ? 'selected' : '' }}>
                                        Fixed Salary
                                    </option>
                                    <option value="commission"
                                        {{ old('salary_type', $staff->salary_type) == 'commission' ? 'selected' : '' }}>
                                        Commission Based
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4" id="fixedField"
                                 style="{{ old('salary_type', $staff->salary_type) == 'commission' ? 'display:none;' : '' }}">
                                <label class="form-label">Fixed Salary (₹)</label>
                                <input type="number"
                                       name="fixed_salary"
                                       id="fixedInput"
                                       value="{{ old('fixed_salary', $staff->fixed_salary) }}"
                                       class="form-control"
                                       placeholder="Enter amount"
                                       step="100">
                            </div>

                            <div class="col-md-4" id="commissionField"
                                 style="{{ old('salary_type', $staff->salary_type) == 'fixed' ? 'display:none;' : '' }}">
                                <label class="form-label">Commission Percentage (%)</label>
                                <input type="number"
                                       name="commission_percent"
                                       id="commissionInput"
                                       value="{{ old('commission_percent', $staff->commission_percent) }}"
                                       class="form-control"
                                       placeholder="Enter percentage"
                                       step="0.1"
                                       min="0"
                                       max="100">
                            </div>
                        </div>

                        <div class="divider"></div>

                        <!-- SERVICES -->
                        <h6 class="section-heading">
                            <i class="fa fa-scissors"></i>
                            Assigned Services
                        </h6>

                        <div class="row g-3">
                            @forelse($services as $service)
                            <div class="col-md-4 col-sm-6">
                                <div class="checkbox-wrapper">
                                    <label class="checkbox-label">
                                        <input type="checkbox"
                                               name="services[]"
                                               value="{{ $service->id }}"
                                               {{ (is_array(old('services')) && in_array($service->id, old('services'))) || 
                                                  (optional($staff->services)->contains($service->id) && !old('services')) ? 'checked' : '' }}>
                                        <span>{{ $service->name }}</span>
                                        <span class="service-price">₹{{ number_format($service->price) }}</span>
                                    </label>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-muted mb-0">
                                    <i class="fa fa-info-circle me-2"></i>
                                    No services available. 
                                    <a href="{{ route('services.create') }}" class="text-gold">Add services first</a>
                                </p>
                            </div>
                            @endforelse
                        </div>

                        <div class="divider"></div>

                        <!-- PHOTO -->
                        <h6 class="section-heading">
                            <i class="fa fa-image"></i>
                            Profile Photo
                        </h6>

                        <div class="photo-preview">
                            @if($staff->photo)
                            <img src="{{ asset('storage/'.$staff->photo) }}"
                                 class="current-photo"
                                 alt="{{ $staff->name }}">
                            @else
                            <div class="current-photo bg-gold d-flex align-items-center justify-content-center">
                                <i class="fa fa-user fa-2x text-black"></i>
                            </div>
                            @endif
                            
                            <div class="photo-info">
                                <i class="fa fa-info-circle"></i>
                                Leave empty to keep current photo<br>
                                <small>Max size: 2MB (JPG, PNG, GIF)</small>
                            </div>
                        </div>

                        <input type="file"
                               name="photo"
                               class="form-control @error('photo') is-invalid @enderror"
                               accept="image/*">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="text-end mt-5">
                            <a href="{{ route('staff.index') }}" class="btn btn-secondary me-2">
                                <i class="fa fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn-update">
                                <i class="fa fa-save me-2"></i> Update Staff
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Salary Type Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const salaryType = document.getElementById('salaryType');
    const fixedField = document.getElementById('fixedField');
    const commissionField = document.getElementById('commissionField');
    const fixedInput = document.getElementById('fixedInput');
    const commissionInput = document.getElementById('commissionInput');
    
    if(!salaryType) return;
    
    function toggleSalaryFields() {
        if(salaryType.value === 'commission') {
            // Show commission, hide fixed
            commissionField.style.display = 'block';
            fixedField.style.display = 'none';
            
            // Enable/disable inputs
            commissionInput.disabled = false;
            fixedInput.disabled = true;
        } else {
            // Show fixed, hide commission
            fixedField.style.display = 'block';
            commissionField.style.display = 'none';
            
            // Enable/disable inputs
            fixedInput.disabled = false;
            commissionInput.disabled = true;
        }
    }
    
    // Initial toggle
    toggleSalaryFields();
    
    // Add event listener
    salaryType.addEventListener('change', toggleSalaryFields);
});
</script>

@endsection