@extends('layouts.admin')

@section('content')

<style>
    /* Make sure all theme variables work */
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
    .bg-hover {
        background-color: var(--hover);
    }
    .shadow-glow {
        box-shadow: 0 0 15px var(--glow);
    }
    .text-gold {
        color: var(--gold-rich);
    }
    .border-gold {
        border-color: var(--gold-rich);
    }
    .bg-gold {
        background-color: var(--gold-rich);
    }
    .from-gold-deep {
        --tw-gradient-from: #8B6B3E;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(139, 107, 62, 0));
    }
    .to-gold-rich {
        --tw-gradient-to: #A07D4A;
    }
    
    /* Fix for dark mode */
    body.dark .bg-card {
        background-color: var(--card-dark);
    }
    body.dark .border-border {
        border-color: var(--border-dark);
    }
    body.dark .text-soft {
        color: var(--text-soft-dark);
    }
    body.dark .text-text {
        color: var(--text-dark);
    }
    
    /* Select dropdown styling */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%238B6B3E' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    /* Dark mode select */
    body.dark select {
        background-color: var(--card-dark);
        color: var(--text-dark);
        border-color: var(--border-dark);
    }
    
    body.dark select option {
        background-color: var(--card-dark);
        color: var(--text-dark);
    }
    
    /* Light mode select */
    select option {
        background-color: white;
        color: #1A1A1A;
    }
    
    /* Input styling */
    input, select, textarea, button {
        transition: all 0.3s ease;
    }
    
    input:focus, select:focus, textarea:focus {
        box-shadow: 0 0 0 3px var(--glow);
        border-color: var(--gold-rich) !important;
        outline: none;
    }
    
    /* Fix for gradient header - always show gold */
    .bg-gradient-to-r.from-gold-deep.to-gold-rich {
        background: linear-gradient(to right, #8B6B3E, #A07D4A) !important;
    }
    
    /* Button hover effects */
    .hover\:bg-gold:hover {
        background-color: var(--gold-rich) !important;
        color: white !important;
    }
    
    .hover\:bg-gold-rich:hover {
        background-color: #A07D4A !important;
    }
    
    .hover\:shadow-glow:hover {
        box-shadow: 0 4px 15px var(--glow) !important;
    }
    
    .hover\:bg-hover:hover {
        background-color: var(--hover) !important;
    }
    
    /* Border colors */
    .border-gold {
        border-color: var(--gold-rich) !important;
    }
    
    /* Text colors */
    .text-gold {
        color: var(--gold-rich) !important;
    }
</style>

<div class="max-w-3xl mx-auto px-4 sm:px-6">
    <!-- Page Header -->
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-user-plus mr-3" style="color: var(--gold-rich);"></i>
            Add New Student
        </h2>
        <a href="{{ route('admin.students.index') }}" 
           class="px-4 py-2 bg-transparent border rounded-lg transition-all duration-300 text-sm font-semibold inline-flex items-center"
           style="border-color: var(--gold-rich); color: var(--gold-rich);"
           onmouseover="this.style.backgroundColor='var(--gold-rich)'; this.style.color='white';"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--gold-rich)';">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="rounded-xl shadow-lg overflow-hidden" style="background-color: var(--card); border: 1px solid var(--border);">
        <!-- Card Header with Gold Accent - Always visible -->
        <div style="background: linear-gradient(to right, #8B6B3E, #A07D4A);" class="px-6 py-4">
            <h3 class="text-white font-playfair font-semibold text-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Student Information
            </h3>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <!-- Left Column -->
                <div class="space-y-4 sm:space-y-5">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
                            <i class="fas fa-user mr-2" style="color: var(--gold-rich);"></i>Full Name *
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                               class="w-full px-4 py-3 rounded-lg transition-all duration-300"
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
                        <input type="email" name="email" value="{{ old('email') }}" 
                               class="w-full px-4 py-3 rounded-lg transition-all duration-300"
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
<!-- Photo Upload -->
<div>
<label class="block text-sm font-semibold mb-2" style="color: var(--text-soft);">
<i class="fas fa-camera mr-2" style="color: var(--gold-rich);"></i>Student Photo
</label>

<input type="file" name="photo" accept="image/*"
class="w-full px-4 py-3 rounded-lg transition-all duration-300"
style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
onfocus="this.style.borderColor='var(--gold-rich)'"
onblur="this.style.borderColor='var(--border)'">

@error('photo') 
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
                        <input type="text" name="phone" value="{{ old('phone') }}" 
                               class="w-full px-4 py-3 rounded-lg transition-all duration-300"
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
                                  class="w-full px-4 py-3 rounded-lg transition-all duration-300"
                                  style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                  onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                  onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';"
                                  placeholder="Enter full address">{{ old('address') }}</textarea>
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
                                class="w-full px-4 py-3 rounded-lg transition-all duration-300 appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="" style="background-color: var(--card); color: var(--text);">-- Select Category --</option>
                            @foreach($courses->pluck('category')->unique() as $category)
                                <option value="{{ $category }}" style="background-color: var(--card); color: var(--text);" {{ old('category')==$category?'selected':'' }}>{{ $category }}</option>
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
                                class="w-full px-4 py-3 rounded-lg transition-all duration-300 appearance-none cursor-pointer"
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
                                class="w-full px-4 py-3 rounded-lg transition-all duration-300 appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="" style="background-color: var(--card); color: var(--text);">-- Select Trainer --</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}" style="background-color: var(--card); color: var(--text);" {{ old('trainer_id')==$trainer->id?'selected':'' }}>{{ $trainer->name }}</option>
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
                        <input type="date" name="joining_date" value="{{ old('joining_date') }}" 
                               class="w-full px-4 py-3 rounded-lg transition-all duration-300"
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
                                class="w-full px-4 py-3 rounded-lg transition-all duration-300 appearance-none cursor-pointer"
                                style="background-color: var(--card); border: 1px solid var(--border); color: var(--text);"
                                onfocus="this.style.borderColor='var(--gold-rich)'; this.style.boxShadow='0 0 0 3px var(--glow)';"
                                onblur="this.style.borderColor='var(--border)'; this.style.boxShadow='none';">
                            <option value="" style="background-color: var(--card); color: var(--text);">-- Select Status --</option>
                            <option value="Active" style="background-color: var(--card); color: var(--text);" {{ old('status')=='Active'?'selected':'' }}>🟢 Active</option>
                            <option value="Completed" style="background-color: var(--card); color: var(--text);" {{ old('status')=='Completed'?'selected':'' }}>✅ Completed</option>
                            <option value="Dropped" style="background-color: var(--card); color: var(--text);" {{ old('status')=='Dropped'?'selected':'' }}>🔴 Dropped</option>
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
                    <i class="fas fa-save mr-2"></i> Save Student
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
        subcategorySelect.innerHTML = '<option value="">-- Select Subcategory --</option>';

        if (!cat) return;

        // Get unique subcategories for selected category
        const subs = courses
            .filter(c => c.category === cat)
            .map(c => c.subcategory)
            .filter((value, index, self) => self.indexOf(value) === index)
            .sort();

        subs.forEach(s => {
            const opt = document.createElement('option');
            opt.value = s;
            opt.textContent = s;
            opt.style.backgroundColor = 'var(--card)';
            opt.style.color = 'var(--text)';
            subcategorySelect.appendChild(opt);
        });

        // Set old value if exists
        @if(old('subcategory'))
            subcategorySelect.value = "{{ old('subcategory') }}";
        @endif
    }

    categorySelect.addEventListener('change', populateSubcategories);

    if(categorySelect.value) {
        populateSubcategories();
    }
</script>

@endsection