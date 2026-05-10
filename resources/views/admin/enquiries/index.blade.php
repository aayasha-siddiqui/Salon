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
    
    /* Table styling */
    .data-table thead tr {
        background: linear-gradient(to right, #8B6B3E, #A07D4A) !important;
    }
    
    .data-table thead th {
        color: white !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 1rem 1rem;
    }
    
    .data-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .data-table tbody tr:hover {
        background-color: var(--hover) !important;
    }
    
    /* Search input */
    .search-input {
        background-color: var(--card);
        border: 1px solid var(--border);
        color: var(--text);
        padding: 0.5rem 1rem 0.5rem 2.5rem;
        border-radius: 8px;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        border-color: var(--gold-rich);
        box-shadow: 0 0 0 3px var(--glow);
        outline: none;
    }
    
    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-soft);
    }
    
    /* WhatsApp button */
    .whatsapp-btn {
        background: #25D366;
        color: white;
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .whatsapp-btn:hover {
        background: #128C7E;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
    }
    
    /* Delete button */
    .delete-btn {
        background: #4B5563;
        color: white;
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .delete-btn:hover {
        background: #DC2626;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }
    
    /* Message cell */
    .message-cell {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
        position: relative;
    }
    
    .message-cell:hover {
        white-space: normal;
        overflow: visible;
        background-color: var(--card);
        position: absolute;
        max-width: 300px;
        z-index: 10;
        padding: 0.5rem;
        border-radius: 4px;
        box-shadow: 0 2px 8px var(--glow);
        border: 1px solid var(--gold-rich);
    }
    
    /* Success message */
    .success-message {
        background: linear-gradient(to right, #8B6B3E, #A07D4A);
        color: white;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        box-shadow: 0 4px 15px var(--glow);
        animation: slideDown 0.3s ease;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Stats cards */
    .stats-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-left: 4px solid #8B6B3E;
        border-radius: 8px;
        padding: 1rem;
    }
    
    /* Mobile card */
    .mobile-card {
        background-color: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        transition: all 0.3s ease;
    }
    
    .mobile-card:hover {
        border-color: var(--gold-rich);
        box-shadow: 0 4px 15px var(--glow);
        transform: translateY(-2px);
    }
    
    /* Course badge */
    .course-badge {
        background: linear-gradient(135deg, #8B6B3E20, #A07D4A20);
        color: var(--gold-rich);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Action buttons container */
    .action-btns {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <!-- Page Header with Stats -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-envelope mr-3" style="color: var(--gold-rich);"></i>
                Academy Enquiries
            </h2>
            <p class="text-sm text-soft mt-1">Manage and respond to student enquiries</p>
        </div>

        <!-- Quick Stats -->
        <div class="flex gap-3">
            <div class="stats-card">
                <div class="text-center">
                    <span class="text-xs text-soft">Total Enquiries</span>
                    <p class="text-xl font-bold text-gold">{{ $enquiries->count() }}</p>
                </div>
            </div>
            <div class="stats-card">
                <div class="text-center">
                    <span class="text-xs text-soft">With Course</span>
                    <p class="text-xl font-bold text-green-600">{{ $enquiries->whereNotNull('course_id')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="max-w-md mx-auto mb-4 success-message">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-white"></i>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
                <i class="fas fa-star text-white animate-pulse"></i>
            </div>
        </div>
    @endif

    <!-- Search Bar -->
    <div class="flex justify-end mb-4">
        <div class="relative w-full sm:w-80">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="tableSearch" placeholder="Search by name, phone, course, message..."
                   class="search-input pl-10">
        </div>
    </div>

    <!-- DESKTOP TABLE VIEW -->
    <div class="hidden md:block rounded-xl overflow-hidden shadow-lg" style="background-color: var(--card); border: 1px solid var(--border);">
        <table id="enquiryTable" class="data-table min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Student</th>
                    <th class="px-4 py-3">Contact</th>
                    <th class="px-4 py-3">Course Details</th>
                    <th class="px-4 py-3">Trainer</th>
                    <th class="px-4 py-3">Message</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y" style="border-color: var(--border);">
                @foreach($enquiries as $enquiry)
                <tr class="hover:bg-hover transition">
                    <td class="px-4 py-3 font-mono text-xs" style="color: var(--text-soft);">#{{ str_pad($enquiry->id, 4, '0', STR_PAD_LEFT) }}</td>
                    
                    <td class="px-4 py-3">
                        <div class="font-semibold" style="color: var(--text);">{{ $enquiry->name }}</div>
                    </td>
                    
                    <td class="px-4 py-3">
                        <div style="color: var(--text);">{{ $enquiry->phone }}</div>
                        <div class="text-xs" style="color: var(--text-soft);">
                            <i class="fas fa-envelope mr-1"></i>{{ $enquiry->email ?? 'No email' }}
                        </div>
                    </td>
                    
                    <td class="px-4 py-3">
                        @if($enquiry->course)
                            <div class="font-semibold" style="color: var(--gold-rich);">{{ $enquiry->course->title }}</div>
                            <div class="flex gap-2 mt-1">
                                <span class="course-badge">
                                    <i class="fas fa-tag mr-1"></i>₹{{ number_format($enquiry->course->fees, 0) }}
                                </span>
                                <span class="course-badge">
                                    <i class="fas fa-clock mr-1"></i>{{ $enquiry->course->duration }}
                                </span>
                            </div>
                        @else
                            <span class="text-soft">-</span>
                        @endif
                    </td>
                    
                    <td class="px-4 py-3">
                        @if($enquiry->trainer)
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gold-light flex items-center justify-center">
                                    <i class="fas fa-user-tie text-gold text-xs"></i>
                                </div>
                                <span style="color: var(--text);">{{ $enquiry->trainer->name }}</span>
                            </div>
                        @else
                            <span class="text-soft">Not Assigned</span>
                        @endif
                    </td>
                    
                    <td class="px-4 py-3 message-cell" style="color: var(--text-soft);" title="{{ $enquiry->message }}">
                        {{ Str::limit($enquiry->message, 30) }}
                    </td>
                    
                    <td class="px-4 py-3">
                        <div class="action-btns justify-center">
                            <!-- WhatsApp -->
                            <a target="_blank"
                               href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $enquiry->phone) }}?text={{ urlencode(
                                'Hello '.$enquiry->name.
                                ($enquiry->course ? ' regarding '.$enquiry->course->title.' course' : '').
                                ($enquiry->course ? '. Fees ₹'.$enquiry->course->fees : '').
                                ($enquiry->course ? ' Duration '.$enquiry->course->duration : '')
                               ) }}"
                               class="whatsapp-btn"
                               title="Send WhatsApp Message">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <!-- Email -->
                            @if($enquiry->email)
                            <a href="mailto:{{ $enquiry->email }}?subject=Enquiry about {{ $enquiry->course->title ?? 'Course' }}"
                               class="delete-btn"
                               style="background: #3B82F6;"
                               title="Send Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif

                            <!-- Delete Form -->
                            <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this enquiry?')"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="delete-btn"
                                        title="Delete Enquiry">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Table Info -->
        <div class="flex justify-between items-center p-4 border-t" style="border-color: var(--border); background-color: var(--card);">
            <div id="tableInfo" class="text-sm" style="color: var(--text-soft);"></div>
            <div class="text-sm" style="color: var(--text-soft);">
                <i class="fas fa-info-circle mr-1" style="color: var(--gold-rich);"></i>
                {{ $enquiries->count() }} total enquiries
            </div>
        </div>
    </div>

    <!-- MOBILE CARD VIEW -->
    <div class="md:hidden space-y-4" id="mobileEnquiryContainer">
        @forelse($enquiries as $enquiry)
        <div class="mobile-card mobile-enquiry" 
             data-search="{{ strtolower($enquiry->name.' '.$enquiry->phone.' '.($enquiry->course->title ?? '').' '.$enquiry->message) }}">
            
            <!-- Header -->
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-lg" style="color: var(--text);">{{ $enquiry->name }}</h3>
                    <p class="text-xs" style="color: var(--text-soft);">ID: #{{ str_pad($enquiry->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $enquiry->phone) }}" 
                       target="_blank"
                       class="whatsapp-btn w-8 h-8">
                        <i class="fab fa-whatsapp text-sm"></i>
                    </a>
                    @if($enquiry->email)
                    <a href="mailto:{{ $enquiry->email }}" 
                       class="delete-btn w-8 h-8"
                       style="background: #3B82F6;">
                        <i class="fas fa-envelope text-sm"></i>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Contact Info -->
            <div class="bg-gold-light rounded-lg p-3 mb-3">
                <div class="flex items-center gap-2 mb-1">
                    <i class="fas fa-phone text-gold text-xs"></i>
                    <span class="text-sm" style="color: var(--text);">{{ $enquiry->phone }}</span>
                </div>
                @if($enquiry->email)
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope text-gold text-xs"></i>
                    <span class="text-sm" style="color: var(--text);">{{ $enquiry->email }}</span>
                </div>
                @endif
            </div>

            <!-- Course Details -->
            @if($enquiry->course)
            <div class="mb-3">
                <p class="text-xs text-soft mb-1">Interested in:</p>
                <div class="font-semibold" style="color: var(--gold-rich);">{{ $enquiry->course->title }}</div>
                <div class="flex gap-2 mt-1">
                    <span class="course-badge">
                        <i class="fas fa-tag mr-1"></i>₹{{ number_format($enquiry->course->fees, 0) }}
                    </span>
                    <span class="course-badge">
                        <i class="fas fa-clock mr-1"></i>{{ $enquiry->course->duration }}
                    </span>
                </div>
            </div>
            @endif

            <!-- Trainer -->
            @if($enquiry->trainer)
            <div class="mb-3">
                <p class="text-xs text-soft mb-1">Assigned Trainer:</p>
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-full bg-gold-light flex items-center justify-center">
                        <i class="fas fa-user-tie text-gold text-xs"></i>
                    </div>
                    <span style="color: var(--text);">{{ $enquiry->trainer->name }}</span>
                </div>
            </div>
            @endif

            <!-- Message -->
            <div class="mb-3">
                <p class="text-xs text-soft mb-1">Message:</p>
                <div class="p-3 rounded-lg" style="background-color: var(--hover); color: var(--text);">
                    "{{ $enquiry->message }}"
                </div>
            </div>

            <!-- Delete Action -->
            <div class="flex justify-end pt-2 border-t" style="border-color: var(--border);">
                <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this enquiry?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="delete-btn w-8 h-8">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="text-center py-8">
            <i class="fas fa-inbox text-4xl mb-3" style="color: var(--text-soft);"></i>
            <p class="text-lg font-semibold" style="color: var(--text);">No enquiries found</p>
            <p class="text-sm" style="color: var(--text-soft);">Enquiries will appear here when students contact</p>
        </div>
        @endforelse

        <!-- No Results Message -->
        <div id="mobileNoMatch" class="text-center py-8 hidden">
            <i class="fas fa-search text-4xl mb-3" style="color: var(--text-soft);"></i>
            <p class="text-lg font-semibold" style="color: var(--text);">No matching enquiries</p>
            <p class="text-sm" style="color: var(--text-soft);">Try adjusting your search</p>
        </div>
    </div>
</div>

<!-- Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('tableSearch');
    const tableRows = document.querySelectorAll('#enquiryTable tbody tr');
    const mobileCards = document.querySelectorAll('.mobile-enquiry');
    const tableInfo = document.getElementById('tableInfo');
    const mobileNoMatch = document.getElementById('mobileNoMatch');

    function updateTableInfo(visibleCount) {
        if (tableInfo) {
            tableInfo.textContent = `Showing ${visibleCount} of ${tableRows.length} enquiries`;
        }
    }

    function filterEnquiries() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let desktopVisible = 0;
        let mobileVisible = 0;

        // Filter desktop table
        tableRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matches = text.includes(searchTerm);
            row.style.display = matches ? '' : 'none';
            if (matches) desktopVisible++;
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const searchData = card.dataset.search || card.innerText.toLowerCase();
            const matches = searchData.includes(searchTerm);
            card.style.display = matches ? 'block' : 'none';
            if (matches) mobileVisible++;
        });

        // Update info
        updateTableInfo(desktopVisible);

        // Show/hide no results on mobile
        if (mobileVisible === 0 && mobileCards.length > 0) {
            mobileNoMatch.classList.remove('hidden');
        } else {
            mobileNoMatch.classList.add('hidden');
        }
    }

    searchInput.addEventListener('keyup', filterEnquiries);

    // Initial count
    updateTableInfo(tableRows.length);
});
</script>

<!-- Add DataTables for better sorting (optional) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    if ($('#enquiryTable').length && !$.fn.DataTable.isDataTable('#enquiryTable')) {
        var table = $('#enquiryTable').DataTable({
            paging: true,
            ordering: true,
            info: false,
            lengthChange: false,
            searching: false, // We have custom search
            pageLength: 10,
            dom: 't'
        });

        // Update on custom search
        $('#tableSearch').on('keyup', function() {
            table.search(this.value).draw();
            
            // Update visible count
            var info = table.page.info();
            $('#tableInfo').text('Showing ' + info.recordsDisplay + ' enquiries');
        });
    }
});
</script>

@endsection