@extends('layouts.admin')

@section('content')

<style>
    /* Theme variables ke saath styling */
    .bg-card {
        background-color: var(--card);
    }
    .border-border {
        border-color: var(--border);
    }
    .text-soft {
        color: var(--text-soft);
    }
    .text-text {
        color: var(--text);
    }
    .text-gold {
        color: var(--gold-rich) !important;
    }
    .border-gold {
        border-color: var(--gold-rich) !important;
    }
    .bg-gold {
        background-color: var(--gold-rich) !important;
    }
    .bg-gold-light {
        background-color: rgba(139, 107, 62, 0.1);
    }
    
    /* Form input styling */
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        background-color: var(--card);
        border: 1px solid var(--border);
        color: var(--text);
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .form-input:focus {
        border-color: var(--gold-rich);
        box-shadow: 0 0 0 3px var(--glow);
        outline: none;
    }
    
    .form-input:hover {
        border-color: var(--gold-dim);
    }
    
    /* Label styling */
    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-soft);
    }
    
    .form-label i {
        color: var(--gold-rich);
        margin-right: 0.5rem;
        width: 1rem;
    }
    
    /* Submit button */
    .submit-btn {
        width: 100%;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(to right, #8B6B3E, #A07D4A);
        color: white;
        font-weight: 600;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
    }
    
    .submit-btn:hover {
        background: linear-gradient(to right, #745A31, #8B6B3E);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px var(--glow);
    }
    
    /* Form card */
    .form-card {
        background-color: var(--card);
        border: 1px solid var(--border);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.4s ease;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .form-header {
        background: linear-gradient(to right, #8B6B3E, #A07D4A);
        padding: 1rem 1.5rem;
    }
    
    .form-header h2 {
        color: white;
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-body {
        padding: 1.5rem;
    }
    
    /* Student info card */
    .student-info-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid #8B6B3E;
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px dashed var(--border);
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        color: var(--text-soft);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .info-value {
        font-weight: 700;
        font-size: 1.1rem;
    }
    
    .value-fee {
        color: #3B82F6;
    }
    
    .value-paid {
        color: #10B981;
    }
    
    .value-pending {
        color: #F59E0B;
    }
    
    /* Amount preview */
    .amount-preview {
        background-color: var(--hover);
        border-radius: 0.5rem;
        padding: 0.75rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    /* Progress bar */
    .progress-bar {
        width: 100%;
        height: 8px;
        background-color: var(--border);
        border-radius: 9999px;
        overflow: hidden;
        margin: 0.5rem 0;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(to right, #8B6B3E, #B68F5C);
        border-radius: 9999px;
        transition: width 0.3s ease;
    }
</style>

<div class="max-w-3xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-plus-circle mr-3" style="color: var(--gold-rich);"></i>
                Add Payment
            </h2>
            <p class="text-sm text-soft mt-1">Record a new payment for student</p>
        </div>
        <a href="{{ route('admin.payments.index') }}" 
           class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
           style="border-color: var(--gold-rich); color: var(--gold-rich);"
           onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
            <i class="fas fa-arrow-left mr-2"></i> Back to Payments
        </a>
    </div>

    <!-- Form Card -->
    <div class="form-card">
        <!-- Header -->
        <div class="form-header">
            <h2>
                <i class="fas fa-credit-card"></i>
                Payment Details
            </h2>
        </div>

        <!-- Form Body -->
        <div class="form-body">
            <!-- Student Information Card -->
            <div class="student-info-card">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                        <i class="fas fa-user-graduate text-gold text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg" style="color: var(--text);">{{ $student->name }}</h3>
                        <p class="text-xs" style="color: var(--text-soft);">ID: ST{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>

                @php
                    $paymentPercentage = $courseFee > 0 ? ($totalPaid / $courseFee) * 100 : 0;
                @endphp

                <!-- Progress Bar -->
                <div class="mb-3">
                    <div class="flex justify-between text-xs mb-1">
                        <span style="color: var(--text-soft);">Payment Progress</span>
                        <span class="font-semibold" style="color: var(--gold-rich);">{{ number_format($paymentPercentage, 1) }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $paymentPercentage }}%"></div>
                    </div>
                </div>

                <!-- Financial Details -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-tag"></i> Course Fee
                        </span>
                        <span class="info-value value-fee">₹{{ number_format($courseFee, 2) }}</span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-check-circle"></i> Total Paid
                        </span>
                        <span class="info-value value-paid">₹{{ number_format($totalPaid, 2) }}</span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">
                            <i class="fas fa-clock"></i> Pending
                        </span>
                        <span class="info-value value-pending">₹{{ number_format($pending, 2) }}</span>
                    </div>
                </div>

                <!-- Payment Status Message -->
                @if($pending <= 0)
                    <div class="mt-3 p-2 bg-green-100 text-green-700 rounded-lg text-sm text-center">
                        <i class="fas fa-check-circle mr-1"></i> Full payment completed!
                    </div>
                @elseif($totalPaid > 0)
                    <div class="mt-3 p-2 bg-blue-100 text-blue-700 rounded-lg text-sm text-center">
                        <i class="fas fa-info-circle mr-1"></i> Partial payment received
                    </div>
                @else
                    <div class="mt-3 p-2 bg-yellow-100 text-yellow-700 rounded-lg text-sm text-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> No payment recorded yet
                    </div>
                @endif
            </div>

            <form action="{{ route('admin.payments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">

                <div class="space-y-4">
                    <!-- Amount -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-rupee-sign"></i>Payment Amount <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="amount" 
                               id="amountInput"
                               value="{{ old('amount') }}"
                               class="form-input @error('amount') border-red-500 @enderror" 
                               placeholder="Enter amount"
                               min="1"
                               max="{{ $pending > 0 ? $pending : '' }}"
                               step="0.01"
                               required>
                        @error('amount')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror

                        <!-- Amount Preview -->
                        <div id="amountPreview" class="amount-preview hidden">
                            <span style="color: var(--text-soft);">New total paid:</span>
                            <span class="font-bold value-paid" id="newTotalPreview">₹{{ number_format($totalPaid, 2) }}</span>
                        </div>

                        @if($pending > 0)
                        <p class="text-xs text-soft mt-1">
                            <i class="fas fa-info-circle mr-1" style="color: var(--gold-rich);"></i>
                            Maximum payable: ₹{{ number_format($pending, 2) }} (pending amount)
                        </p>
                        @endif
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-credit-card"></i>Payment Method <span class="text-red-500">*</span>
                        </label>
                        <select name="payment_method" 
                                class="form-input @error('payment_method') border-red-500 @enderror" 
                                required>
                            <option value="" disabled {{ old('payment_method') ? '' : 'selected' }}>-- Select Payment Method --</option>
                            <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>
                                💵 Cash
                            </option>
                            <option value="Online" {{ old('payment_method') == 'Online' ? 'selected' : '' }}>
                                📱 Online Transfer
                            </option>
                            <option value="Card" {{ old('payment_method') == 'Card' ? 'selected' : '' }}>
                                💳 Card Payment
                            </option>
                            <option value="Bank Transfer" {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>
                                🏦 Bank Transfer
                            </option>
                            <option value="Cheque" {{ old('payment_method') == 'Cheque' ? 'selected' : '' }}>
                                📝 Cheque
                            </option>
                        </select>
                        @error('payment_method')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Payment Date -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-calendar-alt"></i>Payment Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               name="payment_date" 
                               value="{{ old('payment_date', date('Y-m-d')) }}"
                               class="form-input @error('payment_date') border-red-500 @enderror" 
                               required>
                        @error('payment_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notes / Receipt Info (Optional) -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-sticky-note"></i>Notes (Optional)
                        </label>
                        <textarea name="notes" 
                                  rows="2"
                                  class="form-input" 
                                  placeholder="Add any additional notes or receipt number">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Summary after payment -->
                    <div class="bg-gold-light rounded-lg p-3">
                        <h4 class="font-semibold text-sm mb-2" style="color: var(--text);">Payment Summary</h4>
                        <div class="grid grid-cols-2 gap-2 text-sm">
                            <span style="color: var(--text-soft);">Current Paid:</span>
                            <span class="text-right value-paid">₹{{ number_format($totalPaid, 2) }}</span>
                            
                            <span style="color: var(--text-soft);">Pending:</span>
                            <span class="text-right value-pending">₹{{ number_format($pending, 2) }}</span>
                            
                            <span style="color: var(--text-soft);">After Payment:</span>
                            <span class="text-right font-bold" style="color: var(--gold-rich);" id="afterPayment">₹{{ number_format($totalPaid, 2) }}</span>
                        </div>
                    </div>

                    <!-- Quick Tips -->
                    <div class="rounded-lg p-4" style="background-color: var(--hover); border: 1px solid var(--border);">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-xl" style="color: var(--gold-rich);"></i>
                            <div>
                                <h4 class="font-semibold text-sm mb-1" style="color: var(--text);">Quick Tips:</h4>
                                <ul class="text-xs space-y-1" style="color: var(--text-soft);">
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Amount cannot exceed pending balance</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Select correct payment method for records</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Payment date defaults to today</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Add receipt number in notes for reference</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" {{ $pending <= 0 ? 'disabled' : '' }} 
                            style="{{ $pending <= 0 ? 'opacity: 0.5; cursor: not-allowed;' : '' }}">
                        <i class="fas fa-save"></i>
                        {{ $pending <= 0 ? 'Fully Paid' : 'Record Payment' }}
                    </button>

                    @if($pending <= 0)
                    <p class="text-center text-xs text-soft">
                        <i class="fas fa-info-circle mr-1"></i>
                        This student has already paid the full course fee
                    </p>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Payments for this Student (Optional) -->
    @if($student->payments->count() > 0)
    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4 flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-history mr-2"></i>
            Recent Payments
        </h3>
        <div class="space-y-2">
            @foreach($student->payments->take(3) as $payment)
            <div class="flex items-center justify-between p-3 rounded-lg" style="background-color: var(--hover); border: 1px solid var(--border);">
                <div>
                    <span class="font-semibold" style="color: var(--text);">₹{{ number_format($payment->amount, 2) }}</span>
                    <span class="text-xs ml-2 method-badge" style="background: rgba(139, 107, 62, 0.1); color: var(--gold-rich);">
                        {{ $payment->payment_method }}
                    </span>
                </div>
                <span class="text-xs" style="color: var(--text-soft);">
                    <i class="far fa-calendar-alt mr-1"></i>
                    {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    // Live amount preview and validation
    document.addEventListener('DOMContentLoaded', function() {
        const amountInput = document.getElementById('amountInput');
        const amountPreview = document.getElementById('amountPreview');
        const newTotalPreview = document.getElementById('newTotalPreview');
        const afterPayment = document.getElementById('afterPayment');
        const totalPaid = {{ $totalPaid }};
        const pending = {{ $pending }};
        
        function updatePreview() {
            const amount = parseFloat(amountInput.value) || 0;
            
            if (amount > 0) {
                amountPreview.classList.remove('hidden');
                const newTotal = totalPaid + amount;
                newTotalPreview.textContent = '₹' + newTotal.toFixed(2);
                afterPayment.textContent = '₹' + newTotal.toFixed(2);
                
                // Validate against pending
                if (amount > pending) {
                    amountInput.style.borderColor = '#ef4444';
                } else {
                    amountInput.style.borderColor = '';
                }
            } else {
                amountPreview.classList.add('hidden');
                afterPayment.textContent = '₹' + totalPaid.toFixed(2);
            }
        }
        
        if (amountInput) {
            amountInput.addEventListener('input', updatePreview);
            
            // Validate on submit
            document.querySelector('form').addEventListener('submit', function(e) {
                const amount = parseFloat(amountInput.value) || 0;
                if (amount > pending) {
                    e.preventDefault();
                    alert('Amount cannot exceed pending balance of ₹' + pending.toFixed(2));
                }
            });
        }
    });
</script>

@endsection