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
    
    .action-btn.view {
        background: #3B82F6;
    }
    
    .action-btn.view:hover {
        background: #2563EB;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
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
    
    /* Stats cards */
    .stats-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-left: 4px solid #8B6B3E;
        border-radius: 8px;
        padding: 1rem;
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
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <!-- Page Header with Stats -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-chalkboard-teacher mr-3" style="color: var(--gold-rich);"></i>
                Trainer Management
            </h2>
            <p class="text-sm text-soft mt-1">Manage your teaching staff and their assignments</p>
        </div>

        <!-- Quick Stats -->
        <div class="flex gap-3">
            <div class="stats-card">
                <div class="text-center">
                    <span class="text-xs text-soft">Total Trainers</span>
                    <p class="text-xl font-bold text-gold">{{ $trainers->count() }}
                        
                    </p>
                </div>
            </div>
            <div class="stats-card">
                <div class="text-center">
                    <span class="text-xs text-soft">Active</span>
                    <p class="text-xl font-bold text-green-600">{{ $trainers->where('status',1)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
        <a href="{{ route('admin.trainers.create') }}"
           class="w-full sm:w-auto px-6 py-2.5 text-white rounded-lg transition-all duration-300 flex items-center justify-center gap-2 text-sm font-semibold"
           style="background: linear-gradient(to right, #8B6B3E, #A07D4A);"
           onmouseover="this.style.background='linear-gradient(to right, #745A31, #8B6B3E)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 15px var(--glow)';"
           onmouseout="this.style.background='linear-gradient(to right, #8B6B3E, #A07D4A)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
            <i class="fas fa-plus-circle"></i>
            Add New Trainer
        </a>

        <!-- Search Bar -->
        <div class="relative w-full sm:w-80">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="tableSearch" placeholder="Search trainers by name, email, specialization..."
                   class="search-input pl-10">
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

    <!-- DESKTOP TABLE VIEW -->
    <div class="hidden md:block rounded-xl overflow-hidden shadow-lg" style="background-color: var(--card); border: 1px solid var(--border);">
        <table id="trainerTable" class="data-table min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-3">Trainer</th>
                    <th class="px-4 py-3">Contact</th>
                    <th class="px-4 py-3">Specialization</th>
                    <th class="px-4 py-3">Experience</th>
                    <th class="px-4 py-3">Salary</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y" style="border-color: var(--border);">
                @foreach($trainers as $trainer)
                <tr class="hover:bg-hover transition">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gold-light flex items-center justify-center">
                                <i class="fas fa-user-tie text-gold"></i>
                            </div>
                            <div>
                                <div class="font-semibold" style="color: var(--text);">{{ $trainer->name }}</div>
                                <div class="text-xs" style="color: var(--text-soft);">ID: TR{{ str_pad($trainer->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div style="color: var(--text);">{{ $trainer->email }}</div>
                        <div class="text-xs" style="color: var(--text-soft);">{{ $trainer->phone }}</div>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gold-light" style="color: var(--gold-rich);">
                            {{ $trainer->specialization }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="exp-badge">
                            <i class="fas fa-briefcase mr-1"></i>{{ $trainer->experience }} years
                        </span>
                    </td>
                    <td class="px-4 py-3 font-semibold" style="color: var(--gold-rich);">₹ {{ number_format($trainer->salary,2) }}</td>
                    <td class="px-4 py-3">
                        @if($trainer->status == 1)
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
                            <a href="{{ route('admin.trainers.show', $trainer->id) }}"
                               class="action-btn view"
                               title="View Details">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <a href="{{ route('admin.trainers.edit', $trainer->id) }}"
                               class="action-btn edit"
                               title="Edit Trainer">
                                <i class="fas fa-edit text-sm"></i>
                            </a>

                            <form action="{{ route('admin.trainers.destroy', $trainer->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this trainer? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="action-btn delete"
                                        title="Delete Trainer">
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
    <div class="md:hidden space-y-4" id="mobileTrainerContainer">
        @foreach($trainers as $trainer)
        <div class="mobile-card mobile-trainer" 
             data-search="{{ strtolower($trainer->name.' '.$trainer->email.' '.$trainer->phone.' '.$trainer->specialization) }}">
            <!-- Header with Avatar -->
            <div class="flex items-center gap-3 mb-3">
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-user-tie text-gold text-xl"></i>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg" style="color: var(--text);">{{ $trainer->name }}</h3>
                    <p class="text-xs" style="color: var(--text-soft);">ID: TR{{ str_pad($trainer->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                @if($trainer->status == 1)
                    <span class="status-active text-xs">
                        <i class="fas fa-circle text-[6px] mr-1"></i> Active
                    </span>
                @else
                    <span class="status-inactive text-xs">
                        <i class="fas fa-circle text-[6px] mr-1"></i> Inactive
                    </span>
                @endif
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>
                    <p class="text-xs" style="color: var(--text-soft);">Email</p>
                    <p class="text-sm font-medium truncate" style="color: var(--text);">{{ $trainer->email }}</p>
                </div>
                <div>
                    <p class="text-xs" style="color: var(--text-soft);">Phone</p>
                    <p class="text-sm font-medium" style="color: var(--text);">{{ $trainer->phone }}</p>
                </div>
                <div>
                    <p class="text-xs" style="color: var(--text-soft);">Specialization</p>
                    <span class="text-xs px-2 py-1 rounded-full bg-gold-light inline-block mt-1" style="color: var(--gold-rich);">
                        {{ $trainer->specialization }}
                    </span>
                </div>
                <div>
                    <p class="text-xs" style="color: var(--text-soft);">Experience</p>
                    <p class="text-sm font-medium" style="color: var(--text);">
                        <i class="fas fa-briefcase text-gold mr-1"></i>{{ $trainer->experience }} years
                    </p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs" style="color: var(--text-soft);">Salary</p>
                    <p class="text-lg font-bold" style="color: var(--gold-rich);">₹ {{ number_format($trainer->salary,2) }}</p>
                </div>
            </div>

            <!-- Courses Taught (if any) -->
          @if($trainer->courses && $trainer->courses->count() > 0)
            <div class="mb-3">
                <p class="text-xs mb-1" style="color: var(--text-soft);">
                    <i class="fas fa-book-open text-gold mr-1"></i>Teaching {{ $trainer->courses->count() }} course(s)
                </p>
                <div class="flex flex-wrap gap-1">
                    @foreach($trainer->courses->take(2) as $course)
                        <span class="text-xs px-2 py-1 rounded-full" style="background-color: var(--hover); color: var(--text-soft);">
                            {{ $course->title }}
                        </span>
                    @endforeach
                    @if($trainer->courses->count() > 2)
                        <span class="text-xs px-2 py-1 rounded-full" style="background-color: var(--hover); color: var(--text-soft);">
                            +{{ $trainer->courses->count() - 2 }} more
                        </span>
                    @endif
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex gap-2 mt-4 pt-3 border-t" style="border-color: var(--border);">
                <a href="{{ route('admin.trainers.show', $trainer->id) }}"
                   class="action-btn view w-10 h-10">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.trainers.edit', $trainer->id) }}"
                   class="action-btn edit w-10 h-10">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{ route('admin.trainers.destroy', $trainer->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this trainer?')">
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
            <p class="text-lg font-semibold" style="color: var(--text);">No trainers found</p>
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
    if (!$.fn.DataTable.isDataTable('#trainerTable')) {
        var table = $('#trainerTable').DataTable({
            paging: true,
            ordering: true,
            info: false,
            lengthChange: false,
            searching: true,
            pageLength: 5,
            dom: 't',
            language: {
                emptyTable: "No trainers available",
                zeroRecords: "No matching trainers found"
            }
        });

        // Search functionality
        $('#tableSearch').on('keyup', function() {
            var query = $(this).val().toLowerCase();

            // Desktop table search
            table.search(query).draw();

            // Mobile cards search
            let visibleCount = 0;
            $('.mobile-trainer').each(function() {
                var searchText = $(this).data('search') || $(this).text().toLowerCase();
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