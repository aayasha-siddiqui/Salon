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
        padding: 0.625rem 1rem;
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
    
    .submit-btn i {
        font-size: 1rem;
    }
    
    /* Cancel button */
    .cancel-btn {
        width: 100%;
        padding: 0.75rem 1.5rem;
        background-color: transparent;
        border: 1px solid var(--border);
        color: var(--text-soft);
        font-weight: 600;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        cursor: pointer;
        text-decoration: none;
    }
    
    .cancel-btn:hover {
        background-color: var(--hover);
        border-color: var(--gold-rich);
        color: var(--gold-rich);
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
    
    /* Grid layouts */
    .form-grid-2 {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1rem;
    }
    
    @media (min-width: 640px) {
        .form-grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    /* Error message */
    .error-message {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* Required star */
    .required-star {
        color: var(--gold-rich);
        margin-left: 0.25rem;
    }
    
    /* Info card */
    .info-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-left: 4px solid #8B6B3E;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-top: 1rem;
    }
    
    /* Experience badge */
    .exp-badge {
        background: linear-gradient(135deg, #8B6B3E20, #A07D4A20);
        color: var(--gold-rich);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Current info card */
    .current-info {
        background-color: var(--hover);
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        padding: 0.75rem;
        margin-bottom: 1rem;
    }
</style>

<div class="max-w-3xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header -->
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-user-edit mr-3" style="color: var(--gold-rich);"></i>
                Edit Trainer
            </h2>
            <p class="text-sm text-soft mt-1">Update trainer information and details</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.trainers.show', $trainer->id) }}" 
               class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
               style="border-color: var(--gold-rich); color: var(--gold-rich);"
               onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
                <i class="fas fa-eye mr-2"></i> View
            </a>
            <a href="{{ route('admin.trainers.index') }}" 
               class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
               style="border-color: var(--border); color: var(--text-soft);"
               onmouseover="this.style.backgroundColor='var(--hover)';"
               onmouseout="this.style.backgroundColor='transparent';">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="form-card">
        <!-- Header -->
        <div class="form-header">
            <h2>
                <i class="fas fa-chalkboard-teacher"></i>
                Edit Trainer Information
            </h2>
        </div>

        <!-- Form Body -->
        <div class="form-body">
            <!-- Current Trainer Info Summary -->
            <div class="current-info flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-user-tie text-gold text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-text">{{ $trainer->name }}</h4>
                    <p class="text-xs text-soft">
                        <i class="fas fa-envelope mr-1"></i>{{ $trainer->email }} • 
                        <i class="fas fa-phone ml-1 mr-1"></i>{{ $trainer->phone }}
                    </p>
                </div>
                <div class="ml-auto">
                    @if($trainer->status == 1)
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Active</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold">Inactive</span>
                    @endif
                </div>
            </div>

            <form action="{{ route('admin.trainers.update', $trainer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Name & Email Row -->
                    <div class="form-grid-2">
                        <!-- Name -->
                        <div>
                            <label class="form-label">
                                <i class="fas fa-user"></i>Full Name <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   value="{{ old('name', $trainer->name) }}"
                                   class="form-input @error('name') border-red-500 @enderror" 
                                   placeholder="e.g., John Doe"
                                   required>
                            @error('name')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="form-label">
                                <i class="fas fa-envelope"></i>Email Address <span class="required-star">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email', $trainer->email) }}"
                                   class="form-input @error('email') border-red-500 @enderror" 
                                   placeholder="trainer@example.com"
                                   required>
                            @error('email')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone & Specialization Row -->
                    <div class="form-grid-2">
                        <!-- Phone -->
                        <div>
                            <label class="form-label">
                                <i class="fas fa-phone"></i>Phone Number <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="phone" 
                                   value="{{ old('phone', $trainer->phone) }}"
                                   class="form-input @error('phone') border-red-500 @enderror" 
                                   placeholder="+91 98765 43210"
                                   required>
                            @error('phone')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Specialization -->
                        <div>
                            <label class="form-label">
                                <i class="fas fa-tag"></i>Specialization <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="specialization" 
                                   value="{{ old('specialization', $trainer->specialization) }}"
                                   class="form-input @error('specialization') border-red-500 @enderror" 
                                   placeholder="e.g., Web Development"
                                   required>
                            @error('specialization')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Experience & Salary Row -->
                    <div class="form-grid-2">
                        <!-- Experience -->
                        <div>
                            <label class="form-label">
                                <i class="fas fa-briefcase"></i>Experience (Years) <span class="required-star">*</span>
                            </label>
                            <input type="number" 
                                   name="experience" 
                                   value="{{ old('experience', $trainer->experience) }}"
                                   class="form-input @error('experience') border-red-500 @enderror" 
                                   placeholder="e.g., 5"
                                   min="0"
                                   step="0.5"
                                   required>
                            @error('experience')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Salary -->
                        <div>
                            <label class="form-label">
                                <i class="fas fa-rupee-sign"></i>Monthly Salary (₹) <span class="required-star">*</span>
                            </label>
                            <input type="number" 
                                   name="salary" 
                                   value="{{ old('salary', $trainer->salary) }}"
                                   class="form-input @error('salary') border-red-500 @enderror" 
                                   placeholder="e.g., 35000"
                                   min="0"
                                   step="1000"
                                   required>
                            @error('salary')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-toggle-on"></i>Status <span class="required-star">*</span>
                        </label>
                        <select name="status" class="form-input @error('status') border-red-500 @enderror" required>
                            <option value="1" {{ old('status', $trainer->status) == '1' ? 'selected' : '' }}>
                                🟢 Active
                            </option>
                            <option value="0" {{ old('status', $trainer->status) == '0' ? 'selected' : '' }}>
                                🔴 Inactive
                            </option>
                        </select>
                        @error('status')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Courses Taught (if any) -->
                   @if($trainer->courses && $trainer->courses->count() > 0)
                    <div class="info-card">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-book-open text-gold"></i>
                            <span class="font-semibold text-sm" style="color: var(--text);">Currently Teaching</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($trainer->courses as $course)
                                <span class="exp-badge text-xs">
                                    {{ $course->title }}
                                </span>
                            @endforeach
                        </div>
                        <p class="text-xs text-soft mt-2">
                            <i class="fas fa-info-circle mr-1"></i>
                            Updating trainer info won't affect course assignments
                        </p>
                    </div>
                    @endif

                    <!-- Quick Tips -->
                    <div class="rounded-lg p-4" style="background-color: var(--hover); border: 1px solid var(--border);">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-xl" style="color: var(--gold-rich);"></i>
                            <div>
                                <h4 class="font-semibold text-sm mb-1" style="color: var(--text);">Quick Tips:</h4>
                                <ul class="text-xs space-y-1" style="color: var(--text-soft);">
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Email should be unique in the system</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Experience can be updated as years increase</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Inactive trainers won't appear in new course assignments</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Salary changes will reflect in future salary reports</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row items-center gap-3 pt-4">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>
                            Update Trainer
                        </button>

                        <a href="{{ route('admin.trainers.index') }}" class="cancel-btn">
                            <i class="fas fa-times"></i>
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Update History (Optional) -->
    @if(isset($trainer->updated_at))
    <div class="mt-4 text-right">
        <p class="text-xs text-soft">
            <i class="fas fa-clock mr-1"></i>
            Last updated: {{ $trainer->updated_at->format('d M Y, h:i A') }}
        </p>
    </div>
    @endif
</div>

<script>
    // Format phone number as user types
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInput = document.querySelector('input[name="phone"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 10) value = value.slice(0, 10);
                
                if (value.length > 5) {
                    value = value.slice(0, 5) + ' ' + value.slice(5);
                }
                e.target.value = value;
            });

            // Format initial value
            let initialValue = phoneInput.value.replace(/\D/g, '');
            if (initialValue.length > 5) {
                initialValue = initialValue.slice(0, 5) + ' ' + initialValue.slice(5);
            }
            phoneInput.value = initialValue;
        }

        // Auto-capitalize name and specialization
        const nameInput = document.querySelector('input[name="name"]');
        const specInput = document.querySelector('input[name="specialization"]');
        
        [nameInput, specInput].forEach(input => {
            if (input) {
                input.addEventListener('blur', function() {
                    if (this.value) {
                        this.value = this.value.split(' ')
                            .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
                            .join(' ');
                    }
                });
            }
        });

        // Format salary with commas on blur
        const salaryInput = document.querySelector('input[name="salary"]');
        if (salaryInput) {
            salaryInput.addEventListener('blur', function() {
                if (this.value) {
                    const num = parseInt(this.value);
                    if (!isNaN(num)) {
                        this.value = num;
                    }
                }
            });
        }

        // Experience validation
        const expInput = document.querySelector('input[name="experience"]');
        if (expInput) {
            expInput.addEventListener('blur', function() {
                if (this.value) {
                    let exp = parseFloat(this.value);
                    if (exp < 0) exp = 0;
                    if (exp > 50) exp = 50;
                    this.value = exp;
                }
            });
        }

        // Warn before leaving if form is dirty
        const form = document.querySelector('form');
        let formDirty = false;
        
        form.querySelectorAll('input, select').forEach(field => {
            field.addEventListener('change', () => formDirty = true);
            field.addEventListener('input', () => formDirty = true);
        });

        window.addEventListener('beforeunload', function(e) {
            if (formDirty) {
                e.preventDefault();
                e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
            }
        });

        form.addEventListener('submit', function() {
            formDirty = false;
        });
    });
</script>

@endsection