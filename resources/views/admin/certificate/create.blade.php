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
        appearance: none;
        -webkit-appearance: none;
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
    
    /* Certificate preview */
    .cert-preview {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border: 2px dashed var(--gold-rich);
        border-radius: 1rem;
        padding: 1rem;
        margin-bottom: 1.5rem;
        text-align: center;
        position: relative;
    }
    
    .cert-preview i {
        font-size: 3rem;
        color: var(--gold-rich);
        margin-bottom: 0.5rem;
    }
    
    .cert-preview h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--gold-rich);
        margin-bottom: 0.5rem;
    }
    
    .cert-preview p {
        color: var(--text-soft);
        font-size: 0.875rem;
    }
    
    /* Student select styling */
    select.form-input {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%238B6B3E' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.25rem;
        padding-right: 2.5rem;
    }
    
    /* Student option styling */
    select.form-input option {
        background-color: var(--card);
        color: var(--text);
        padding: 0.5rem;
    }
    
    /* Recent certificates */
    .recent-cert {
        background-color: var(--hover);
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }
    
    .recent-cert:hover {
        border-color: var(--gold-rich);
        transform: translateX(4px);
    }
    
    /* Certificate badge */
    .cert-badge {
        background: linear-gradient(135deg, #8B6B3E20, #A07D4A20);
        color: var(--gold-rich);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
</style>

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-6">
    <!-- Page Header -->
    <div class="mb-6 flex items-center ">
        <div>
            
       
      
        <div class="mt-2">
          
        </div>
    </div>

    <!-- Certificate Preview Card -->
   
    </div>

    <!-- Main Form Card -->
    <div class="form-card">
        <!-- Header -->
        <div class="form-header">
            <h2>
                <i class="fas fa-certificate"></i>
                Certificate Details
            </h2>
        </div>

        <!-- Form Body -->
        <div class="form-body">
            <form action="{{ route('admin.certificate.generate') }}" method="POST" id="certificateForm">
                @csrf

                <div class="space-y-5">
                    <!-- Student Selection -->
                    <div>
                        <label class="form-label">
                            <i class="fas fa-user-graduate"></i>
                            Select Student <span class="text-red-500">*</span>
                        </label>
                        <select name="student_id" 
                                class="form-input @error('student_id') border-red-500 @enderror" 
                                id="studentSelect"
                                required>
                            <option value="" disabled selected>-- Choose Student --</option>
                            @foreach(\App\Models\Student::with('course')->orderBy('name')->get() as $student)
                                <option value="{{ $student->id }}" 
                                        data-course="{{ $student->course->title ?? 'No Course' }}"
                                        data-date="{{ $student->created_at->format('Y-m-d') }}"
                                        {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} ({{ $student->course->title ?? 'No Course' }})
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Selected Student Info (Dynamic) -->
                    <div id="studentInfo" class="hidden p-4 rounded-lg" style="background-color: var(--hover); border: 1px solid var(--border);">
                        <h4 class="font-semibold text-sm mb-2" style="color: var(--text);">Selected Student Details</h4>
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div>
                                <p class="text-xs text-soft">Course</p>
                                <p id="selectedCourse" class="font-semibold" style="color: var(--text);">-</p>
                            </div>
                            <div>
                                <p class="text-xs text-soft">Enrollment Date</p>
                                <p id="selectedDate" class="font-semibold" style="color: var(--text);">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Options -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">
                                <i class="fas fa-calendar-alt"></i>
                                Issue Date
                            </label>
                            <input type="date" 
                                   name="issue_date" 
                                   value="{{ old('issue_date', date('Y-m-d')) }}"
                                   class="form-input">
                        </div>

                        <div>
                            <label class="form-label">
                                <i class="fas fa-hashtag"></i>
                                Certificate Number
                            </label>
                            <input type="text" 
                                   name="certificate_number" 
                                   value="{{ old('certificate_number', 'CERT-'.date('Y').'-'.rand(1000,9999)) }}"
                                   class="form-input"
                                   placeholder="Auto-generated">
                        </div>
                    </div>

                    <!-- Certificate Template Options -->
                   

                    <!-- Quick Tips -->
                    <div class="rounded-lg p-4" style="background-color: var(--hover); border: 1px solid var(--border);">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-xl" style="color: var(--gold-rich);"></i>
                            <div>
                                <h4 class="font-semibold text-sm mb-1" style="color: var(--text);">Important Notes:</h4>
                                <ul class="text-xs space-y-1" style="color: var(--text-soft);">
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Certificate will be generated in PDF format</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Student must have completed the course</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Certificate number can be customized</li>
                                    <li><i class="fas fa-check mr-1" style="color: var(--gold-rich);"></i>Digital signature will be added automatically</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-certificate"></i>
                        Generate Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Recently Generated Certificates -->
    @if(isset($recentCertificates) && $recentCertificates->count() > 0)
    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4 flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-history mr-2"></i>
            Recently Generated
        </h3>
        <div class="space-y-2">
            @foreach($recentCertificates as $cert)
            <div class="recent-cert flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gold-light flex items-center justify-center">
                        <i class="fas fa-certificate text-gold text-sm"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-sm" style="color: var(--text);">{{ $cert->student->name }}</p>
                        <p class="text-xs" style="color: var(--text-soft);">{{ $cert->certificate_number }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs" style="color: var(--text-soft);">
                        {{ $cert->created_at->format('d M Y') }}
                    </span>
                    <a href="{{ route('admin.certificate.download', $cert->id) }}" 
                       class="text-gold hover:text-gold-light">
                        <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script>
    // Student selection dynamic info
    document.addEventListener('DOMContentLoaded', function() {
        const studentSelect = document.getElementById('studentSelect');
        const studentInfo = document.getElementById('studentInfo');
        const selectedCourse = document.getElementById('selectedCourse');
        const selectedDate = document.getElementById('selectedDate');
        const submitBtn = document.getElementById('submitBtn');

        function updateStudentInfo() {
            const selected = studentSelect.options[studentSelect.selectedIndex];
            
            if (selected.value) {
                const course = selected.dataset.course || 'No Course';
                const date = selected.dataset.date || '-';
                
                selectedCourse.textContent = course;
                selectedDate.textContent = date ? new Date(date).toLocaleDateString('en-IN', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                }) : '-';
                
                studentInfo.classList.remove('hidden');
                submitBtn.disabled = false;
            } else {
                studentInfo.classList.add('hidden');
                submitBtn.disabled = true;
            }
        }

        if (studentSelect) {
            studentSelect.addEventListener('change', updateStudentInfo);
            
            // Check if there's a selected value on page load
            if (studentSelect.value) {
                updateStudentInfo();
            } else {
                submitBtn.disabled = true;
            }
        }

        // Form submission with loading state
        const form = document.getElementById('certificateForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!studentSelect.value) {
                    e.preventDefault();
                    alert('Please select a student');
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
            });
        }

        // Auto-generate certificate number preview
        const certNumberInput = document.querySelector('input[name="certificate_number"]');
        if (certNumberInput && !certNumberInput.value) {
            const year = new Date().getFullYear();
            const random = Math.floor(1000 + Math.random() * 9000);
            certNumberInput.value = `CERT-${year}-${random}`;
        }
    });
</script>

<!-- Additional Styles for Dark Mode Select -->
<style>
    /* Dark mode select options styling */
    body.dark select.form-input option {
        background-color: var(--card-dark);
        color: var(--text-dark);
    }
    
    /* Hover effect on radio labels */
    label:has(input[type="radio"]):hover {
        border-color: var(--gold-rich) !important;
    }
    
    /* Disabled button state */
    .submit-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
    }
    
    /* Certificate preview animation */
    .cert-preview {
        position: relative;
        overflow: hidden;
    }
    
    .cert-preview::before {
        content: '';
        position: absolute;
        top: -20%;
        left: -0%;
        width: 50%;
        height: 60%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(4deg);
        animation: shine 3s infinite;
    }
    
    @keyframes shine {
        0% { transform: translateX(-100%) rotate(45deg); }
        20% { transform: translateX(100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }
</style>

@endsection