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
    }
    
    /* Checkbox container */
    .checkbox-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        padding: 1rem;
        max-height: 200px;
        overflow-y: auto;
        background-color: var(--card);
    }
    
    /* Custom checkbox styling */
    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem;
        border-radius: 0.375rem;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    
    .checkbox-item:hover {
        background-color: var(--hover);
    }
    
    .checkbox-item input[type="checkbox"] {
        width: 1rem;
        height: 1rem;
        accent-color: var(--gold-rich);
        cursor: pointer;
    }
    
    .checkbox-item span {
        font-size: 0.875rem;
        color: var(--text);
    }
    
    /* Scrollbar styling for checkbox container */
    .checkbox-container::-webkit-scrollbar {
        width: 4px;
    }
    
    .checkbox-container::-webkit-scrollbar-track {
        background: var(--border);
    }
    
    .checkbox-container::-webkit-scrollbar-thumb {
        background: var(--gold-rich);
        border-radius: 4px;
    }
    
    .checkbox-container::-webkit-scrollbar-thumb:hover {
        background: var(--gold-glow);
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
    }
    
    .form-header {
        background: linear-gradient(to right, #8B6B3E, #A07D4A);
        padding: 1.25rem 1.5rem;
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
</style>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header -->
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-plus-circle mr-3" style="color: var(--gold-rich);"></i>
            Add New Course
        </h2>
        <a href="{{ route('admin.courses.index') }}" 
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
                <i class="fas fa-book-open"></i>
                Course Information
            </h2>
        </div>

        <!-- Form Body -->
        <div class="form-body">
            <form action="{{ route('admin.courses.store') }}" method="POST">
                @csrf

                <div class="space-y-5">
                    <!-- Title -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-heading"></i>Course Title <span class="required-star">*</span>
                        </label>
                        <input type="text" 
                               name="title" 
                               value="{{ old('title') }}"
                               class="form-input" 
                               placeholder="e.g., Advanced Hair Development"
                               required>
                        @error('title')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Category & Subcategory -->
                    <div class="form-grid-2">
                        <div>
                            <label class="form-label">
                                <i class="fas fa-tag"></i>Category <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="category" 
                                   value="{{ old('category') }}"
                                   class="form-input" 
                                   placeholder="e.g., Hair Development"
                                   required>
                            @error('category')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">
                                <i class="fas fa-layer-group"></i>Subcategory <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="subcategory" 
                                   value="{{ old('subcategory') }}"
                                   class="form-input" 
                                   placeholder="e.g., Nails and hairs"
                                   required>
                            @error('subcategory')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Duration & Fees -->
                    <div class="form-grid-2">
                        <div>
                            <label class="form-label">
                                <i class="fas fa-clock"></i>Duration (Months) <span class="required-star">*</span>
                            </label>
                            <input type="text" 
                                   name="duration" 
                                   value="{{ old('duration') }}"
                                   class="form-input" 
                                   placeholder="e.g., 6"
                                   required>
                            @error('duration')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">
                                <i class="fas fa-rupee-sign"></i>Fees (₹) <span class="required-star">*</span>
                            </label>
                            <input type="number" 
                                   name="fees" 
                                   value="{{ old('fees') }}"
                                   class="form-input" 
                                   placeholder="e.g., 25000"
                                   min="0"
                                   step="0.01"
                                   required>
                            @error('fees')
                                <p class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Trainers Checkbox -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-chalkboard-teacher"></i>Assign Trainers
                        </label>
                        <div class="checkbox-container">
                            @forelse($trainers as $trainer)
                                <label class="checkbox-item">
                                   <input type="checkbox"
       name="trainer_ids[]" 
       value="{{ $trainer->id }}"
       {{ in_array($trainer->id, old('trainer_ids', [])) ? 'checked' : '' }}>
                                    <span>
                                        {{ $trainer->name }}
                                        @if($trainer->specialization)
                                            <span class="text-xs" style="color: var(--text-soft);">
                                                ({{ $trainer->specialization }})
                                            </span>
                                        @endif
                                    </span>
                                </label>
                            @empty
                                <p class="text-sm col-span-2 text-center py-4" style="color: var(--text-soft);">
                                    No trainers available. 
                                    <a href="{{ route('admin.trainers.create') }}" class="text-gold hover:underline">
                                        Add trainers first
                                    </a>
                                </p>
                            @endforelse
                        </div>
                        @error('trainer_id')
                            <p class="error-message">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror
                        <p class="text-xs mt-2" style="color: var(--text-soft);">
                            <i class="fas fa-info-circle mr-1" style="color: var(--gold-rich);"></i>
                            Select multiple trainers if needed
                        </p>
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

                    <!-- Additional Info -->
                    <div class="rounded-lg p-4" style="background-color: var(--hover); border: 1px solid var(--border);">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-xl" style="color: var(--gold-rich);"></i>
                            <div>
                                <h4 class="font-semibold text-sm mb-1" style="color: var(--text);">Quick Tips:</h4>
                                <ul class="text-xs space-y-1" style="color: var(--text-soft);">
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Choose a clear, descriptive title</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Category and subcategory help in organization</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>You can assign multiple trainers to one course</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Inactive courses won't appear in student registration</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>
                            Save Course
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Courses Preview (Optional) -->
    @if(isset($recentCourses) && $recentCourses->count() > 0)
    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4 flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-history mr-2"></i>
            Recently Added Courses
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($recentCourses as $recent)
            <div class="rounded-lg p-4" style="background-color: var(--card); border: 1px solid var(--border);">
                <h4 class="font-semibold text-sm mb-2" style="color: var(--text);">{{ $recent->title }}</h4>
                <div class="flex flex-wrap gap-2 mb-2">
                    <span class="text-xs px-2 py-1 rounded-full bg-gold-light" style="color: var(--gold-rich);">
                        {{ $recent->category }}
                    </span>
                    <span class="text-xs px-2 py-1 rounded-full" style="background-color: var(--hover); color: var(--text-soft);">
                        {{ $recent->duration }} months
                    </span>
                </div>
                <p class="text-sm font-semibold" style="color: var(--gold-rich);">₹ {{ number_format($recent->fees, 2) }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    // Auto-format fees input
    document.querySelector('input[name="fees"]')?.addEventListener('blur', function(e) {
        if (this.value) {
            // Remove non-numeric characters
            let value = this.value.replace(/[^0-9.]/g, '');
            if (value) {
                this.value = parseFloat(value).toFixed(2);
            }
        }
    });

    // Capitalize first letter of category and subcategory
    document.querySelectorAll('input[name="category"], input[name="subcategory"]').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value) {
                this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
            }
        });
    });

    // Preview duration format
    document.querySelector('input[name="duration"]')?.addEventListener('blur', function() {
        if (this.value && !isNaN(this.value)) {
            this.value = this.value + ' months';
        }
    });
</script>

@endsection