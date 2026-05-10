@extends('salon.layouts.app')

@section('content')

<style>
/* ================ APPOINTMENT EDIT PAGE - DARK GOLD THEME ================ */

/* ================ PAGE WRAPPER ================ */
.appointment-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
    display:flex;
    align-items:center;
    justify-content:center;
}

/* ================ EDIT CARD ================ */
.edit-card{
    max-width:800px;
    width:100%;
    margin:auto;
    border-radius:24px;
    border:1.5px solid var(--gold-dim);
    background:var(--card);
    color:var(--text);
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    padding:35px;
    position:relative;
    overflow:hidden;
    transition:.3s;
}

.edit-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
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
    gap:10px;
    letter-spacing:0.5px;
}

.card-title i{
    color:var(--gold-rich);
    font-size:24px;
}

/* ================ SECTION HEADING ================ */
.section-heading{
    font-family:'Playfair Display', serif;
    font-size:18px;
    font-weight:600;
    color:var(--text);
    margin:20px 0 15px;
    display:flex;
    align-items:center;
    gap:8px;
}

.section-heading i{
    color:var(--gold-rich);
    font-size:18px;
}

/* ================ FORM LABELS ================ */
.form-label{
    font-weight:600;
    margin:15px 0 8px;
    color:var(--text-soft);
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
}

.form-label i{
    color:var(--gold-rich);
    font-size:15px;
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
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

/* ================ SELECT DROPDOWN ================ */
select.form-control,
.form-select{
    appearance:none;
    background-image:url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238B6B3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat:no-repeat;
    background-position:right 12px center;
    background-size:16px;
    padding-right:40px;
}

select.form-control option,
.form-select option{
    background:var(--card);
    color:var(--text);
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
    border:1px solid var(--border);
    border-radius:16px;
    background:var(--hover);
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
    background:var(--card);
    cursor:pointer;
    transition:.3s;
    gap:8px;
}

.service-box:hover{
    border-color:var(--gold-rich);
    background:var(--hover);
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

/* Selected service */
.service-box.selected{
    border-color:var(--gold-rich);
    background:linear-gradient(145deg, var(--hover), var(--card));
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

.total-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:8px 0;
}

.total-row:not(:last-child){
    border-bottom:1px solid var(--border);
}

.total-label{
    color:var(--text-soft);
    font-size:14px;
}

.total-value{
    color:var(--gold-rich);
    font-weight:700;
    font-size:18px;
}

.final-value{
    color:var(--gold-rich);
    font-weight:800;
    font-size:22px;
}

/* ================ BUTTONS ================ */
.button-group{
    display:flex;
    gap:15px;
    margin-top:25px;
    flex-wrap:wrap;
}

.update-btn{
    background:var(--gold-rich);
    color:#000000;
    border:none;
    border-radius:40px;
    padding:14px 35px;
    font-weight:700;
    font-size:16px;
    cursor:pointer;
    transition:.4s;
    box-shadow:0 10px 25px var(--glow);
    display:inline-flex;
    align-items:center;
    gap:12px;
    border:1px solid var(--gold-rich);
    flex:1;
    justify-content:center;
}

.update-btn:hover{
    background:var(--gold-glow);
    transform:translateY(-4px);
    box-shadow:0 15px 35px var(--glow);
}

.cancel-btn{
    background:transparent;
    color:var(--text-soft);
    border:1.5px solid var(--gold-dim);
    border-radius:40px;
    padding:14px 35px;
    font-weight:600;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    flex:1;
    justify-content:center;
}

.cancel-btn:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
    transform:translateY(-2px);
    box-shadow:0 8px 20px var(--glow);
}

/* ================ ROW SPACING ================ */
.row{
    margin:-10px;
}

.row > [class*="col-"]{
    padding:10px;
}

/* ================ DATE/TIME INPUTS ================ */
input[type="date"],
input[type="time"]{
    color-scheme:var(--bg);
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

/* ================ PAYMENT STATUS BADGES FOR PREVIEW ================ */
.payment-badge{
    display:inline-block;
    padding:5px 12px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

.payment-badge.paid{
    background:rgba(25, 135, 84, 0.15);
    color:#198754;
    border:1px solid #198754;
}

.payment-badge.unpaid{
    background:rgba(220, 53, 69, 0.15);
    color:#dc3545;
    border:1px solid #dc3545;
}

.payment-badge.partial{
    background:rgba(255, 193, 7, 0.15);
    color:#ffc107;
    border:1px solid #ffc107;
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

body.light .service-grid{
    background:#f8f8f8;
}

body.light .service-box{
    background:#ffffff;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .edit-card{
        padding:25px 20px;
    }
    
    .card-title{
        font-size:22px;
    }
    
    .service-grid{
        grid-template-columns:1fr;
    }
    
    .button-group{
        flex-direction:column;
    }
    
    .update-btn,
    .cancel-btn{
        width:100%;
    }
}

/* ================ ANIMATION ================ */
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

.edit-card{
    animation:slideUp 0.5s ease;
}
</style>

<div class="appointment-wrapper">
    <div class="edit-card">

        <!-- Card Title -->
        <h4 class="card-title">
            <i class="fa fa-edit"></i>
            Edit Appointment
        </h4>

        <!-- Form -->
        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Customer Information -->
            <div class="section-heading">
                <i class="fa fa-user"></i>
                Customer Information
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa fa-user-circle"></i>
                        Customer Name <span class="text-gold">*</span>
                    </label>
                    <input type="text" 
                           name="customer_name" 
                           class="form-control @error('customer_name') is-invalid @enderror" 
                           value="{{ old('customer_name', $appointment->customer_name) }}"
                           placeholder="Enter full name"
                           required>
                    @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa fa-phone"></i>
                        Phone Number <span class="text-gold">*</span>
                    </label>
                    <input type="text" 
                           name="customer_phone" 
                           class="form-control @error('customer_phone') is-invalid @enderror" 
                           value="{{ old('customer_phone', $appointment->customer_phone) }}"
                           placeholder="Enter phone number"
                           required>
                    @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Services Selection -->
            <div class="section-heading">
                <i class="fa fa-scissors"></i>
                Select Services
            </div>

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
                               value="{{ $service->id }}"
                               {{ in_array($service->id, $appointment->services->pluck('id')->toArray()) ? 'checked' : '' }}>
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
            <div class="section-heading">
                <i class="fa fa-user-tie"></i>
                Staff Assignment
            </div>

            <label class="form-label">
                <i class="fa fa-user-tie"></i>
                Select Staff <span class="text-gold">*</span>
            </label>

            <select name="staff_id" class="form-control @error('staff_id') is-invalid @enderror" required>
                <option value="">Choose staff member</option>
                @foreach($staffs as $staff)
                <option value="{{ $staff->id }}" 
                        {{ old('staff_id', $appointment->staff_id) == $staff->id ? 'selected' : '' }}>
                    {{ $staff->name }} - {{ $staff->role ?? 'Staff' }}
                </option>
                @endforeach
            </select>
            @error('staff_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Date & Time -->
            <div class="section-heading">
                <i class="fa fa-calendar"></i>
                Date & Time
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa fa-calendar"></i>
                        Appointment Date <span class="text-gold">*</span>
                    </label>
                    <input type="date"
                           name="appointment_date"
                           class="form-control @error('appointment_date') is-invalid @enderror"
                           value="{{ old('appointment_date', $appointment->appointment_date) }}"
                           min="{{ date('Y-m-d') }}"
                           required>
                    @error('appointment_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa fa-clock"></i>
                        Appointment Time <span class="text-gold">*</span>
                    </label>
                    <input type="time"
                           name="appointment_time"
                           class="form-control @error('appointment_time') is-invalid @enderror"
                           value="{{ old('appointment_time', $appointment->appointment_time) }}"
                           required>
                    @error('appointment_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Status & Payment Section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading">
                        <i class="fa fa-info-circle"></i>
                        Appointment Status
                    </div>

                    <label class="form-label">
                        <i class="fa fa-tag"></i>
                        Status
                    </label>

                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="booked" {{ old('status', $appointment->status) == 'booked' ? 'selected' : '' }}>📅 Booked</option>
                        <option value="completed" {{ old('status', $appointment->status) == 'completed' ? 'selected' : '' }}>✅ Completed</option>
                        <option value="pending" {{ old('status', $appointment->status) == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                        <option value="cancelled" {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="section-heading">
                        <i class="fa fa-credit-card"></i>
                        Payment Status
                    </div>

                    <label class="form-label">
                        <i class="fa fa-money-bill-wave"></i>
                        Payment Status
                    </label>

                    <select name="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
                        <option value="paid" {{ old('payment_status', $appointment->payment_status) == 'paid' ? 'selected' : '' }}>
                            ✅ Paid
                        </option>
                        <option value="unpaid" {{ old('payment_status', $appointment->payment_status) == 'unpaid' ? 'selected' : '' }}>
                            ❌ Unpaid
                        </option>
                        <option value="partial" {{ old('payment_status', $appointment->payment_status) == 'partial' ? 'selected' : '' }}>
                            ⚠️ Partial
                        </option>
                        <option value="refunded" {{ old('payment_status', $appointment->payment_status) == 'refunded' ? 'selected' : '' }}>
                            ↩️ Refunded
                        </option>
                    </select>
                    @error('payment_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Payment Method (optional) -->
                  
                </div>
           
            <!-- Discount -->
            <div class="section-heading">
                <i class="fa fa-percent"></i>
                Discount & Total
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa fa-percent"></i>
                        Discount (%)
                    </label>
                    <input type="number"
                           id="discount"
                           name="discount"
                           class="form-control"
                           placeholder="Enter discount percentage"
                           min="0"
                           max="100"
                           value="{{ old('discount', $appointment->discount ?? 0) }}"
                           step="0.1">
                </div>

               
                </div>

            </div>

            <!-- Total Calculation Box -->
            <div class="total-box">
                <div class="total-row">
                    <span class="total-label">Subtotal:</span>
                    <span class="total-value" id="subtotal">₹0</span>
                </div>
                <div class="total-row">
                    <span class="total-label">Discount:</span>
                    <span class="total-value" id="discountAmount">₹0</span>
                </div>
                <div class="total-row" style="border-bottom:none;">
                    <span class="total-label" style="color:var(--gold-rich); font-weight:600;">Final Amount:</span>
                    <span class="final-value" id="finalTotal">₹0</span>
                </div>
            </div>

            <!-- Hidden Input for Amount -->
            <input type="hidden" name="amount" id="amount" value="{{ $appointment->amount }}">

            <!-- Action Buttons -->
            <div class="button-group">
                <button type="submit" class="update-btn">
                    <i class="fa fa-save"></i>
                    Update Appointment
                </button>

                <a href="{{ route('appointments.index') }}" class="cancel-btn">
                    <i class="fa fa-times"></i>
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>

<!-- Calculation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const checks = document.querySelectorAll('.service-check');
    const discountInput = document.getElementById('discount');
    const subtotalEl = document.getElementById('subtotal');
    const discountAmountEl = document.getElementById('discountAmount');
    const finalTotalEl = document.getElementById('finalTotal');
    const amountInput = document.getElementById('amount');
    
    let subtotal = 0;
    
    // Calculate from existing selections
    function calculateTotal() {
        subtotal = 0;
        checks.forEach(check => {
            if(check.checked) {
                subtotal += parseFloat(check.dataset.price) || 0;
            }
        });
        
        subtotalEl.innerText = '₹' + subtotal.toFixed(2);
        calculateFinal();
    }
    
    function calculateFinal() {
        const discount = parseFloat(discountInput.value) || 0;
        const discountAmount = (subtotal * discount) / 100;
        const final = subtotal - discountAmount;
        
        discountAmountEl.innerText = '₹' + discountAmount.toFixed(2);
        finalTotalEl.innerText = '₹' + final.toFixed(2);
        amountInput.value = final.toFixed(2);
    }
    
    // Add event listeners
    checks.forEach(check => {
        check.addEventListener('change', calculateTotal);
    });
    
    discountInput.addEventListener('input', calculateFinal);
    
    // Initial calculation
    calculateTotal();
});
</script>

@endsection