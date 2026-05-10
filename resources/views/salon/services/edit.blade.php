@extends('salon.layouts.app')

@section('content')

<style>
/* ================ SERVICES EDIT PAGE - DARK GOLD THEME ================ */

/* ================ PAGE WRAPPER ================ */
.page-wrapper{
    display:flex;
    justify-content:center;
    align-items:flex-start;
    min-height:calc(100vh - 70px);
    padding:30px 20px;
    background:var(--bg);
}

/* ================ EDIT CARD ================ */
.edit-card{
    width:100%;
    max-width:950px;
    background:var(--card);
    border-radius:24px;
    padding:40px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    border:1.5px solid var(--gold-dim);
    transition:.3s;
    position:relative;
    overflow:hidden;
}

.edit-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 25px 50px var(--glow);
}

/* Gold accent on top */
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

.edit-card:hover::before{
    opacity:1;
}

/* ================ CARD TITLE ================ */
.card-title{
    font-family:'Playfair Display', serif;
    font-size:28px;
    font-weight:700;
    color:var(--gold-rich);
    margin-bottom:30px;
    padding-bottom:15px;
    border-bottom:2px solid var(--border);
    display:flex;
    align-items:center;
    gap:10px;
    letter-spacing:0.5px;
}

.card-title i{
    color:var(--gold-rich);
    font-size:28px;
}

/* ================ FORM LABELS ================ */
.form-label{
    font-weight:600;
    margin-bottom:8px;
    color:var(--text-soft);
    font-size:14px;
    display:flex;
    align-items:center;
    gap:6px;
}

.form-label i{
    color:var(--gold-rich);
    font-size:14px;
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
    border-radius:12px;
    padding:12px 16px;
    border:1.5px solid var(--border);
    background:var(--bg);
    color:var(--text);
    font-size:14px;
    transition:.3s;
    width:100%;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

.form-control:focus,
.form-select:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
    background:var(--bg);
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

/* Textarea */
textarea.form-control{
    min-height:100px;
    resize:vertical;
}

/* ================ STAFF ASSIGNMENT SECTION ================ */
.staff-section{
    margin:25px 0 15px;
    padding:20px;
    background:var(--hover);
    border-radius:18px;
    border:1px solid var(--border);
}

.staff-section-title{
    font-family:'Playfair Display', serif;
    font-size:18px;
    font-weight:600;
    color:var(--gold-rich);
    margin-bottom:20px;
    display:flex;
    align-items:center;
    gap:8px;
}

.staff-section-title i{
    color:var(--gold-rich);
}

/* ================ STAFF CHECKBOX GRID ================ */
.staff-box{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(220px, 1fr));
    gap:15px;
    margin-top:5px;
}

/* Hide default checkbox */
.staff-item input{
    display:none;
}

/* Staff Card Style */
.staff-card{
    padding:16px;
    border-radius:16px;
    border:1.5px solid var(--border);
    background:var(--card);
    transition:.3s;
    cursor:pointer;
    position:relative;
    overflow:hidden;
}

.staff-card:hover{
    border-color:var(--gold-dim);
    transform:translateY(-3px);
    box-shadow:0 8px 20px var(--glow);
}

/* Checked state */
.staff-item input:checked + .staff-card{
    border:2px solid var(--gold-rich);
    background:linear-gradient(145deg, var(--card), var(--hover));
    box-shadow:0 0 0 4px var(--glow);
}

/* Gold accent for checked items */
.staff-item input:checked + .staff-card::before{
    content:'✓';
    position:absolute;
    top:8px;
    right:8px;
    width:22px;
    height:22px;
    background:var(--gold-rich);
    color:#000000;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    font-weight:bold;
}

/* Staff Name */
.staff-card strong{
    display:block;
    color:var(--text);
    font-size:16px;
    font-weight:600;
    margin-bottom:4px;
}

/* Staff Role */
.staff-card small{
    color:var(--text-soft);
    font-size:12px;
    display:block;
}

/* Staff Role with icon */
.staff-card small i{
    color:var(--gold-rich);
    margin-right:4px;
    font-size:11px;
}

/* ================ BUTTONS ================ */
.button-group{
    display:flex;
    gap:15px;
    margin-top:30px;
    flex-wrap:wrap;
}

.update-btn{
    background:var(--gold-rich);
    color:#000000;
    padding:14px 35px;
    border:none;
    border-radius:40px;
    font-size:16px;
    font-weight:600;
    transition:.3s;
    cursor:pointer;
    display:inline-flex;
    align-items:center;
    gap:10px;
    border:1px solid var(--gold-rich);
    box-shadow:0 8px 20px var(--glow);
}

.update-btn:hover{
    background:var(--gold-glow);
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
}

.update-btn i{
    font-size:16px;
}

.back-btn{
    background:transparent;
    color:var(--text-soft);
    padding:14px 30px;
    border:1.5px solid var(--gold-dim);
    border-radius:40px;
    font-size:16px;
    font-weight:500;
    transition:.3s;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:10px;
}

.back-btn:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
    transform:translateY(-2px);
    box-shadow:0 5px 15px var(--glow);
}

.back-btn i{
    font-size:16px;
}

/* ================ FORM VALIDATION ================ */
.is-invalid{
    border-color:#ff6b6b !important;
}

.invalid-feedback{
    color:#ff6b6b;
    font-size:12px;
    margin-top:5px;
}

/* ================ ROW SPACING ================ */
.row{
    margin:-10px;
}

.row > [class*="col-"]{
    padding:10px;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .edit-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
}

body.light .staff-card{
    background:#ffffff;
}

body.light .staff-section{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .edit-card{
        padding:25px;
    }
    
    .card-title{
        font-size:24px;
    }
    
    .staff-box{
        grid-template-columns:1fr;
    }
    
    .button-group{
        flex-direction:column;
    }
    
    .update-btn,
    .back-btn{
        width:100%;
        justify-content:center;
    }
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

/* Divider */
.divider{
    border-top:1px solid var(--border);
    margin:25px 0;
}
</style>

<div class="page-wrapper">
    <div class="edit-card">

        <!-- Page Title -->
        <h3 class="card-title">
            <i class="fa fa-edit"></i>
            Edit Service
        </h3>

        <form action="{{ route('services.update', $service->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        <i class="fa fa-tag"></i>
                        Service Name *
                    </label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $service->name) }}"
                           placeholder="e.g., Hair Cut, Facial, etc."
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        <i class="fa fa-list"></i>
                        Service Type
                    </label>
                    <input type="text"
                           name="type"
                           class="form-control @error('type') is-invalid @enderror"
                           value="{{ old('type', $service->type) }}"
                           placeholder="e.g., Hair, Skin, Nail">
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        <i class="fa fa-venus-mars"></i>
                        Gender
                    </label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="unisex" {{ old('gender', $service->gender) == 'unisex' ? 'selected' : '' }}>Unisex (All)</option>
                        <option value="male" {{ old('gender', $service->gender) == 'male' ? 'selected' : '' }}>Male Only</option>
                        <option value="female" {{ old('gender', $service->gender) == 'female' ? 'selected' : '' }}>Female Only</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        <i class="fa fa-dollar"></i>
                        Price (₹) *
                    </label>
                    <input type="number"
                           name="price"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $service->price) }}"
                           placeholder="0.00"
                           step="0.01"
                           min="0"
                           required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">
                        <i class="fa fa-align-left"></i>
                        Description
                    </label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="4"
                              placeholder="Describe the service...">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="divider"></div>

            <!-- Staff Assignment Section -->
            <div class="staff-section">
                <div class="staff-section-title">
                    <i class="fa fa-users"></i>
                    Assign Staff Members
                </div>

                <div class="staff-box">
                    @forelse($staffs ?? [] as $staff)
                    <label class="staff-item">
                        <input type="checkbox"
                               name="staff_ids[]"
                               value="{{ $staff->id }}"
                               {{ (is_array(old('staff_ids')) && in_array($staff->id, old('staff_ids'))) || 
                                  (optional($service->staffs)->contains($staff->id) && !old('staff_ids')) ? 'checked' : '' }}>

                        <div class="staff-card">
                            <strong>
                                <i class="fa fa-user me-1" style="color:var(--gold-rich);"></i>
                                {{ $staff->name }}
                            </strong>
                            <small>
                                <i class="fa fa-briefcase"></i>
                                {{ $staff->role ?? 'Staff' }}
                            </small>
                            @if($staff->services->count() > 0)
                            <small style="margin-top:5px; color:var(--gold-dim);">
                                <i class="fa fa-scissors"></i>
                                {{ $staff->services->count() }} services
                            </small>
                            @endif
                        </div>
                    </label>
                    @empty
                    <div class="col-12">
                        <p class="text-muted" style="color:var(--text-soft);">
                            <i class="fa fa-info-circle me-2"></i>
                            No staff members available. 
                            <a href="{{ route('staff.create') }}" style="color:var(--gold-rich);">Add staff first</a>
                        </p>
                    </div>
                    @endforelse
                </div>

                @if(isset($staffs) && $staffs->count() > 0)
                <small class="text-muted" style="display:block; margin-top:15px;">
                    <i class="fa fa-info-circle me-1" style="color:var(--gold-rich);"></i>
                    Select the staff members who can perform this service
                </small>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <button type="submit" class="update-btn">
                    <i class="fa fa-save"></i>
                    Update Service
                </button>

                <a href="{{ route('services.index') }}" class="back-btn">
                    <i class="fa fa-arrow-left"></i>
                    Back to Services
                </a>
            </div>

        </form>

    </div>
</div>

@endsection