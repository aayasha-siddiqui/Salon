@extends('layouts.admin')

@section('content')

<style>
/* ================ STUDENT MANAGEMENT - PURE DARK GOLD THEME ================ */

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.page-title {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    font-weight: 700;
    color: var(--gold-rich);
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    padding-bottom: 8px;
}

.page-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    border-radius: 2px;
}

/* Add Button */
.add-btn {
    background: linear-gradient(135deg, var(--gold-rich), var(--gold-glow));
    color: #000000;
    padding: 10px 24px;
    border-radius: 40px;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
    box-shadow: 0 8px 20px var(--glow);
    border: 1px solid var(--gold-rich);
}

.add-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px var(--glow);
    background: linear-gradient(135deg, var(--gold-glow), var(--gold-rich));
    color: #000000;
}

/* Success Message */
.success-message {
    background: var(--card);
    border-left: 4px solid var(--gold-rich);
    border-radius: 12px;
    padding: 15px 20px;
    margin-bottom: 20px;
    color: var(--text);
    font-weight: 500;
    box-shadow: 0 4px 15px var(--glow);
    border: 1px solid var(--gold-dim);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.success-message i {
    color: var(--gold-rich);
}

/* Search Box */
.search-box {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 15px;
}

.search-input {
    border: 1.5px solid var(--border);
    border-radius: 40px;
    padding: 10px 20px;
    background: var(--card);
    color: var(--text);
    font-size: 14px;
    width: 280px;
    transition: 0.3s;
}

.search-input:focus {
    border-color: var(--gold-rich);
    box-shadow: 0 0 0 4px var(--glow);
    outline: none;
}

.search-input::placeholder {
    color: var(--text-soft);
    opacity: 0.7;
}

/* Desktop Table */
.table-container {
    background: var(--card);
    border: 1.5px solid var(--gold-dim);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    transition: 0.3s;
    margin-bottom: 20px;
}

.table-container:hover {
    border-color: var(--gold-rich);
    box-shadow: 0 15px 40px var(--glow);
}

.student-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1200px;
}

.student-table thead {
    background: linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.student-table thead th {
    color: #000000;
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 16px 12px;
    text-align: left;
    white-space: nowrap;
}

.student-table tbody td {
    padding: 16px 12px;
    color: var(--text);
    border-bottom: 1px solid var(--border);
    background: var(--card);
    font-size: 13px;
}

.student-table tbody tr:nth-child(even) td {
    background: var(--hover);
}

.student-table tbody tr:hover td {
    background: var(--gold-dim) !important;
}

/* Student Photo */
.student-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--gold-rich);
    box-shadow: 0 4px 10px var(--glow);
}

.photo-placeholder {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--gold-dim);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000000;
    font-size: 16px;
}

/* Status Badges */
.status-badge {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 600;
    text-transform: capitalize;
}

.status-badge.active {
    background: rgba(25, 135, 84, 0.15);
    color: #198754;
    border: 1px solid #198754;
}

.status-badge.completed {
    background: rgba(139, 107, 62, 0.15);
    color: var(--gold-rich);
    border: 1px solid var(--gold-rich);
}

.status-badge.dropped {
    background: rgba(220, 53, 69, 0.15);
    color: #dc3545;
    border: 1px solid #dc3545;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.btn-action {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-edit {
    background: var(--gold-dim);
    color: #000000;
}

.btn-edit:hover {
    background: var(--gold-rich);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px var(--glow);
}

.btn-delete {
    background: var(--gold-dim);
    color: #000000;
}

.btn-delete:hover {
    background: #dc3545;
    color: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
}

/* Mobile Cards */
.mobile-cards {
    display: none;
}

.mobile-student-card {
    background: var(--card);
    border: 1.5px solid var(--gold-dim);
    border-radius: 18px;
    padding: 20px;
    margin-bottom: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

.mobile-student-card:hover {
    border-color: var(--gold-rich);
    box-shadow: 0 15px 30px var(--glow);
    transform: translateY(-3px);
}

.mobile-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.mobile-name {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 700;
    color: var(--gold-rich);
}

.mobile-details {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.mobile-detail-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: var(--text-soft);
}

.mobile-detail-item i {
    width: 20px;
    color: var(--gold-rich);
}

.mobile-detail-item span {
    color: var(--text);
}

.mobile-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

/* Pagination Controls */
.pagination-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
}

.pagination-info {
    color: var(--text-soft);
    font-size: 13px;
}

.pagination-buttons {
    display: flex;
    gap: 5px;
}

.btn-pagination {
    background: var(--card);
    border: 1.5px solid var(--gold-dim);
    color: var(--text-soft);
    border-radius: 8px;
    padding: 6px 12px;
    font-size: 12px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-pagination:hover:not(:disabled) {
    background: var(--gold-rich);
    border-color: var(--gold-rich);
    color: #000000;
    transform: translateY(-2px);
}

.btn-pagination:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

/* Responsive */
@media (max-width: 768px) {
    .desktop-table {
        display: none;
    }
    
    .mobile-cards {
        display: block;
    }
    
    .search-input {
        width: 100%;
    }
    
    
    .page-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .add-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<!-- Page Header -->
<div class="page-header">
    <h2 class="page-title">
        <i class="fas fa-user-graduate"></i>
        Student Management
    </h2>

    <a href="{{ route('admin.students.create') }}" class="add-btn">
        <i class="fas fa-plus-circle"></i>
        Add New Student
    </a>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="success-message">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        <i class="fas fa-star"></i>
    </div>
@endif

<!-- Search Box -->
<div class="search-box">
    <input type="text" 
           id="tableSearch" 
           class="search-input"
           placeholder="🔍 Search students...">
</div>

@php
    $statusColors = [
        'Active' => 'active',
        'Completed' => 'completed',
        'Dropped' => 'dropped'
    ];
@endphp

<div class="desktop-table">
    <div class="table-container" style="overflow-x: auto; max-width: 100%;">
        <table id="studentTable" class="student-table" style="min-width: 1400px;">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                      <th>Course</th>
                    <th>Joining Date</th>
                    <th>Trainer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>
                        @if($student->photo)
                            <img src="{{ asset('storage/'.$student->photo) }}" 
                                 alt="{{ $student->name }}" 
                                 class="student-photo">
                        @else
                            <div class="photo-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 600; color: var(--text);">{{ $student->name }}</td>
                    <td style="color: var(--text);">{{ $student->phone ?? '-' }}</td>
                    <td style="color: var(--text);">{{ $student->email }}</td>
                    <td style="color: var(--text);">{{ $student->address }}</td>
                    <td style="color: var(--text);">{{ $student->category ?? '-' }}</td>
                    <td style="color: var(--text);">{{ $student->subcategory ?? '-' }}</td>
                    <td>{{ $student->course->title ?? '-' }}</td>
                    <td style="color: var(--text);">{{ \Carbon\Carbon::parse($student->joining_date)->format('d M, Y') }}</td>
                    <td style="color: var(--text);">{{ $student->trainer->name ?? '-' }}</td>
                    <td>
                        <span class="status-badge {{ $statusColors[$student->status] ?? 'active' }}">
                            {{ $student->status }}
                        </span>
                    </td>
                   <td>
<div style="display:flex;flex-direction:column;gap:6px;align-items:center;">

    <!-- Top Buttons -->
    <div style="display:flex;gap:8px;">
        
        <a href="{{ route('admin.payments.create',$student->id) }}" 
           class="btn-action" 
           style="background:#198754;color:white;"
           title="Add Payment">
            <i class="fas fa-money-bill"></i>
        </a>

        <a href="{{ route('admin.payments.student',$student->id) }}" 
           class="btn-action" 
           style="background:#0d6efd;color:white;"
           title="Payment History">
            <i class="fas fa-receipt"></i>
        </a>

    </div>

    <!-- Bottom Buttons -->
    <div style="display:flex;gap:8px;">

        <a href="{{ route('admin.students.edit', $student->id) }}" 
           class="btn-action btn-edit"
           title="Edit Student">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('admin.students.destroy', $student->id) }}"
              method="POST"
              onsubmit="return confirm('Delete this student?');"
              style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn-action btn-delete"
                    title="Delete Student">
                <i class="fas fa-trash"></i>
            </button>
        </form>

    </div>

</div>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" style="text-align: center; padding: 40px; color: var(--text-soft);">
                        <i class="fas fa-user-graduate" style="font-size: 48px; opacity: 0.5; margin-bottom: 15px;"></i>
                        <p>No students found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Info -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
        <div style="color: var(--text-soft); font-size: 13px;" id="tableInfo"></div>
        <div style="display: flex; gap: 5px;" id="tablePagination">
            <button id="prevPage" class="btn-pagination">
                <i class="fas fa-chevron-left"></i> Prev
            </button>
            <button id="nextPage" class="btn-pagination">
                Next <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<!-- Mobile Card View -->
<div class="mobile-cards">
    @forelse($students as $student)
    <div class="mobile-student-card">
        <div class="mobile-card-header">
            <h3 class="mobile-name">{{ $student->name }}</h3>
            <span class="status-badge {{ $statusColors[$student->status] ?? 'active' }}">
                {{ $student->status }}
            </span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 8px;">
            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-soft);">
                <i class="fas fa-phone" style="width: 20px; color: var(--gold-rich);"></i>
                <span style="color: var(--text);">{{ $student->phone ?? '-' }}</span>
            </div>
            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-soft);">
                <i class="fas fa-envelope" style="width: 20px; color: var(--gold-rich);"></i>
                <span style="color: var(--text);">{{ $student->email }}</span>
            </div>
            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-soft);">
                <i class="fas fa-map-marker-alt" style="width: 20px; color: var(--gold-rich);"></i>
                <span style="color: var(--text);">{{ $student->address }}</span>
            </div>
            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-soft);">
                <i class="fas fa-tag" style="width: 20px; color: var(--gold-rich);"></i>
                <span style="color: var(--text);">{{ $student->category ?? '-' }} / {{ $student->subcategory ?? '-' }}</span>
            </div>
            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-soft);">
                <i class="fas fa-calendar" style="width: 20px; color: var(--gold-rich);"></i>
                <span style="color: var(--text);">{{ \Carbon\Carbon::parse($student->joining_date)->format('d M, Y') }}</span>
            </div>
            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-soft);">
                <i class="fas fa-chalkboard-teacher" style="width: 20px; color: var(--gold-rich);"></i>
                <span style="color: var(--text);">{{ $student->trainer->name ?? '-' }}</span>
            </div>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 15px;">
            <a href="{{ route('admin.students.edit', $student->id) }}" 
               class="btn-action btn-edit">
                <i class="fas fa-edit"></i>
            </a>

            <form action="{{ route('admin.students.destroy', $student->id) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this student?');"
                  style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-action btn-delete">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @empty
    <div style="text-align: center; padding: 40px; color: var(--text-soft);">
        <i class="fas fa-user-graduate" style="font-size: 48px; opacity: 0.5; margin-bottom: 15px;"></i>
        <p>No students found</p>
    </div>
    @endforelse
</div>

<!-- jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#studentTable').DataTable({
        paging: true,
        ordering: true,
        info: false,
        lengthChange: false,
        searching: true,
        pageLength: 5,
        dom: 't'
    });

    // Search functionality
    $('#tableSearch').on('keyup', function() {
        var query = $(this).val().toLowerCase();
        table.search(query).draw();

        // Mobile search
        $('.mobile-student-card').each(function() {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.indexOf(query) > -1);
        });
    });

    // Pagination controls
    function updatePaginationInfo() {
        var info = table.page.info();
        $('#tableInfo').text('Showing ' + (info.start + 1) + ' to ' + info.end + ' of ' + info.recordsDisplay + ' entries');
        
        $('#prevPage, #nextPage').prop('disabled', false);
        if (info.page === 0) $('#prevPage').prop('disabled', true);
        if (info.page === info.pages - 1) $('#nextPage').prop('disabled', true);
    }

    $('#prevPage').on('click', function() {
        table.page('previous').draw('page');
        updatePaginationInfo();
    });

    $('#nextPage').on('click', function() {
        table.page('next').draw('page');
        updatePaginationInfo();
    });

    table.on('draw', function() {
        updatePaginationInfo();
    });

    updatePaginationInfo();
});
</script>

@endsection