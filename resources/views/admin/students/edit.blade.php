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
    .hover-bg-gold:hover {
        background-color: var(--gold-rich) !important;
        color: white !important;
    }
    .focus-ring-gold:focus {
        border-color: var(--gold-rich) !important;
        box-shadow: 0 0 0 3px var(--glow) !important;
        outline: none;
    }
    
    /* Select dropdown arrow */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%238B6B3E' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    /* Dark mode select options */
    body.dark select option {
        background-color: var(--card-dark);
        color: var(--text-dark);
    }
    
    /* Light mode select options */
    select option {
        background-color: white;
        color: #1A1A1A;
    }
    
    /* Image preview styling */
    .photo-preview {
        border: 2px solid var(--gold-dim);
        transition: all 0.3s ease;
    }
    .photo-preview:hover {
        border-color: var(--gold-rich);
        transform: scale(1.05);
        box-shadow: 0 0 15px var(--glow);
    }
    
    /* Transitions */
    input, select, textarea, button, a {
        transition: all 0.3s ease;
    }
</style>

<div class="max-w-3xl mx-auto px-4 sm:px-6">
    <!-- Page Header -->
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-user-edit mr-3" style="color: var(--gold-rich);"></i>
            Edit Student
        </h2>
        <div class="flex gap-2">
            <a href="{{ route('admin.students.show', $student->id) }}" 
               class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
               style="border-color: var(--gold-rich); color: var(--gold-rich);"
               onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
                <i class="fas fa-eye mr-2"></i> View
            </a>
            <a href="{{ route('admin.students.index') }}" 
               class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
               style="border-color: var(--border); color: var(--text-soft);"
               onmouseover="this.style.backgroundColor='var(--hover)';"
               onmouseout="this.style.backgroundColor='transparent';">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="rounded-xl shadow-2xl overflow-hidden" style="background-color: var(--card); border: 1px solid var(--border);">
        <!-- Card Header with Gold Gradient -->
        <div style="background: linear-gradient(to right, #8B6B3E, #A07D4A);" class="px-6 py-4">
            <h3 class="text-white font-playfair font-semibold text-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit Student Information
            </h3>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.students.update', $student->id) }}"
              method="POST" enctype="multipart/form-data" class="p-4 sm:p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <!-- Left Column -->
                <div class="space-y-4 sm:space-y-5">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-user mr-2" style="color: var(--gold-rich);"></i>Full Name *
                        </label>
                        <input type="text" name="name"
                               value="{{ old('name', $student->name) }}"
                               class="w-full px-4 py-3 rounded-lg"
                               style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                               onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                               onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                               placeholder="Enter student's full name">
                        @error('name') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-envelope mr-2" style="color: var(--gold-rich);"></i>Email Address *
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email', $student->email) }}"
                               class="w-full px-4 py-3 rounded-lg"
                               style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                               onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                               onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                               placeholder="student@example.com">
                        @error('email') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-phone mr-2" style="color: var(--gold-rich);"></i>Phone Number *
                        </label>
                        <input type="text" name="phone"
                               value="{{ old('phone', $student->phone) }}"
                               class="w-full px-4 py-3 rounded-lg"
                               style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                               onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                               onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                               placeholder="+91 98765 43210">
                        @error('phone') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-map-marker-alt mr-2" style="color: var(--gold-rich);"></i>Address *
                        </label>
                        <textarea name="address" rows="3"
                                  class="w-full px-4 py-3 rounded-lg"
                                  style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                  onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                  onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                                  placeholder="Enter full address">{{ old('address', $student->address) }}</textarea>
                        @error('address') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4 sm:space-y-5">
                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-tag mr-2" style="color: var(--gold-rich);"></i>Category *
                        </label>
                        <select id="categorySelect" name="category"
                                class="w-full px-4 py-3 rounded-lg appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="" style="background-color: var(--card); color: var(--text);">-- Select Category --</option>
                            @foreach($courses->pluck('category')->unique() as $category)
                                <option value="{{ $category }}" 
                                        style="background-color: var(--card); color: var(--text);"
                                        {{ old('category', $student->category)==$category?'selected':'' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Subcategory -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-layer-group mr-2" style="color: var(--gold-rich);"></i>Subcategory *
                        </label>
                        <select id="subcategorySelect" name="subcategory"
                                class="w-full px-4 py-3 rounded-lg appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="" style="background-color: var(--card); color: var(--text);">-- Select Subcategory --</option>
                        </select>
                        @error('subcategory') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Trainer -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-chalkboard-teacher mr-2" style="color: var(--gold-rich);"></i>Assign Trainer
                        </label>
                        <select name="trainer_id"
                                class="w-full px-4 py-3 rounded-lg appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="" style="background-color: var(--card); color: var(--text);">-- Select Trainer --</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}" 
                                        style="background-color: var(--card); color: var(--text);"
                                        {{ old('trainer_id', $student->trainer_id)==$trainer->id?'selected':'' }}>
                                    {{ $trainer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('trainer_id') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Joining Date -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-calendar-alt mr-2" style="color: var(--gold-rich);"></i>Joining Date *
                        </label>
                        <input type="date" name="joining_date"
                               value="{{ old('joining_date', $student->joining_date) }}"
                               class="w-full px-4 py-3 rounded-lg"
                               style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                               onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                               onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                        @error('joining_date') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-circle mr-2" style="color: var(--gold-rich);"></i>Status *
                        </label>
                        <select name="status"
                                class="w-full px-4 py-3 rounded-lg appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="Active" style="background-color: var(--card); color: var(--text);"
                                    {{ old('status', $student->status)=='Active'?'selected':'' }}>
                                🟢 Active
                            </option>
                            <option value="Completed" style="background-color: var(--card); color: var(--text);"
                                    {{ old('status', $student->status)=='Completed'?'selected':'' }}>
                                ✅ Completed
                            </option>
                            <option value="Dropped" style="background-color: var(--card); color: var(--text);"
                                    {{ old('status', $student->status)=='Dropped'?'selected':'' }}>
                                🔴 Dropped
                            </option>
                        </select>
                        @error('status') 
                            <p class="text-red-500 text-xs mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
<!-- Course -->
<div>
<label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
<i class="fas fa-book mr-2" style="color: var(--gold-rich);"></i>Select Course *
</label>

<select name="course_id"
class="w-full px-4 py-3 rounded-lg transition-all duration-300 appearance-none cursor-pointer"
style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);">

<option value="">-- Select Course --</option>

@foreach($courses as $course)
<option value="{{ $course->id }}">
{{ $course->title }} (₹{{ $course->fees }})
</option>
@endforeach

</select>
</div>
            <!-- Photo Section -->
            <div class="mt-6 p-4 rounded-lg" style="background-color: var(--hover); border: 1px solid var(--border);">
                <label class="block text-sm font-semibold mb-3" style="color: var(--text-soft);">
                    <i class="fas fa-camera mr-2" style="color: var(--gold-rich);"></i>Student Photo
                </label>
                <div class="flex flex-col sm:flex-row items-center gap-6">
                    @if($student->photo)
                        <div class="relative group">
                            <img src="{{ asset('storage/'.$student->photo) }}" 
                                 class="w-24 h-24 rounded-full object-cover photo-preview"
                                 alt="Student Photo">
                            <div class="absolute inset-0 rounded-full bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-xs">Current Photo</span>
                            </div>
                        </div>
                    @else
                        <div class="w-24 h-24 rounded-full bg-gray-700 flex items-center justify-center photo-preview">
                            <i class="fas fa-user text-3xl" style="color: var(--text-soft);"></i>
                        </div>
                    @endif
                    <div class="flex-1">
                        <input type="file" name="photo" 
                               class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold"
                               style="color: var(--text);"
                               onchange="previewImage(this)">
                        <p class="text-xs mt-2" style="color: var(--text-soft);">
                            <i class="fas fa-info-circle mr-1" style="color: var(--gold-rich);"></i>
                            Allowed: JPG, PNG, GIF. Max size: 2MB
                        </p>
                    </div>
                </div>
                <!-- Image preview container -->
                <div id="imagePreview" class="mt-3 hidden">
                    <img src="" alt="Preview" class="w-16 h-16 rounded-full object-cover border-2" style="border-color: var(--gold-rich);">
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-end gap-3 sm:gap-4 mt-8 pt-6" style="border-top: 1px solid var(--border);">
                <button type="reset" 
                        class="w-full sm:w-auto px-6 py-3 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold"
                        style="border-color: var(--border); color: var(--text-soft);"
                        onmouseover="this.style.backgroundColor='var(--hover)';"
                        onmouseout="this.style.backgroundColor='transparent';">
                    <i class="fas fa-undo mr-2"></i> Reset
                </button>
                <button type="submit" 
                        class="w-full sm:w-auto px-8 py-3 text-white rounded-lg transition-all duration-300 text-sm font-semibold"
                        style="background-color: var(--gold-rich);"
                        onmouseover="this.style.backgroundColor='#A07D4A'; this.style.boxShadow='0 4px 15px var(--glow)';"
                        onmouseout="this.style.backgroundColor='var(--gold-rich)'; this.style.boxShadow='none';">
                    <i class="fas fa-save mr-2"></i> Update Student
                </button>
            </div>
        </form>
    </div>

    <!-- Additional Info Card -->
    <div class="mt-6 rounded-lg p-4" style="background-color: var(--card); border: 1px solid var(--border);">
        <div class="flex items-start gap-3">
            <i class="fas fa-info-circle text-xl mt-0.5" style="color: var(--gold-rich);"></i>
            <div>
                <h4 class="font-semibold mb-1" style="color: var(--text);">Important Notes:</h4>
                <ul class="text-sm space-y-1" style="color: var(--text-soft);">
                    <li><i class="fas fa-asterisk text-xs mr-2" style="color: var(--gold-rich);"></i>Fields marked with * are required</li>
                    <li><i class="fas fa-asterisk text-xs mr-2" style="color: var(--gold-rich);"></i>Email address must be unique in the system</li>
                    <li><i class="fas fa-asterisk text-xs mr-2" style="color: var(--gold-rich);"></i>Select category first to load subcategories</li>
                    <li><i class="fas fa-asterisk text-xs mr-2" style="color: var(--gold-rich);"></i>Upload new photo only if you want to change existing one</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    const courses = @json($courses);
    const categorySelect = document.getElementById('categorySelect');
    const subcategorySelect = document.getElementById('subcategorySelect');

    function populateSubcategories() {
        const cat = categorySelect.value;
        subcategorySelect.innerHTML = '<option value="" style="background-color: var(--card); color: var(--text);">-- Select Subcategory --</option>';

        if (!cat) return;

        const subs = courses.filter(c => c.category === cat)
                            .map(c => c.subcategory)
                            .filter((v,i,a)=>a.indexOf(v)===i);

        subs.forEach(s => {
            const opt = document.createElement('option');
            opt.value = s;
            opt.textContent = s;
            opt.style.backgroundColor = 'var(--card)';
            opt.style.color = 'var(--text)';
            subcategorySelect.appendChild(opt);
        });

        @if(old('subcategory', $student->subcategory))
            subcategorySelect.value = "{{ old('subcategory', $student->subcategory) }}";
        @endif
    }

    categorySelect.addEventListener('change', populateSubcategories);
    if(categorySelect.value) populateSubcategories();

    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" class="w-16 h-16 rounded-full object-cover border-2" style="border-color: var(--gold-rich);">';
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }
</script>

@endsection