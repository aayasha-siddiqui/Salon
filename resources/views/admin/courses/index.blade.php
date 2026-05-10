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
    
    /* Status badges */
    .status-active {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .status-inactive {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Action buttons */
    .action-btn {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.3s ease;
        color: white;
    }
    
    .action-btn.edit {
        background: linear-gradient(to right, #8B6B3E, #A07D4A);
    }
    
    .action-btn.edit:hover {
        background: linear-gradient(to right, #745A31, #8B6B3E);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--glow);
    }
    
    .action-btn.delete {
        background: #4B5563;
    }
    
    .action-btn.delete:hover {
        background: #DC2626;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
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
    
    /* Pagination buttons */
    .pagination-btn {
        padding: 0.5rem 1rem;
        background-color: var(--card);
        border: 1px solid var(--border);
        color: var(--text-soft);
        border-radius: 6px;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .pagination-btn:hover:not(:disabled) {
        background-color: var(--gold-rich);
        color: white;
        border-color: var(--gold-rich);
    }
    
    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .pagination-btn.active {
        background-color: var(--gold-rich);
        color: white;
        border-color: var(--gold-rich);
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
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
            <i class="fas fa-book mr-3" style="color: var(--gold-rich);"></i>
            Course Management
        </h2>

        <a href="{{ route('admin.courses.create') }}"
           class="px-6 py-2.5 text-white rounded-lg transition-all duration-300 flex items-center gap-2 text-sm font-semibold"
           style="background: linear-gradient(to right, #8B6B3E, #A07D4A);"
           onmouseover="this.style.background='linear-gradient(to right, #745A31, #8B6B3E)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 15px var(--glow)';"
           onmouseout="this.style.background='linear-gradient(to right, #8B6B3E, #A07D4A)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
            <i class="fas fa-plus-circle"></i>
            Add New Course
        </a>
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
            <input type="text" id="tableSearch" placeholder="Search courses by title, category, trainer..."
                   class="search-input pl-10">
        </div>
    </div>

    <!-- DESKTOP TABLE VIEW -->
    <div class="hidden md:block rounded-xl overflow-hidden shadow-lg" style="background-color: var(--card); border: 1px solid var(--border);">
        <table id="courseTable" class="data-table min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Subcategory</th>
                    <th class="px-4 py-3">Duration</th>
                    <th class="px-4 py-3">Fees</th>
                    <th class="px-4 py-3">Trainer</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y" style="border-color: var(--border);">
                @foreach($courses as $course)
                <tr class="hover:bg-hover transition">
                    <td class="px-4 py-3 font-medium" style="color: var(--text);">{{ $course->title }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gold-light" style="color: var(--gold-rich);">
                            {{ $course->category }}
                        </span>
                    </td>
                    <td class="px-4 py-3" style="color: var(--text-soft);">{{ $course->subcategory }}</td>
                    <td class="px-4 py-3" style="color: var(--text-soft);">{{ $course->duration }} Months</td>
                    <td class="px-4 py-3 font-semibold" style="color: var(--gold-rich);">₹ {{ number_format($course->fees,2) }}</td>
                    <td class="px-4 py-3" style="color: var(--text-soft);">
                        @if($course->trainers->count())
                            {{ $course->trainers->pluck('name')->join(', ') }}
                        @else
                            <span class="text-gray-500">Not Assigned</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($course->status == 1)
                            <span class="status-active">
                                <i class="fas fa-circle text-[8px] mr-1"></i> Active
                            </span>
                        @else
                            <span class="status-inactive">
                                <i class="fas fa-circle text-[8px] mr-1"></i> Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.courses.edit', $course->id) }}"
                               class="action-btn edit"
                               title="Edit Course">
                                <i class="fas fa-edit text-sm"></i>
                            </a>

                            <form action="{{ route('admin.courses.destroy', $course->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="action-btn delete"
                                        title="Delete Course">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Table Info & Pagination -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 p-4 border-t" style="border-color: var(--border); background-color: var(--card);">
            <div id="tableInfo" class="text-sm" style="color: var(--text-soft);"></div>
            <div class="flex gap-2" id="tablePagination">
                <button id="prevPage" class="pagination-btn" disabled>
                    <i class="fas fa-chevron-left mr-1"></i> Prev
                </button>
                <button id="nextPage" class="pagination-btn">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE CARD VIEW -->
    <div class="md:hidden space-y-4" id="mobileCourseContainer">
        @foreach($courses as $course)
        <div class="mobile-card mobile-course" data-search="{{ strtolower($course->title.' '.$course->category.' '.$course->subcategory.' '.($course->trainers->pluck('name')->join(' '))) }}">
            <!-- Header -->
            <div class="flex justify-between items-start mb-3">
                <h3 class="font-bold text-lg" style="color: var(--text);">{{ $course->title }}</h3>
                @if($course->status == 1)
                    <span class="status-active text-xs">
                        <i class="fas fa-circle text-[6px] mr-1"></i> Active
                    </span>
                @else
                    <span class="status-inactive text-xs">
                        <i class="fas fa-circle text-[6px] mr-1"></i> Inactive
                    </span>
                @endif
            </div>

            <!-- Category Badge -->
            <div class="mb-3">
                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gold-light" style="color: var(--gold-rich);">
                    {{ $course->category }} / {{ $course->subcategory }}
                </span>
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-2 gap-3 mb-4">
                <div>
                    <p class="text-xs" style="color: var(--text-soft);">Duration</p>
                    <p class="font-semibold" style="color: var(--text);">{{ $course->duration }} Months</p>
                </div>
                <div>
                    <p class="text-xs" style="color: var(--text-soft);">Fees</p>
                    <p class="font-semibold" style="color: var(--gold-rich);">₹ {{ number_format($course->fees,2) }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs" style="color: var(--text-soft);">Trainer</p>
                    <p class="font-semibold" style="color: var(--text);">
                        @if($course->trainers->count())
                            {{ $course->trainers->pluck('name')->join(', ') }}
                        @else
                            <span class="text-gray-500">Not Assigned</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-2">
                <a href="{{ route('admin.courses.edit', $course->id) }}"
                   class="action-btn edit w-10 h-10">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{ route('admin.courses.destroy', $course->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="action-btn delete w-10 h-10">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- No Results Message -->
        <div id="mobileNoMatch" class="text-center py-8 hidden">
            <i class="fas fa-search text-4xl mb-3" style="color: var(--text-soft);"></i>
            <p class="text-lg font-semibold" style="color: var(--text);">No courses found</p>
            <p class="text-sm" style="color: var(--text-soft);">Try adjusting your search</p>
        </div>
    </div>
</div>

<!-- DataTables & jQuery -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#courseTable')) {
        var table = $('#courseTable').DataTable({
            paging: true,
            ordering: true,
            info: false,
            lengthChange: false,
            searching: true,
            pageLength: 5,
            dom: 't',
            language: {
                emptyTable: "No courses available",
                zeroRecords: "No matching courses found"
            }
        });

        // Search functionality
        $('#tableSearch').on('keyup', function() {
            var query = $(this).val().toLowerCase();

            // Desktop table search
            table.search(query).draw();

            // Mobile cards search
            let visibleCount = 0;
            $('.mobile-course').each(function() {
                var searchText = $(this).data('search') || '';
                var matches = searchText.indexOf(query) > -1;
                $(this).toggle(matches);
                if (matches) visibleCount++;
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                $('#mobileNoMatch').removeClass('hidden');
            } else {
                $('#mobileNoMatch').addClass('hidden');
            }
        });

        // Pagination info
        function renderInfo() {
            var info = table.page.info();
            $('#tableInfo').text(
                'Showing ' + (info.start + 1) + ' to ' + info.end + 
                ' of ' + info.recordsDisplay + ' entries'
            );

            // Update pagination buttons
            $('#prevPage').prop('disabled', info.page === 0);
            $('#nextPage').prop('disabled', info.page === info.pages - 1);
            
            // Update active state
            $('.page-number').remove();
            for (var i = 0; i < info.pages; i++) {
                $('<button>')
                    .addClass('pagination-btn page-number mx-1')
                    .text(i + 1)
                    .prop('disabled', i === info.page)
                    .toggleClass('active', i === info.page)
                    .on('click', (function(page) {
                        return function() {
                            table.page(page).draw('page');
                        };
                    })(i))
                    .insertBefore('#nextPage');
            }
        }

        // Pagination controls
        $('#prevPage').on('click', function() {
            table.page('previous').draw('page');
        });

        $('#nextPage').on('click', function() {
            table.page('next').draw('page');
        });

        table.on('draw', function() {
            renderInfo();
        });

        renderInfo();
    }
});
</script>

<!-- Custom DataTables styling -->
<style>
    /* DataTables styling for dark mode */
    .dataTables_wrapper .dataTables_paginate {
        display: none;
    }
    
    .dataTables_wrapper .dataTables_filter {
        display: none;
    }
    
    /* Remove default DataTables styling */
    table.dataTable thead th,
    table.dataTable thead td {
        border-bottom: none !important;
    }
    
    table.dataTable.no-footer {
        border-bottom: none !important;
    }
    
    table.dataTable tbody tr {
        background-color: transparent !important;
    }
    
    /* Fix for dark mode */
    body.dark .dataTables_wrapper {
        color: var(--text-dark);
    }
    
    /* Custom scrollbar for table */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: var(--border);
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: var(--gold-rich);
        border-radius: 3px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: var(--gold-glow);
    }
</style>

@endsection