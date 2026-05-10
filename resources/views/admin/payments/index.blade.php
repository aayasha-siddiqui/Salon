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
    .payments-table thead tr {
        background: linear-gradient(to right, #8B6B3E, #A07D4A) !important;
    }
    
    .payments-table thead th {
        color: white !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 1rem 1rem;
    }
    
    .payments-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .payments-table tbody tr:hover {
        background-color: var(--hover) !important;
    }
    
    /* Amount styling */
    .amount-positive {
        color: #10B981;
        font-weight: 700;
        font-size: 1rem;
    }
    
    /* Payment method badges */
    .method-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .method-cash {
        background: rgba(16, 185, 129, 0.1);
        color: #10B981;
    }
    
    .method-card {
        background: rgba(59, 130, 246, 0.1);
        color: #3B82F6;
    }
    
    .method-upi {
        background: rgba(139, 107, 62, 0.1);
        color: var(--gold-rich);
    }
    
    .method-bank {
        background: rgba(139, 92, 246, 0.1);
        color: #8B5CF6;
    }
    
    .method-other {
        background: rgba(107, 114, 128, 0.1);
        color: #6B7280;
    }
    
    /* Delete button */
    .delete-btn {
        background: #4B5563;
        color: white;
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    
    .delete-btn:hover {
        background: #DC2626;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }
    
    /* Stats cards */
    .stats-card {
        background: linear-gradient(135deg, rgba(139, 107, 62, 0.1) 0%, rgba(182, 143, 92, 0.1) 100%);
        border-left: 4px solid #8B6B3E;
        border-radius: 12px;
        padding: 1.25rem;
        transition: all 0.3s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px var(--glow);
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
    
    /* Mobile card */
    .mobile-payment-card {
        background-color: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        transition: all 0.3s ease;
    }
    
    .mobile-payment-card:hover {
        border-color: var(--gold-rich);
        box-shadow: 0 4px 15px var(--glow);
        transform: translateY(-2px);
    }
    
    /* Date styling */
    .payment-date {
        background-color: var(--hover);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        display: inline-block;
    }
    
    /* Pagination styling */
    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        margin-top: 2rem;
    }
    
    .pagination .page-link {
        padding: 0.5rem 1rem;
        background-color: var(--card);
        border: 1px solid var(--border);
        color: var(--text-soft);
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .pagination .page-link:hover {
        background-color: var(--gold-rich);
        color: white;
        border-color: var(--gold-rich);
        transform: translateY(-2px);
    }
    
    .pagination .active .page-link {
        background-color: var(--gold-rich);
        color: white;
        border-color: var(--gold-rich);
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <!-- Page Header with Stats -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold font-playfair flex items-center" style="color: var(--gold-rich);">
                <i class="fas fa-credit-card mr-3" style="color: var(--gold-rich);"></i>
                Payment Management
            </h2>
            <p class="text-sm text-soft mt-1">Track and manage all student payments</p>
        </div>

        <!-- Add Payment Button -->
        <!--  -->
    </div>

    <!-- Summary Stats Cards -->
    @php
        $totalPayments = $payments->total();
        $totalAmount = $payments->sum('amount');
        $averageAmount = $totalPayments > 0 ? $totalAmount / $totalPayments : 0;
        $paymentMethods = $payments->groupBy('payment_method')->count();
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Total Payments</p>
                    <p class="text-2xl font-bold" style="color: var(--text);">{{ $totalPayments }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-credit-card text-gold text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Total Amount</p>
                    <p class="text-2xl font-bold amount-positive">₹{{ number_format($totalAmount, 2) }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-rupee-sign text-gold text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Average Payment</p>
                    <p class="text-2xl font-bold" style="color: var(--text);">₹{{ number_format($averageAmount, 2) }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-chart-line text-gold text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-soft uppercase">Payment Methods</p>
                    <p class="text-2xl font-bold" style="color: var(--text);">{{ $paymentMethods }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-credit-card text-gold text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="flex justify-end mb-4">
        <div class="relative w-full sm:w-80">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="tableSearch" placeholder="Search by student, method, amount..."
                   class="search-input pl-10">
        </div>
    </div>

    <!-- DESKTOP TABLE VIEW -->
    <div class="hidden md:block bg-card border border-border rounded-xl shadow-lg overflow-hidden">
        <table id="paymentsTable" class="payments-table min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-4 py-3">Student</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Payment Method</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y" style="border-color: var(--border);">
                @forelse($payments as $payment)
                <tr class="hover:bg-hover transition payment-row">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gold-light flex items-center justify-center">
                                <i class="fas fa-user-graduate text-gold text-sm"></i>
                            </div>
                            <div>
                                <div class="font-semibold" style="color: var(--text);">{{ $payment->student->name }}</div>
                                <div class="text-xs" style="color: var(--text-soft);">ID: ST{{ str_pad($payment->student->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-4 py-3">
                        <span class="amount-positive">₹{{ number_format($payment->amount, 2) }}</span>
                    </td>
                    
                    <td class="px-4 py-3">
                        @php
                            $methodClass = 'method-other';
                            if(strtolower($payment->payment_method) == 'cash') $methodClass = 'method-cash';
                            elseif(strtolower($payment->payment_method) == 'card') $methodClass = 'method-card';
                            elseif(strtolower($payment->payment_method) == 'upi') $methodClass = 'method-upi';
                            elseif(strtolower($payment->payment_method) == 'bank transfer') $methodClass = 'method-bank';
                        @endphp
                        <span class="method-badge {{ $methodClass }}">
                            <i class="fas fa-{{ strtolower($payment->payment_method) == 'cash' ? 'money-bill' : (strtolower($payment->payment_method) == 'card' ? 'credit-card' : (strtolower($payment->payment_method) == 'upi' ? 'mobile-alt' : 'university')) }} mr-1"></i>
                            {{ $payment->payment_method }}
                        </span>
                    </td>
                    
                    <td class="px-4 py-3">
                        <span class="payment-date" style="color: var(--text);">
                            <i class="far fa-calendar-alt mr-1" style="color: var(--gold-rich);"></i>
                            {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}
                        </span>
                    </td>
                    
                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                         

                            <form action="{{ route('admin.payments.destroy', $payment->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this payment record?')"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" title="Delete Payment">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-8 text-center" style="color: var(--text-soft);">
                        <i class="fas fa-credit-card text-4xl mb-3"></i>
                        <p class="text-lg font-semibold" style="color: var(--text);">No payments found</p>
                        <p class="text-sm">Start by recording your first payment</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Table Info -->
        <div class="flex justify-between items-center p-4 border-t" style="border-color: var(--border); background-color: var(--card);">
            <div id="tableInfo" class="text-sm" style="color: var(--text-soft);"></div>
            <div class="text-sm" style="color: var(--text-soft);">
                <i class="fas fa-info-circle mr-1" style="color: var(--gold-rich);"></i>
                Page {{ $payments->currentPage() }} of {{ $payments->lastPage() }}
            </div>
        </div>
    </div>

    <!-- MOBILE CARD VIEW -->
    <div class="md:hidden space-y-4" id="mobilePaymentContainer">
        @forelse($payments as $payment)
        <div class="mobile-payment-card payment-card">
            <!-- Student Header -->
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-gold-light flex items-center justify-center">
                    <i class="fas fa-user-graduate text-gold"></i>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold" style="color: var(--text);">{{ $payment->student->name }}</h3>
                    <p class="text-xs" style="color: var(--text-soft);">ID: ST{{ str_pad($payment->student->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                <span class="amount-positive text-lg">₹{{ number_format($payment->amount, 2) }}</span>
            </div>

            <!-- Payment Details Grid -->
            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>
                    <p class="text-xs text-soft">Payment Method</p>
                    @php
                        $methodClass = 'method-other';
                        if(strtolower($payment->payment_method) == 'cash') $methodClass = 'method-cash';
                        elseif(strtolower($payment->payment_method) == 'card') $methodClass = 'method-card';
                        elseif(strtolower($payment->payment_method) == 'upi') $methodClass = 'method-upi';
                        elseif(strtolower($payment->payment_method) == 'bank transfer') $methodClass = 'method-bank';
                    @endphp
                    <span class="method-badge {{ $methodClass }} text-xs">
                        {{ $payment->payment_method }}
                    </span>
                </div>
                <div>
                    <p class="text-xs text-soft">Payment Date</p>
                    <p class="font-semibold text-sm" style="color: var(--text);">
                        <i class="far fa-calendar-alt mr-1" style="color: var(--gold-rich);"></i>
                        {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-2 pt-2 border-t" style="border-color: var(--border);">
               
            </div>
        </div>
        @empty
        <div class="text-center py-8">
            <i class="fas fa-credit-card text-4xl mb-3" style="color: var(--text-soft);"></i>
            <p class="text-lg font-semibold" style="color: var(--text);">No payments found</p>
            <p class="text-sm" style="color: var(--text-soft);">Start by recording your first payment</p>
        </div>
        @endforelse

        <!-- No Results Message -->
        <div id="mobileNoMatch" class="text-center py-8 hidden">
            <i class="fas fa-search text-4xl mb-3" style="color: var(--text-soft);"></i>
            <p class="text-lg font-semibold" style="color: var(--text);">No matching payments</p>
            <p class="text-sm" style="color: var(--text-soft);">Try adjusting your search</p>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $payments->links() }}
    </div>

    <!-- Report Footer -->
    <div class="mt-4 text-right text-xs text-soft">
        <i class="fas fa-calendar-alt mr-1" style="color: var(--gold-rich);"></i>
        Last updated: {{ now()->format('d M Y, h:i A') }}
    </div>
</div>

<!-- Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('tableSearch');
    const tableRows = document.querySelectorAll('#paymentsTable tbody tr.payment-row');
    const mobileCards = document.querySelectorAll('.payment-card');
    const mobileNoMatch = document.getElementById('mobileNoMatch');

    function filterPayments() {
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
            const text = card.innerText.toLowerCase();
            const matches = text.includes(searchTerm);
            card.style.display = matches ? 'block' : 'none';
            if (matches) mobileVisible++;
        });

        // Update table info
        const tableInfo = document.getElementById('tableInfo');
        if (tableInfo) {
            tableInfo.textContent = `Showing ${desktopVisible} of ${tableRows.length} payments`;
        }

        // Show/hide no results on mobile
        if (mobileVisible === 0 && mobileCards.length > 0) {
            mobileNoMatch.classList.remove('hidden');
        } else {
            mobileNoMatch.classList.add('hidden');
        }
    }

    if (searchInput) {
        searchInput.addEventListener('keyup', filterPayments);
        
        // Initial count
        const tableInfo = document.getElementById('tableInfo');
        if (tableInfo) {
            tableInfo.textContent = `Showing ${tableRows.length} of ${tableRows.length} payments`;
        }
    }
});
</script>

<!-- Custom Pagination Styling -->
<style>
    nav[role="navigation"] {
        display: flex;
        justify-content: center;
    }
    
    nav[role="navigation"] div:first-child {
        display: none;
    }
    
    nav[role="navigation"] div:last-child {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    nav[role="navigation"] span,
    nav[role="navigation"] a {
        padding: 0.5rem 1rem !important;
        background-color: var(--card) !important;
        border: 1px solid var(--border) !important;
        color: var(--text-soft) !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
        margin: 0 !important;
    }
    
    nav[role="navigation"] a:hover {
        background-color: var(--gold-rich) !important;
        color: white !important;
        border-color: var(--gold-rich) !important;
        transform: translateY(-2px);
    }
    
    nav[role="navigation"] span[aria-current="page"] span {
        background-color: var(--gold-rich) !important;
        color: white !important;
        border-color: var(--gold-rich) !important;
    }
</style>

@endsection