@extends('layouts.admin')

@section('content')

<style>
    /* Custom animations and effects */
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
    
    .form-card {
        animation: slideIn 0.4s ease;
    }
    
    /* Gold gradient effects */
    .bg-gold-gradient {
        background: linear-gradient(135deg, #8B6B3E 0%, #A07D4A 50%, #B68F5C 100%);
    }
    
    .text-gold-gradient {
        background: linear-gradient(135deg, #8B6B3E, #B68F5C);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* Trainer card hover effect */
    .trainer-checkbox {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
    }
    
    .trainer-checkbox:hover {
        transform: translateX(4px);
        border-color: #8B6B3E;
        box-shadow: 0 2px 8px rgba(139, 107, 62, 0.2);
    }
    
    /* Custom checkbox styling */
    .custom-checkbox {
        width: 1.2rem;
        height: 1.2rem;
        border-radius: 4px;
        border: 2px solid #8B6B3E;
        appearance: none;
        -webkit-appearance: none;
        background-color: transparent;
        cursor: pointer;
        position: relative;
        transition: all 0.2s ease;
    }
    
    .custom-checkbox:checked {
        background-color: #8B6B3E;
        border-color: #8B6B3E;
    }
    
    .custom-checkbox:checked::after {
        content: '✓';
        position: absolute;
        color: white;
        font-size: 14px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    .custom-checkbox:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 107, 62, 0.3);
    }
    
    /* Input focus effects */
    .input-focus-effect {
        position: relative;
    }
    
    .input-focus-effect:focus-within::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, #8B6B3E, #B68F5C);
        animation: slideIn 0.3s ease;
    }
    
    /* Stats card */
    .stats-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-left: 4px solid #8B6B3E;
    }
</style>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header with Stats -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center text-gold">
                <i class="fas fa-edit mr-3 text-gold"></i>
                Edit Course
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                Update course information and trainer assignments
            </p>
        </div>
        
        <!-- Quick Stats -->
        <div class="stats-card px-4 py-2 rounded-lg">
            <div class="flex items-center gap-4">
                <div class="text-center">
                    <span class="text-xs text-gray-600 dark:text-gray-400">Total Trainers</span>
                    <p class="text-lg font-bold text-gold">{{ $trainers->count() }}</p>
                </div>
                <div class="text-center">
                    <span class="text-xs text-gray-600 dark:text-gray-400">Selected</span>
                    <p class="text-lg font-bold text-gold" id="selectedCount">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="form-card bg-white dark:bg-gray-900 shadow-2xl rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
        <!-- Card Header with Gold Gradient -->
        <div class="bg-gold-gradient px-6 py-4">
            <h3 class="text-white font-semibold flex items-center gap-2">
                <i class="fas fa-book-open"></i>
                Course Information
            </h3>
        </div>

        <!-- Form Body -->
        <div class="p-6">
            <form action="{{ route('admin.courses.update', $course->id) }}"
                  method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="input-focus-effect">
                    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-heading text-gold mr-2"></i>Course Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title"
                        value="{{ old('title', $course->title) }}"
                        class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold dark:bg-gray-800 dark:text-white transition-all"
                        placeholder="e.g., Advanced Web Development"
                        required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Category & Subcategory -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Category -->
                    <div class="input-focus-effect">
                        <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            <i class="fas fa-tag text-gold mr-2"></i>Category <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="category"
                            value="{{ old('category', $course->category) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold dark:bg-gray-800 dark:text-white transition-all"
                            placeholder="e.g., Web Development"
                            required>
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subcategory -->
                    <div class="input-focus-effect">
                        <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            <i class="fas fa-layer-group text-gold mr-2"></i>Subcategory <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="subcategory"
                            value="{{ old('subcategory', $course->subcategory) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold dark:bg-gray-800 dark:text-white transition-all"
                            placeholder="e.g., PHP & MySQL"
                            required>
                        @error('subcategory')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Duration & Fees -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Duration -->
                    <div class="input-focus-effect">
                        <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            <i class="fas fa-clock text-gold mr-2"></i>Duration <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="duration"
                            value="{{ old('duration', $course->duration) }}"
                            placeholder="e.g., 6 months"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold dark:bg-gray-800 dark:text-white transition-all"
                            required>
                        @error('duration')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fees -->
                    <div class="input-focus-effect">
                        <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            <i class="fas fa-rupee-sign text-gold mr-2"></i>Fees (₹) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="fees"
                            value="{{ old('fees', $course->fees) }}"
                            step="0.01"
                            min="0"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold dark:bg-gray-800 dark:text-white transition-all"
                            placeholder="25000"
                            required>
                        @error('fees')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Multiple Trainers Selection -->
                <div>
                    <label class="block text-sm font-medium mb-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-chalkboard-teacher text-gold mr-2"></i>
                        Assign Trainers 
                        <span class="bg-gold/20 text-gold text-xs px-2 py-1 rounded-full ml-2">Multiple Selection</span>
                    </label>
                    
                    @php
                        $selectedTrainers = old('trainer_ids', $course->trainers->pluck('id')->toArray());
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 border border-gray-200 dark:border-gray-700 rounded-xl p-4 max-h-72 overflow-y-auto bg-gray-50 dark:bg-gray-800/50">
                        @forelse($trainers as $trainer)
                        <label class="trainer-checkbox flex items-start gap-3 p-3 rounded-lg cursor-pointer bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all">
                            <input type="checkbox"
                                name="trainer_ids[]"
                                value="{{ $trainer->id }}"
                                {{ in_array($trainer->id, $selectedTrainers) ? 'checked' : '' }}
                                class="mt-1 w-4 h-4 accent-gold rounded border-gray-300 dark:border-gray-600 focus:ring-gold focus:ring-2">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-800 dark:text-gray-200 font-medium">{{ $trainer->name }}</span>
                                    @if(in_array($trainer->id, $selectedTrainers))
                                        <span class="bg-gold text-white text-xs px-2 py-0.5 rounded-full">Selected</span>
                                    @endif
                                </div>
                                @if($trainer->specialization)
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <i class="fas fa-star text-gold mr-1"></i>{{ $trainer->specialization }}
                                </p>
                                @endif
                                @if($trainer->experience)
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <i class="fas fa-briefcase text-gold mr-1"></i>{{ $trainer->experience }} years exp.
                                </p>
                                @endif
                            </div>
                        </label>
                        @empty
                        <div class="col-span-2 text-center py-8">
                            <i class="fas fa-users text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-2">No trainers available.</p>
                            <a href="{{ route('admin.trainers.create') }}" 
                               class="inline-flex items-center gap-2 bg-gold text-white px-4 py-2 rounded-lg text-sm hover:bg-gold-dark transition">
                                <i class="fas fa-plus-circle"></i>
                                Add New Trainer
                            </a>
                        </div>
                        @endforelse
                    </div>

                    <!-- Selection Summary -->
                    <div class="mt-3 flex flex-wrap items-center gap-3">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-gold"></i>
                            <span id="selectedDisplay">0 trainers selected</span>
                        </div>
                        
                        @error('trainer_ids')
                            <p class="text-red-500 text-xs flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror
                        
                        <!-- Quick Actions -->
                        <div class="flex gap-2 ml-auto">
                            <button type="button" onclick="selectAllTrainers()" 
                                    class="text-xs bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full hover:bg-gold hover:text-white transition">
                                Select All
                            </button>
                            <button type="button" onclick="deselectAllTrainers()" 
                                    class="text-xs bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                Clear All
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-toggle-on text-gold mr-2"></i>Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status"
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-gold dark:bg-gray-800 dark:text-white transition-all"
                            required>
                        <option value="">-- Select Status --</option>
                        <option value="1" {{ old('status', $course->status) == '1' ? 'selected' : '' }}>🟢 Active</option>
                        <option value="0" {{ old('status', $course->status) == '0' ? 'selected' : '' }}>🔴 Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Help Section -->
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 border border-blue-200 dark:border-blue-800">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-blue-500 text-lg mt-0.5"></i>
                        <div>
                            <h4 class="font-semibold text-blue-800 dark:text-blue-300 text-sm mb-1">Quick Tips</h4>
                            <ul class="text-xs text-blue-700 dark:text-blue-400 space-y-1">
                                <li><i class="fas fa-check mr-1"></i>Course title should be descriptive and unique</li>
                                <li><i class="fas fa-check mr-1"></i>You can assign multiple trainers to one course</li>
                                <li><i class="fas fa-check mr-1"></i>Inactive courses won't appear in student registration</li>
                                <li><i class="fas fa-check mr-1"></i>Duration format: "6 months" or "12 weeks"</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row items-center gap-3 pt-6 border-t border-gray-200 dark:border-gray-800">
                    <button type="submit"
                            class="w-full sm:flex-1 bg-gold-gradient text-white font-medium py-3.5 rounded-xl hover:shadow-lg hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i>
                        Update Course
                    </button>

                    <a href="{{ route('admin.courses.index') }}"
                       class="w-full sm:w-auto px-8 py-3.5 border-2 border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:border-gold transition-all duration-300 flex items-center justify-center gap-2">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Course Preview Card (Optional) -->
    <div class="mt-6 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gold-gradient rounded-lg flex items-center justify-center">
                    <i class="fas fa-eye text-white"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Course Preview</p>
                    <h4 class="font-semibold text-gray-800 dark:text-white" id="previewTitle">{{ $course->title }}</h4>
                </div>
            </div>
            <span class="text-sm text-gold font-semibold" id="previewFees">₹{{ number_format($course->fees, 2) }}</span>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[name="trainer_ids[]"]');
    const selectedCount = document.getElementById('selectedCount');
    const selectedDisplay = document.getElementById('selectedDisplay');
    
    function updateCount() {
        const checked = document.querySelectorAll('input[name="trainer_ids[]"]:checked').length;
        if (selectedCount) selectedCount.textContent = checked;
        if (selectedDisplay) {
            selectedDisplay.textContent = checked + ' trainer' + (checked !== 1 ? 's' : '') + ' selected';
        }
        
        // Update selected badges
        document.querySelectorAll('.trainer-checkbox').forEach((label, index) => {
            const checkbox = label.querySelector('input[type="checkbox"]');
            const badge = label.querySelector('.bg-gold');
            if (badge) {
                if (checkbox.checked) {
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }
        });
    }
    
    // Live preview updates
    const titleInput = document.querySelector('input[name="title"]');
    const feesInput = document.querySelector('input[name="fees"]');
    const previewTitle = document.getElementById('previewTitle');
    const previewFees = document.getElementById('previewFees');
    
    if (titleInput && previewTitle) {
        titleInput.addEventListener('input', function() {
            previewTitle.textContent = this.value || '{{ $course->title }}';
        });
    }
    
    if (feesInput && previewFees) {
        feesInput.addEventListener('input', function() {
            const value = this.value ? parseFloat(this.value).toFixed(2) : '{{ number_format($course->fees, 2) }}';
            previewFees.textContent = '₹' + value;
        });
    }
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateCount);
    });
    
    updateCount();
});

// Select all trainers
function selectAllTrainers() {
    document.querySelectorAll('input[name="trainer_ids[]"]').forEach(checkbox => {
        checkbox.checked = true;
    });
    // Trigger change event
    document.querySelectorAll('input[name="trainer_ids[]"]').forEach(checkbox => {
        checkbox.dispatchEvent(new Event('change'));
    });
}

// Deselect all trainers
function deselectAllTrainers() {
    document.querySelectorAll('input[name="trainer_ids[]"]').forEach(checkbox => {
        checkbox.checked = false;
    });
    // Trigger change event
    document.querySelectorAll('input[name="trainer_ids[]"]').forEach(checkbox => {
        checkbox.dispatchEvent(new Event('change'));
    });
}

// Format currency input
document.querySelector('input[name="fees"]')?.addEventListener('blur', function() {
    if (this.value) {
        this.value = parseFloat(this.value).toFixed(2);
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
</script>
@endpush

@push('styles')
<style>
/* Gold color utilities */
.bg-gold {
    background: #8B6B3E !important;
}
.bg-gold-gradient {
    background: linear-gradient(135deg, #8B6B3E 0%, #A07D4A 50%, #B68F5C 100%);
}
.text-gold {
    color: #8B6B3E !important;
}
.border-gold {
    border-color: #8B6B3E !important;
}
.accent-gold {
    accent-color: #8B6B3E !important;
}
.hover\:border-gold:hover {
    border-color: #8B6B3E !important;
}

/* Custom scrollbar */
.overflow-y-auto::-webkit-scrollbar {
    width: 6px;
}
.overflow-y-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.dark .overflow-y-auto::-webkit-scrollbar-track {
    background: #374151;
}
.overflow-y-auto::-webkit-scrollbar-thumb {
    background: #8B6B3E;
    border-radius: 10px;
}
.overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: #B68F5C;
}

/* Animations */
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

.form-card {
    animation: slideIn 0.4s ease;
}

/* Trainer checkbox */
.trainer-checkbox {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
@endpush