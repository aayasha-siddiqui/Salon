@extends('salon.layouts.app')

@section('content')

<style>
/* ================ BILLING CREATE PAGE - DARK GOLD THEME ================ */

/* ================ PAGE CONTAINER ================ */
.billing-wrapper{
    padding:25px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.billing-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    padding:30px;
    position:relative;
    overflow:hidden;
    transition:.3s;
    max-width:1200px;
    margin:0 auto;
}

.billing-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 40px var(--glow);
}

.billing-card::before{
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
    font-size:24px;
    color:var(--gold-rich);
    margin-bottom:25px;
    padding-bottom:12px;
    border-bottom:2px solid var(--border);
    display:flex;
    align-items:center;
    gap:10px;
}

.card-title i{
    color:var(--gold-rich);
}

/* ================ CUSTOMER INFO CARD (NEW) ================ */
.customer-info-card{
    background:var(--hover);
    border:1.5px solid var(--gold-dim);
    border-radius:16px;
    padding:20px;
    margin-top:15px;
    margin-bottom:15px;
    position:relative;
    overflow:hidden;
    transition:.3s;
}

.customer-info-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 5px 20px var(--glow);
}

.customer-info-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:4px;
    height:100%;
    background:linear-gradient(180deg, var(--gold-rich), var(--gold-dim));
}

.customer-avatar{
    width:50px;
    height:50px;
    background:var(--gold-dim);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    color:#000000;
    border:2px solid var(--gold-rich);
}

.customer-stats{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.stat-item{
    background:var(--card);
    border-radius:12px;
    padding:8px 15px;
    border:1px solid var(--border);
}

.stat-label{
    font-size:11px;
    color:var(--text-soft);
    text-transform:uppercase;
}

.stat-value{
    font-size:18px;
    font-weight:700;
    color:var(--gold-rich);
}

.stat-value.outstanding{
    color:#dc3545;
}

.stat-value.paid{
    color:#198754;
}

/* Outstanding Warning */
.outstanding-warning{
    background:rgba(220,53,69,0.1);
    border:1px solid #dc3545;
    border-radius:10px;
    padding:10px 15px;
    margin-top:10px;
    color:#dc3545;
    font-size:13px;
    display:flex;
    align-items:center;
    gap:10px;
}

.outstanding-warning i{
    font-size:16px;
}

/* Quick Actions */
.quick-actions{
    display:flex;
    gap:10px;
    margin-top:10px;
}

.btn-view-khata{
    background:transparent;
    border:1px solid var(--gold-rich);
    color:var(--gold-rich);
    border-radius:8px;
    padding:5px 15px;
    font-size:12px;
    transition:.3s;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:5px;
}

.btn-view-khata:hover{
    background:var(--gold-rich);
    color:#000000;
}

/* ================ FORM LABELS ================ */
.form-label{
    font-weight:500;
    margin-bottom:6px;
    color:var(--text-soft);
    font-size:13px;
    display:flex;
    align-items:center;
    gap:5px;
}

.form-label i{
    color:var(--gold-rich);
    font-size:12px;
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:10px;
    color:var(--text);
    font-size:13px;
    padding:10px 12px;
    transition:.3s;
    height:40px;
    width:100%;
}

.form-control:focus,
.form-select:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 3px var(--glow);
    outline:none;
}

.form-control::placeholder{
    color:var(--text-soft);
    opacity:0.6;
}

.form-control[readonly]{
    background:var(--hover);
    cursor:default;
}

/* ================ DIVIDER ================ */
.divider{
    border-top:1px solid var(--border);
    margin:25px 0;
}

/* ================ SECTION TITLE ================ */
.section-title{
    font-weight:600;
    font-size:16px;
    color:var(--gold-rich);
    margin-bottom:15px;
    display:flex;
    align-items:center;
    gap:8px;
}

.section-title i{
    color:var(--gold-rich);
}

/* ================ SERVICE ROW ================ */
.service-row{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:12px;
    padding:15px;
    margin-bottom:15px;
    position:relative;
    transition:.3s;
}

.service-row:hover{
    border-color:var(--gold-dim);
    box-shadow:0 5px 15px var(--glow);
}

/* ================ REMOVE BUTTON ================ */
.remove-btn{
    background:transparent;
    border:1.5px solid #ff6b6b;
    color:#ff6b6b;
    border-radius:8px;
    height:40px;
    width:100%;
    font-size:13px;
    font-weight:500;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:5px;
    transition:.3s;
}

.remove-btn:hover{
    background:#ff6b6b;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px rgba(255,107,107,0.3);
}

.remove-btn i{
    font-size:12px;
}

/* ================ ADD BUTTON ================ */
.add-btn{
    background:transparent;
    border:1.5px dashed var(--gold-rich);
    color:var(--gold-rich);
    border-radius:10px;
    padding:10px 20px;
    font-size:13px;
    font-weight:500;
    display:inline-flex;
    align-items:center;
    gap:8px;
    transition:.3s;
    margin-bottom:20px;
}

.add-btn:hover{
    background:var(--gold-rich);
    color:#000000;
    border-style:solid;
    transform:translateY(-2px);
    box-shadow:0 8px 20px var(--glow);
}

/* ================ TOTAL FIELDS ================ */
.total-field{
    background:var(--gold-dim);
    border:1.5px solid var(--gold-rich);
    color:#000000;
    font-weight:600;
    font-size:14px;
}

.total-field[readonly]{
    background:var(--gold-dim);
    color:#000000;
    font-weight:700;
}

/* ================ PAYMENT SECTION ================ */
.payment-section{
    background:var(--hover);
    border-radius:15px;
    padding:20px;
    margin-top:15px;
    border:1px solid var(--border);
}

/* ================ GENERATE BUTTON ================ */
.generate-btn{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-glow));
    color:#000000;
    border:none;
    border-radius:40px;
    padding:12px 35px;
    font-weight:600;
    font-size:14px;
    transition:.4s;
    box-shadow:0 8px 20px var(--glow);
    display:inline-flex;
    align-items:center;
    gap:10px;
    border:1px solid var(--gold-rich);
}

.generate-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    background:linear-gradient(135deg, var(--gold-glow), var(--gold-rich));
}

/* Loading Spinner */
.loading-spinner{
    display:inline-block;
    width:16px;
    height:16px;
    border:2px solid var(--gold-dim);
    border-top-color:var(--gold-rich);
    border-radius:50%;
    animation:spin 1s linear infinite;
}

@keyframes spin{
    to{transform:rotate(360deg);}
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .billing-card{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
    color:#1A1A1A;
}

body.light .service-row{
    background:#f8f8f8;
}

body.light .total-field[readonly]{
    background:#f0e9d8;
    color:#8B6B3E;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .billing-card{
        padding:20px;
    }
    
    .card-title{
        font-size:20px;
    }
    
    .service-row{
        padding:12px;
    }
    
    .remove-btn{
        margin-top:10px;
    }
    
    .payment-section{
        padding:15px;
    }
    
    .generate-btn{
        width:100%;
        justify-content:center;
    }
    
    .customer-stats{
        gap:10px;
    }
    
    .stat-item{
        padding:5px 10px;
    }
}

/* ================ UTILITY CLASSES ================ */
.text-gold{
    color:var(--gold-rich);
}

.mb-2{
    margin-bottom:8px;
}

.mt-3{
    margin-top:15px;
}

.mb-4{
    margin-bottom:20px;
}

.fw-semibold{
    font-weight:500;
}
</style>

<div class="billing-wrapper">
    <div class="billing-card">

        <!-- Card Title -->
        <h4 class="card-title">
            <i class="fa fa-file-invoice"></i>
            Create New Bill
        </h4>

        <!-- Form -->
        <form action="{{ route('billing.store') }}" method="POST" id="billingForm">
            @csrf

            <!-- Customer Information -->
            <div class="section-title">
                <i class="fa fa-user-circle"></i>
                Customer Information
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fa fa-user"></i>
                        Customer Name <span class="text-gold">*</span>
                    </label>
                    <input type="text" 
                           name="customer_name" 
                           id="customer_name"
                           class="form-control @error('customer_name') is-invalid @enderror" 
                           value="{{ old('customer_name') }}"
                           placeholder="Enter customer name"
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
                    <div class="position-relative">
                        <input type="text" 
                               name="customer_phone" 
                               id="customer_phone"
                               class="form-control @error('customer_phone') is-invalid @enderror" 
                               value="{{ old('customer_phone') }}"
                               placeholder="Enter phone number"
                               required>
                        <div id="phone-spinner" style="display: none; position: absolute; right: 10px; top: 12px;">
                            <div class="loading-spinner"></div>
                        </div>
                    </div>
                    @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- ========== NEW: Customer Info Card (Shows when customer exists) ========== -->
            <div id="customer-info-card" class="customer-info-card" style="display: none;">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div class="customer-avatar">
                        <i class="fa fa-user"></i>
                    </div>
                    <div>
                        <h5 style="color: var(--gold-rich); margin: 0;" id="display-customer-name"></h5>
                        <p style="color: var(--text-soft); margin: 0; font-size: 13px;" id="display-customer-phone"></p>
                    </div>
                    <div class="customer-stats ms-auto">
                        <div class="stat-item">
                            <div class="stat-label">Total Visits</div>
                            <div class="stat-value" id="display-total-visits">0</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Total Billed</div>
                            <div class="stat-value" id="display-total-billed">₹0</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Total Paid</div>
                            <div class="stat-value paid" id="display-total-paid">₹0</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Outstanding</div>
                            <div class="stat-value outstanding" id="display-outstanding">₹0</div>
                        </div>
                    </div>
                </div>

                <!-- Outstanding Warning (shows if balance > 0) -->
                <div id="outstanding-warning" class="outstanding-warning" style="display: none;">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span id="outstanding-message"></span>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <a href="#" id="view-khata-link" target="_blank" class="btn-view-khata">
                        <i class="fa fa-book"></i> View Full Khata
                    </a>
                    <button type="button" id="clear-customer" class="btn-view-khata" style="border-color: #6c757d; color: #6c757d;">
                        <i class="fa fa-times"></i> New Customer
                    </button>
                </div>
            </div>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Services Section -->
            <div class="section-title">
                <i class="fa fa-scissors"></i>
                Services
            </div>

            <div id="service-wrapper">
                <!-- First Service Row -->
                <div class="service-row">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-6">
                            <label class="form-label">
                                <i class="fa fa-tag"></i>
                                Select Service
                            </label>
                            <select name="service_id[]" 
                                    class="form-select service-select" 
                                    required>
                                <option value="">Choose service</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}"
                                        data-price="{{ $service->price }}">
                                    {{ $service->name }} (₹{{ $service->price }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="fa fa-user-tie"></i>
                                Assign Staff
                            </label>
                            <select name="staff_id[]" 
                                    class="form-select" 
                                    required>
                                <option value="">Choose staff</option>
                                @foreach($staffs as $staff)
                                <option value="{{ $staff->id }}">
                                    {{ $staff->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="button"
                                    class="remove-btn">
                                <i class="fa fa-trash"></i>
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Service Button -->
            <button type="button"
                    class="add-btn"
                    id="add-service">
                <i class="fa fa-plus-circle"></i>
                Add Another Service
            </button>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Total Calculation -->
            <div class="section-title">
                <i class="fa fa-calculator"></i>
                Total Calculation
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa fa-file-text"></i>
                        Subtotal
                    </label>
                    <input type="text"
                           id="subtotal"
                           class="form-control total-field"
                           readonly
                           value="0.00">
                </div>

                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa fa-percent"></i>
                        Discount (₹)
                    </label>
                    <input type="number"
                           id="discount"
                           name="discount"
                           class="form-control"
                           value="0"
                           min="0"
                           step="1">
                </div>

                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa fa-money-bill"></i>
                        Final Total
                    </label>
                    <input type="text"
                           id="final_total"
                           name="total_amount"
                           class="form-control total-field"
                           readonly
                           value="0.00">
                </div>
                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa fa-wallet"></i>
                        Paid Amount (₹)
                    </label>
                    <input type="number"
                           id="paid_amount"
                           name="paid_amount"
                           class="form-control"
                           value="0"
                           min="0">
                </div>

                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fa fa-clock"></i>
                        Remaining Amount (₹)
                    </label>
                    <input type="text"
                           id="remaining_amount"
                           name="remaining_amount"
                           class="form-control total-field"
                           readonly
                           value="0.00">
                </div>
            </div>

            <!-- Payment Section -->
            <div class="payment-section">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa fa-credit-card"></i>
                            Payment Method <span class="text-gold">*</span>
                        </label>
                        <select name="payment_method" 
                                class="form-select" 
                                required>
                            <option value="">Select method</option>
                            <option value="cash">💵 Cash</option>
                            <option value="upi">📱 UPI</option>
                            <option value="card">💳 Card</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa fa-info-circle"></i>
                            Payment Status
                        </label>
                        <select name="payment_status" 
                                class="form-select">
                            <option value="paid">✅ Paid</option>
                            <option value="partial">🔄 Partially Paid</option>
                            <option value="pending">⏳ Pending</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-end mt-4">
                <button type="submit" class="generate-btn" id="submit-btn">
                    <i class="fa fa-file-pdf"></i>
                    Generate Bill
                </button>
            </div>

        </form>

    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ========== CUSTOMER CHECK FUNCTION ==========
    let phoneInput = document.getElementById('customer_phone');
    let nameInput = document.getElementById('customer_name');
    let customerInfoCard = document.getElementById('customer-info-card');
    let phoneSpinner = document.getElementById('phone-spinner');
    let checkTimeout;
    
    // Customer check on phone number input
    phoneInput.addEventListener('input', function() {
        clearTimeout(checkTimeout);
        let phone = this.value.replace(/\D/g, ''); // Remove non-digits
        
        if(phone.length >= 10) {
            phoneSpinner.style.display = 'block';
            
            checkTimeout = setTimeout(function() {
                fetch(`/customer/check/${phone}`)
                    .then(response => response.json())
                    .then(data => {
                        phoneSpinner.style.display = 'none';
                        
                        if(data.exists) {
                            // Show customer info card
                            customerInfoCard.style.display = 'block';
                            
                            // Update display fields
                            document.getElementById('display-customer-name').textContent = data.name;
                            document.getElementById('display-customer-phone').textContent = data.phone;
                            document.getElementById('display-total-visits').textContent = data.total_visits || 0;
                            document.getElementById('display-total-billed').textContent = '₹' + (data.total_billed || 0);
                            document.getElementById('display-total-paid').textContent = '₹' + (data.total_paid || 0);
                            document.getElementById('display-outstanding').textContent = '₹' + (data.outstanding || 0);
                            
                            // Auto-fill name if empty
                            if(!nameInput.value) {
                                nameInput.value = data.name;
                            }
                            
                            // Show outstanding warning if any
                            let outstandingWarning = document.getElementById('outstanding-warning');
                            let outstandingMsg = document.getElementById('outstanding-message');
                            
                            if(data.outstanding > 0) {
                                outstandingWarning.style.display = 'flex';
                                outstandingMsg.textContent = `⚠️ Customer has outstanding balance of ₹${data.outstanding}. Please ask them to clear previous dues!`;
                                
                                // Highlight the warning
                                outstandingWarning.style.animation = 'pulse 1s';
                                setTimeout(() => {
                                    outstandingWarning.style.animation = '';
                                }, 1000);
                            } else {
                                outstandingWarning.style.display = 'none';
                            }
                            
                            // Update View Khata link
                            let khataLink = document.getElementById('view-khata-link');
                            khataLink.href = `/customer/${data.id}/khata`;
                            
                        } else {
                            // Hide customer info card
                            customerInfoCard.style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        phoneSpinner.style.display = 'none';
                    });
            }, 500); // Wait 500ms after user stops typing
        } else {
            customerInfoCard.style.display = 'none';
            phoneSpinner.style.display = 'none';
        }
    });
    
    // Clear customer button
    document.getElementById('clear-customer').addEventListener('click', function() {
        customerInfoCard.style.display = 'none';
        phoneInput.value = '';
        nameInput.value = '';
        nameInput.focus();
    });
    
    // ========== CALCULATE TOTAL FUNCTION ==========
    function calculateTotal() {
        let subtotal = 0;
        
        document.querySelectorAll('.service-select').forEach(function(select) {
            let option = select.options[select.selectedIndex];
            if(option && option.dataset.price) {
                subtotal += parseFloat(option.dataset.price);
            }
        });
        
        document.getElementById('subtotal').value = subtotal.toFixed(2);
        
        let discount = parseFloat(document.getElementById('discount').value) || 0;
        let final = subtotal - discount;
        if(final < 0) final = 0;
        
        document.getElementById('final_total').value = final.toFixed(2);
        
        let paid = parseFloat(document.getElementById('paid_amount').value) || 0;
        let remaining = final - paid;
        if(remaining < 0) remaining = 0;
        
        document.getElementById('remaining_amount').value = remaining.toFixed(2);
        
        // Auto-adjust payment status based on paid amount
        let paymentStatus = document.querySelector('select[name="payment_status"]');
        if(paid >= final && final > 0) {
            paymentStatus.value = 'paid';
        } else if(paid > 0) {
            paymentStatus.value = 'partial';
        }
    }
    
    // ========== ADD SERVICE ROW ==========
    document.getElementById('add-service').addEventListener('click', function() {
        let wrapper = document.getElementById('service-wrapper');
        let originalRow = document.querySelector('.service-row');
        let newRow = originalRow.cloneNode(true);
        
        // Clear all selects in new row
        newRow.querySelectorAll('select').forEach(select => {
            select.value = '';
        });
        
        wrapper.appendChild(newRow);
    });
    
    // ========== REMOVE SERVICE ROW ==========
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-btn') || 
           e.target.parentElement?.classList.contains('remove-btn')) {
            
            let btn = e.target.classList.contains('remove-btn') ? 
                     e.target : e.target.parentElement;
            let rows = document.querySelectorAll('.service-row');
            
            if(rows.length > 1) {
                btn.closest('.service-row').remove();
                calculateTotal();
            } else {
                alert('At least one service is required');
            }
        }
    });
    
    // ========== EVENT LISTENERS ==========
    document.addEventListener('change', function(e) {
        if(e.target.classList.contains('service-select')) {
            calculateTotal();
        }
    });
    
    document.getElementById('discount').addEventListener('input', calculateTotal);
    document.getElementById('paid_amount').addEventListener('input', calculateTotal);
    
    // ========== FORM SUBMIT VALIDATION ==========
    document.getElementById('billingForm').addEventListener('submit', function(e) {
        let paidAmount = parseFloat(document.getElementById('paid_amount').value) || 0;
        let finalTotal = parseFloat(document.getElementById('final_total').value) || 0;
        let outstandingAmount = parseFloat(document.getElementById('display-outstanding')?.textContent?.replace('₹', '') || 0);
        
        // Warning for outstanding balance
        if(outstandingAmount > 0) {
            if(!confirm(`⚠️ This customer already has ₹${outstandingAmount} outstanding from previous bills. Continue anyway?`)) {
                e.preventDefault();
                return false;
            }
        }
        
        // Validation for payment
        if(paidAmount > finalTotal) {
            alert('Paid amount cannot be greater than final total!');
            e.preventDefault();
            return false;
        }
    });
    
    // Initial calculation
    calculateTotal();
    
    // Add animation keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; background: rgba(220,53,69,0.2); }
            100% { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
});
</script>

@endsection