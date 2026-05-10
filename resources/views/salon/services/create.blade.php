@extends('salon.layouts.app')

@section('content')

<style>
/* ================ SERVICES CREATE PAGE - DARK GOLD THEME ================ */

/* ================ PAGE WRAPPER ================ */
.page-wrapper{
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:calc(100vh - 70px);
    padding:40px 20px;
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.service-card{
    width:100%;
    max-width:1000px;
    background:var(--card);
    border-radius:30px;
    padding:50px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    position:relative;
    overflow:hidden;
    border:1.5px solid var(--gold-dim);
    transition:.4s;
}

.service-card:hover{
    transform:translateY(-5px);
    border-color:var(--gold-rich);
    box-shadow:0 25px 50px var(--glow);
}

/* ================ DECORATIVE GOLD CIRCLE ================ */
.service-card::before{
    content:"";
    position:absolute;
    top:-100px;
    right:-100px;
    width:300px;
    height:300px;
    background:linear-gradient(135deg, var(--gold-dim), var(--gold-glow));
    border-radius:50%;
    opacity:0.1;
    transition:.5s;
}

.service-card:hover::before{
    opacity:0.15;
    transform:scale(1.1);
}

/* ================ CARD TITLE ================ */
.card-title{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:28px;
    margin-bottom:40px;
    color:var(--gold-rich);
    display:flex;
    align-items:center;
    gap:15px;
    position:relative;
    z-index:2;
    letter-spacing:0.5px;
    padding-bottom:15px;
    border-bottom:2px solid var(--border);
}

.card-title i{
    background:var(--gold-rich);
    color:#000000;
    padding:15px;
    border-radius:50%;
    font-size:20px;
    transition:.4s;
    box-shadow:0 5px 15px var(--glow);
}

/* Icon Hover */
.card-title i:hover{
    background:var(--gold-glow);
    transform:rotate(8deg) scale(1.1);
    box-shadow:0 10px 25px var(--glow);
}

/* ================ FORM LABEL ================ */
.form-label{
    font-weight:600;
    margin-bottom:10px;
    color:var(--text-soft);
    display:flex;
    align-items:center;
    gap:10px;
    transition:.3s;
    font-size:14px;
}

.form-label i{
    color:var(--gold-rich);
    font-size:16px;
    transition:.3s;
}

.form-label:hover i{
    color:var(--gold-glow);
    transform:scale(1.2);
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
    border-radius:14px;
    padding:14px 18px;
    border:1.5px solid var(--border);
    background:var(--bg);
    color:var(--text);
    transition:.3s;
    font-size:14px;
    width:100%;
    box-shadow:0 2px 10px rgba(235, 220, 220, 0.1);
}

/* Input Hover */
.form-control:hover,
.form-select:hover{
    border-color:var(--gold-dim);
    background:var(--hover);
}

/* Input Focus */
.form-control:focus,
.form-select:focus{
    border-color:var(--gold-rich);
    background:var(--bg);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

/* Placeholder */
.form-control::placeholder{
    color:var(--text-soft);
    opacity:0.5;
}

/* Select dropdown */
.form-select option{
    background:var(--card);
    color:var(--text);
}

/* Textarea */
textarea.form-control{
    min-height:120px;
    resize:vertical;
}

/* ================ FORM GROUP ================ */
.form-group{
    margin-bottom:25px;
    position:relative;
    z-index:2;
}

/* ================ BUTTON ================ */
.save-btn{
    background:var(--gold-rich);
    color:#000000;
    padding:16px 50px;
    border:none;
    border-radius:40px;
    font-weight:700;
    font-size:16px;
    transition:.4s;
    box-shadow:0 10px 25px var(--glow);
    display:inline-flex;
    align-items:center;
    gap:12px;
    border:1px solid var(--gold-rich);
    cursor:pointer;
    letter-spacing:0.5px;
}

.save-btn:hover{
    background:var(--gold-glow);
    transform:translateY(-5px);
    box-shadow:0 20px 35px var(--glow);
}

.save-btn i{
    font-size:18px;
    transition:.3s;
}

.save-btn:hover i{
    transform:scale(1.1);
}

/* ================ BUTTON CONTAINER ================ */
.button-container{
    text-align:center;
    margin-top:30px;
    position:relative;
    z-index:2;
}

/* ================ ROW SPACING ================ */
.row{
    margin:-12px;
}

.row > [class*="col-"]{
    padding:12px;
}

/* ================ VALIDATION STYLES ================ */
.is-invalid{
    border-color:#ff6b6b !important;
}

.invalid-feedback{
    color:#ff6b6b;
    font-size:12px;
    margin-top:5px;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .service-card{
    box-shadow:0 15px 40px rgba(0,0,0,0.05);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
}

body.light .form-control:hover,
body.light .form-select:hover{
    background:#fafafa;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .service-card{
        padding:30px 20px;
    }
    
    .card-title{
        font-size:24px;
        margin-bottom:30px;
    }
    
    .card-title i{
        padding:12px;
        font-size:16px;
    }
    
    .form-group{
        margin-bottom:20px;
    }
    
    .save-btn{
        width:100%;
        justify-content:center;
        padding:14px 30px;
    }
}

/* ================ ANIMATIONS ================ */
@keyframes fadeInUp {
    from {
        opacity:0;
        transform:translateY(20px);
    }
    to {
        opacity:1;
        transform:translateY(0);
    }
}

.service-card{
    animation:fadeInUp 0.6s ease;
}

/* ================ UTILITY CLASSES ================ */
.text-center{
    text-align:center;
}

.mt-4{
    margin-top:25px;
}

.me-2{
    margin-right:8px;
}

/* Icon colors for light mode compatibility */
.fa-spa,
.fa-layer-group,
.fa-venus-mars,
.fa-indian-rupee-sign,
.fa-align-left{
    color:var(--gold-rich) !important;
}
</style>

<div class="page-wrapper">
    <div class="service-card">

        <!-- Card Title -->
        <h3 class="card-title">
            <i class="fa fa-scissors"></i>
            Add New Salon Service
        </h3>

        <!-- Form -->
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="row">

                <!-- Service Name -->
                <div class="col-md-6 form-group">
                    <label class="form-label">
                        <i class="fa fa-spa"></i> 
                        Service Name <span class="text-gold">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}"
                           placeholder="e.g., Hair Cut, Facial, etc."
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Service Type -->
                <div class="col-md-6 form-group">
                    <label class="form-label">
                        <i class="fa fa-layer-group"></i> 
                        Service Type
                    </label>
                    <input type="text" 
                           name="type" 
                           class="form-control @error('type') is-invalid @enderror" 
                           value="{{ old('type') }}"
                           placeholder="Hair / Makeup / Skin / Nail">
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="col-md-6 form-group">
                    <label class="form-label">
                        <i class="fa fa-venus-mars"></i> 
                        Gender
                    </label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="unisex" {{ old('gender') == 'unisex' ? 'selected' : '' }}>Unisex (All)</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male Only</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female Only</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="col-md-6 form-group">
                    <label class="form-label">
                        <i class="fa fa-indian-rupee-sign"></i> 
                        Price (₹) <span class="text-gold">*</span>
                    </label>
                    <input type="number" 
                           name="price" 
                           class="form-control @error('price') is-invalid @enderror" 
                           value="{{ old('price') }}"
                           placeholder="0.00"
                           step="0.01"
                           min="0"
                           required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12 form-group">
                    <label class="form-label">
                        <i class="fa fa-align-left"></i> 
                        Description
                    </label>
                    <textarea name="description" 
                              class="form-control @error('description') is-invalid @enderror" 
                              rows="4"
                              placeholder="Describe the service...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <div class="button-container">
                <button type="submit" class="save-btn">
                    <i class="fa fa-save"></i>
                    Save Service
                </button>
            </div>

        </form>

    </div>
</div>

@endsection