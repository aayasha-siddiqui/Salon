@extends('salon.layouts.app')

@section('content')

<style>
/* ================ APPOINTMENT BOOKING PAGE - DARK GOLD THEME ================ */

/* ================ MAIN CONTAINER ================ */
.appointment-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
    display:flex;
    align-items:center;
    justify-content:center;
}

/* ================ APPOINTMENT CARD ================ */
.appointment-card{
    max-width:750px;
    width:100%;
    margin:auto;
    border-radius:24px;
    border:1.5px solid var(--gold-dim);
    background:var(--card);
    color:var(--text);
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    padding:30px;
    position:relative;
    overflow:hidden;
    transition:.3s;
}

.appointment-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

/* Gold accent on top */
.appointment-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ TITLE ================ */
.title{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:26px;
    color:var(--gold-rich);
    margin-bottom:25px;
    padding-bottom:12px;
    border-bottom:2px solid var(--border);
    display:flex;
    align-items:center;
    gap:10px;
    letter-spacing:0.5px;
}

/* ================ LABELS ================ */
.label{
    font-weight:600;
    margin:18px 0 8px;
    color:var(--text-soft);
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
}

/* ================ ICONS ================ */
.icon{
    color:var(--gold-rich);
    font-size:16px;
}

/* ================ FORM CONTROLS ================ */
.form-control{
    border-radius:12px;
    border:1.5px solid var(--border);
    padding:12px 16px;
    background:var(--bg);
    color:var(--text);
    font-size:14px;
    transition:.3s;
    width:100%;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

.form-control:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
    background:var(--bg);
}

.form-control::placeholder{
    color:var(--text-soft);
    opacity:0.6;
}

/* ================ GENDER FILTER BUTTONS ================ */
.gender-filter{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin:10px 0 5px;
}

.gender-btn{
    background:var(--hover);
    border:1.5px solid var(--border);
    color:var(--text-soft);
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:500;
    cursor:pointer;
    transition:.3s;
    flex:1;
    min-width:80px;
}

.gender-btn.active,
.gender-btn:hover{
    background:var(--gold-rich);
    color:#000000;
    border-color:var(--gold-rich);
    box-shadow:0 5px 15px var(--glow);
    transform:translateY(-2px);
}

/* ================ SERVICE GRID ================ */
.service-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(200px, 1fr));
    gap:10px;
    margin:15px 0 5px;
    max-height:300px;
    overflow-y:auto;
    padding:5px;
}

/* Custom scrollbar */
.service-grid::-webkit-scrollbar{
    width:5px;
}

.service-grid::-webkit-scrollbar-track{
    background:var(--border);
    border-radius:10px;
}

.service-grid::-webkit-scrollbar-thumb{
    background:var(--gold-rich);
    border-radius:10px;
}

/* ================ SERVICE BOX ================ */
.service-box{
    border:1.5px solid var(--border);
    padding:12px;
    border-radius:14px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:var(--hover);
    cursor:pointer;
    transition:.3s;
    gap:8px;
}

.service-box:hover{
    border-color:var(--gold-rich);
    background:var(--card);
    transform:translateY(-3px);
    box-shadow:0 8px 15px var(--glow);
}

.service-box label{
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
    color:var(--text);
    font-size:14px;
    flex:1;
}

.service-box input[type="checkbox"]{
    width:18px;
    height:18px;
    accent-color:var(--gold-rich);
    cursor:pointer;
}

.service-box span{
    color:var(--gold-rich);
    font-weight:600;
    font-size:14px;
}

/* ================ SELECT DROPDOWN ================ */
select.form-control{
    appearance:none;
    background-image:url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238B6B3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat:no-repeat;
    background-position:right 12px center;
    background-size:16px;
    padding-right:40px;
}

select.form-control option{
    background:var(--card);
    color:var(--text);
}

/* ================ TOTAL BOX ================ */
.total-box{
    background:var(--hover);
    border-radius:16px;
    padding:18px;
    margin:20px 0 15px;
    border:1.5px dashed var(--gold-dim);
    transition:.3s;
}

.total-box:hover{
    border-color:var(--gold-rich);
    background:var(--card);
}

.total-box b{
    color:var(--gold-rich);
    font-size:18px;
    margin-left:8px;
}

.total-box br{
    margin:5px 0;
}

/* ================ BOOK BUTTON ================ */
.book-btn{
    background:var(--gold-rich);
    color:#000000;
    border:none;
    border-radius:40px;
    padding:14px;
    font-weight:700;
    font-size:16px;
    cursor:pointer;
    transition:.4s;
    box-shadow:0 10px 25px var(--glow);
    display:flex;
    align-items:center;
    justify-content:center;
    gap:12px;
    border:1px solid var(--gold-rich);
    width:100%;
    margin-top:10px;
}

.book-btn:hover{
    background:var(--gold-glow);
    transform:translateY(-4px);
    box-shadow:0 15px 35px var(--glow);
}

.book-btn i{
    font-size:18px;
    transition:.3s;
}

.book-btn:hover i{
    transform:scale(1.1);
}

/* ================ ROW SPACING ================ */
.row{
    margin:-8px;
}

.row > [class*="col-"]{
    padding:8px;
}

/* ================ DATE/TIME INPUTS ================ */
input[type="date"],
input[type="time"]{
    color-scheme:var(--bg);
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .appointment-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .form-control{
    background:#ffffff;
    border-color:#E5E0D8;
}

body.light .service-box{
    background:#f8f8f8;
}

body.light .service-box:hover{
    background:#ffffff;
}

body.light .total-box{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .appointment-card{
        padding:20px;
    }
    
    .title{
        font-size:22px;
    }
    
    .service-grid{
        grid-template-columns:1fr;
    }
    
    .gender-filter{
        flex-wrap:wrap;
    }
    
    .gender-btn{
        flex:auto;
        min-width:70px;
    }
}

/* ================ UTILITY CLASSES ================ */
.w-100{
    width:100%;
}

.mt-3{
    margin-top:15px;
}

.mb-2{
    margin-bottom:8px;
}

/* Animation */
@keyframes slideUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.appointment-card{
    animation:slideUp 0.5s ease;
}
</style>

<div class="appointment-wrapper">
    <div class="appointment-card p-4">

        <!-- Title -->
        <h4 class="title">
            <i class="fa fa-calendar icon"></i>
            Book New Appointment
        </h4>

        <!-- Form -->
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <!-- Customer Info Row -->
            <div class="row">
                <div class="col-md-6">
                    <label class="label">
                        <i class="fa fa-user icon"></i> 
                        Customer Name <span class="text-gold">*</span>
                    </label>
                    <input type="text" 
                           name="customer_name" 
                           class="form-control @error('customer_name') is-invalid @enderror" 
                           value="{{ old('customer_name') }}"
                           placeholder="Enter full name"
                           required>
                    @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="label">
                        <i class="fa fa-phone icon"></i> 
                        Phone Number <span class="text-gold">*</span>
                    </label>
                    <input type="text" 
                           name="customer_phone" 
                           class="form-control @error('customer_phone') is-invalid @enderror" 
                           value="{{ old('customer_phone') }}"
                           placeholder="Enter phone number"
                           required>
                    @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Gender Filter -->
            <label class="label">
                <i class="fa fa-filter icon"></i> 
                Filter Services By Gender
            </label>

            <div class="gender-filter">
                <button type="button" class="gender-btn active" onclick="filterServices('all')">
                    <i class="fa fa-globe me-1"></i> All
                </button>
                <button type="button" class="gender-btn" onclick="filterServices('male')">
                    <i class="fa fa-mars me-1"></i> Male
                </button>
                <button type="button" class="gender-btn" onclick="filterServices('female')">
                    <i class="fa fa-venus me-1"></i> Female
                </button>
                <button type="button" class="gender-btn" onclick="filterServices('unisex')">
                    <i class="fa fa-genderless me-1"></i> Unisex
                </button>
            </div>

            <!-- Services Selection -->
            <label class="label">
                <i class="fa fa-scissors icon"></i> 
                Select Services <span class="text-gold">*</span>
            </label>

            <div class="service-grid" id="serviceGrid">
                @forelse($services as $service)
                <div class="service-box" 
                     data-gender="{{ $service->gender ?? 'unisex' }}"
                     data-id="{{ $service->id }}">
                    <label>
                        <input type="checkbox"
                               class="service-check"
                               data-price="{{ $service->price }}"
                               name="service_ids[]"
                               value="{{ $service->id }}">
                        {{ $service->name }}
                    </label>
                    <span>₹{{ number_format($service->price) }}</span>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-muted">No services available</p>
                </div>
                @endforelse
            </div>

            <!-- Staff Selection -->
            <label class="label">
                <i class="fa fa-user-tie icon"></i> 
                Select Staff <span class="text-gold">*</span>
            </label>

            <select name="staff_id" class="form-control @error('staff_id') is-invalid @enderror" required>
                <option value="">Choose staff member</option>
                @foreach($staffs as $staff)
                <option value="{{ $staff->id }}" {{ old('staff_id') == $staff->id ? 'selected' : '' }}>
                    {{ $staff->name }} - {{ $staff->role ?? 'Staff' }}
                </option>
                @endforeach
            </select>
            @error('staff_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Date & Time Row -->
            <div class="row">
                <div class="col-md-6">
                    <label class="label">
                        <i class="fa fa-calendar icon"></i> 
                        Appointment Date <span class="text-gold">*</span>
                    </label>
                    <input type="date"
                           name="appointment_date"
                           class="form-control @error('appointment_date') is-invalid @enderror"
                           value="{{ old('appointment_date') }}"
                           min="{{ date('Y-m-d') }}"
                           required>
                    @error('appointment_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="label">
                        <i class="fa fa-clock icon"></i> 
                        Appointment Time <span class="text-gold">*</span>
                    </label>
                    <input type="time"
                           name="appointment_time"
                           class="form-control @error('appointment_time') is-invalid @enderror"
                           value="{{ old('appointment_time') }}"
                           required>
                    @error('appointment_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Discount -->
            <label class="label">
                <i class="fa fa-percent icon"></i> 
                Discount (%)
            </label>

            <input type="number"
                   id="discount"
                   class="form-control"
                   placeholder="Enter discount percentage"
                   min="0"
                   max="100"
                   value="0"
                   step="0.1">

            <!-- Total Calculation Box -->
            <div class="total-box">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span style="color:var(--text-soft);">Subtotal:</span>
                    <b id="total">₹0</b>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-top:8px;">
                    <span style="color:var(--text-soft);">Discount:</span>
                    <b id="discountAmount">₹0</b>
                </div>
                <hr style="border-color:var(--border); margin:10px 0;">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span style="color:var(--gold-rich); font-weight:600;">Final Amount:</span>
                    <b style="color:var(--gold-rich); font-size:22px;" id="final_total">₹0</b>
                </div>
            </div>

            <!-- Hidden Input for Amount -->
            <input type="hidden" name="amount" id="amount" value="0">

            <!-- Submit Button -->
            <button type="submit" class="book-btn">
                <i class="fa fa-check-circle"></i>
                Confirm Appointment
            </button>

        </form>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const checks = document.querySelectorAll('.service-check');
    const totalEl = document.getElementById('total');
    const finalTotalEl = document.getElementById('final_total');
    const discountEl = document.getElementById('discount');
    const amountEl = document.getElementById('amount');
    const discountAmountEl = document.getElementById('discountAmount');
    
    let subtotal = 0;
    
    // Function to calculate total
    function calculateTotal() {
        subtotal = 0;
        checks.forEach(check => {
            if(check.checked) {
                subtotal += parseFloat(check.dataset.price) || 0;
            }
        });
        
        totalEl.innerText = '₹' + subtotal.toFixed(2);
        calculateFinal();
    }
    
    // Function to calculate final amount
    function calculateFinal() {
        const discount = parseFloat(discountEl.value) || 0;
        const discountAmount = (subtotal * discount) / 100;
        const final = subtotal - discountAmount;
        
        discountAmountEl.innerText = '₹' + discountAmount.toFixed(2);
        finalTotalEl.innerText = '₹' + final.toFixed(2);
        amountEl.value = final.toFixed(2);
    }
    
    // Add event listeners to checkboxes
    checks.forEach(check => {
        check.addEventListener('change', calculateTotal);
    });
    
    // Add event listener to discount
    discountEl.addEventListener('input', calculateFinal);
    
    // Initial calculation
    calculateTotal();
});

// Gender filter function
function filterServices(gender) {
    const services = document.querySelectorAll('.service-box');
    const buttons = document.querySelectorAll('.gender-btn');
    
    // Update active button
    buttons.forEach(btn => {
        btn.classList.remove('active');
        if(btn.textContent.toLowerCase().includes(gender) || 
           (gender === 'all' && btn.textContent.includes('All'))) {
            btn.classList.add('active');
        }
    });
    
    // Filter services
    services.forEach(service => {
        const serviceGender = service.dataset.gender || 'unisex';
        
        if(gender === 'all' || serviceGender === gender) {
            service.style.display = 'flex';
        } else {
            service.style.display = 'none';
            
            // Uncheck hidden services
            const checkbox = service.querySelector('.service-check');
            if(checkbox) {
                checkbox.checked = false;
            }
        }
    });
    
    // Recalculate total
    const event = new Event('change');
    document.querySelectorAll('.service-check').forEach(c => c.dispatchEvent(event));
}
</script>

@endsection