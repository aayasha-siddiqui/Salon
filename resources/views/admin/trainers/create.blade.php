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
    .exp-preview {
        background: linear-gradient(135deg, #8B6B3E20, #A07D4A20);
        color: var(--gold-rich);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
</style>

<div class="max-w-3xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-chalkboard-teacher mr-3" style="color: var(--gold-rich);"></i>
                Add New Trainer
            </h2>
            <p class="text-sm text-soft mt-1">Add a new trainer to your teaching staff</p>
        </div>
        <a href="{{ route('admin.trainers.index') }}" 
           class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
           style="border-color: var(--gold-rich); color: var(--gold-rich);"
           onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <!-- Form Card -->
    <div class="form-card">
        <!-- Header -->
        <div class="form-header">
            <h2>
                <i class="fas fa-user-plus"></i>
                Trainer Information
            </h2>
        </div>

        <!-- Form Body -->
        <div class="form-body">
            <form action="{{ route('admin.trainers.store') }}" method="POST">
                @csrf

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
                                   value="{{ old('name') }}"
                                   class="form-input" 
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
                                   value="{{ old('email') }}"
                                   class="form-input" 
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
                                   value="{{ old('phone') }}"
                                   class="form-input" 
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
                                   value="{{ old('specialization') }}"
                                   class="form-input" 
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
                                   value="{{ old('experience') }}"
                                   class="form-input" 
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
                                   value="{{ old('salary') }}"
                                   class="form-input" 
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
                        <select name="status" class="form-input" required>
                            <option value="" disabled {{ old('status') === null ? 'selected' : '' }}>-- Select Status --</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                🟢 Active
                            </option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                🔴 Inactive
                            </option>
                        </select>
                        @error('status')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Preview Card (shows while typing) -->
                    <div class="info-card" id="previewCard" style="display: none;">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                                <i class="fas fa-user-tie text-gold text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text" id="previewName">Trainer Name</h4>
                                <p class="text-xs text-soft" id="previewDetails">Specialization • Experience</p>
                            </div>
                            <div class="ml-auto">
                                <span class="exp-preview" id="previewSalary">₹0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Tips -->
                    <div class="rounded-lg p-4" style="background-color: var(--hover); border: 1px solid var(--border);">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-xl" style="color: var(--gold-rich);"></i>
                            <div>
                                <h4 class="font-semibold text-sm mb-1" style="color: var(--text);">Quick Tips:</h4>
                                <ul class="text-xs space-y-1" style="color: var(--text-soft);">
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Use full name for better identification</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Experience can be in decimal (e.g., 2.5 years)</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Inactive trainers won't appear in course assignments</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Salary should be monthly amount in rupees</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>
                            Save Trainer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Trainers Preview (Optional) -->
    @if(isset($recentTrainers) && $recentTrainers->count() > 0)
    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4 flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-history mr-2"></i>
            Recently Added Trainers
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($recentTrainers as $recent)
            <div class="rounded-lg p-4" style="background-color: var(--card); border: 1px solid var(--border);">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-full bg-gold-light flex items-center justify-center">
                        <i class="fas fa-user-tie text-gold"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-sm" style="color: var(--text);">{{ $recent->name }}</h4>
                        <p class="text-xs text-soft">{{ $recent->specialization }}</p>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="exp-preview text-xs">
                        <i class="fas fa-briefcase mr-1"></i>{{ $recent->experience }} yrs
                    </span>
                    <span class="text-sm font-semibold" style="color: var(--gold-rich);">
                        ₹{{ number_format($recent->salary, 0) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    // Live preview functionality
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.querySelector('input[name="name"]');
        const specializationInput = document.querySelector('input[name="specialization"]');
        const experienceInput = document.querySelector('input[name="experience"]');
        const salaryInput = document.querySelector('input[name="salary"]');
        const previewCard = document.getElementById('previewCard');
        const previewName = document.getElementById('previewName');
        const previewDetails = document.getElementById('previewDetails');
        const previewSalary = document.getElementById('previewSalary');

        function updatePreview() {
            const name = nameInput.value.trim();
            const specialization = specializationInput.value.trim();
            const experience = experienceInput.value.trim();
            const salary = salaryInput.value.trim();

            if (name || specialization || experience || salary) {
                previewCard.style.display = 'block';
                
                previewName.textContent = name || 'Trainer Name';
                
                let details = [];
                if (specialization) details.push(specialization);
                if (experience) details.push(`${experience} years exp.`);
                previewDetails.textContent = details.join(' • ') || 'Specialization • Experience';
                
                if (salary) {
                    previewSalary.textContent = `₹${parseInt(salary).toLocaleString()}`;
                } else {
                    previewSalary.textContent = '₹0';
                }
            } else {
                previewCard.style.display = 'none';
            }
        }

        nameInput.addEventListener('input', updatePreview);
        specializationInput.addEventListener('input', updatePreview);
        experienceInput.addEventListener('input', updatePreview);
        salaryInput.addEventListener('input', updatePreview);

        // Format phone number as user types
        const phoneInput = document.querySelector('input[name="phone"]');
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) value = value.slice(0, 10);
            
            if (value.length > 5) {
                value = value.slice(0, 5) + ' ' + value.slice(5);
            }
            if (value.length > 10) {
                value = value.slice(0, 10) + ' ' + value.slice(10);
            }
            e.target.value = value;
        });

        // Auto-capitalize name and specialization
        [nameInput, specializationInput].forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value) {
                    this.value = this.value.split(' ')
                        .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
                        .join(' ');
                }
            });
        });

        // Format salary with commas
        salaryInput.addEventListener('blur', function() {
            if (this.value) {
                const num = parseInt(this.value);
                if (!isNaN(num)) {
                    this.value = num;
                }
            }
        });

        // Experience validation
        experienceInput.addEventListener('blur', function() {
            if (this.value) {
                let exp = parseFloat(this.value);
                if (exp < 0) exp = 0;
                if (exp > 50) exp = 50;
                this.value = exp;
            }
        });
    });
</script>

@endsection