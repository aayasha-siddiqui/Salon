@extends('layouts.admin')

@section('content')

<style>
/* ================ ADMIN DASHBOARD - PURE DARK GOLD THEME ================ */

/* Dashboard Title */
.dashboard-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 700;
    color: #8B6B3E;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    padding-bottom: 10px;
}

.dashboard-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #8B6B3E, #745A31);
    border-radius: 2px;
}

/* Dark mode adjustments */
body.dark .dashboard-title {
    color: #A07D4A;
}

/* Stat Cards Container */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

@media (min-width: 640px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .stats-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Stat Card Base */
.stat-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 22px;
    border-radius: 18px;
    transition: all 0.3s ease;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    border: 1.5px solid transparent;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    background: linear-gradient(135deg, #8B6B3E, #5C3E1F); /* Pure gold gradient */
}

.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(139, 107, 62, 0.35);
    border-color: #B68F5C;
}

/* Gold accent on top */
.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
  
    opacity: 0.7;
}

.stat-card:hover::before {
    opacity: 1;
}

/* Stat Card Content */
.stat-card div {
    z-index: 2;
}

.stat-card p {
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
    opacity: 0.9;
    color: #FFFFFF;
}

.stat-card h2 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 700;
    line-height: 1.2;
    color: #FFFFFF;
}

.stat-card i {
    font-size: 42px;
    opacity: 0.8;
    transition: 0.3s;
    color: #FFFFFF;
}

.stat-card:hover i {
    transform: scale(1.1) rotate(3deg);
    opacity: 1;
}

/* Individual Card Variations - All Gold Tones */
.stat-card.students {
    background: linear-gradient(135deg, #8B6B3E, #6B4F28);
}

.stat-card.courses {
    background: linear-gradient(135deg, #745A31, #4A3A1A);
}

.stat-card.enquiries {
    background: linear-gradient(135deg, #A07D4A, #6B4F28);
}

.stat-card.trainers {
    background: linear-gradient(135deg, #5C4A28, #3A2E1A);
}

.stat-card.revenue {
    background: linear-gradient(135deg, #8B6B3E, #5C3E1F);
}

.stat-card.fees {
    background: linear-gradient(135deg, #745A31, #4A3A1A);
}

.stat-card.classes {
    background: linear-gradient(135deg, #6B4F28, #3A2E1A);
}

.stat-card.alerts {
    background: linear-gradient(135deg, #A07D4A, #6B4F28);
}

/* Light mode adjustments - Keep gold theme */
body:not(.dark) .stat-card {
    opacity: 0.95;
}

body:not(.dark) .stat-card:hover {
    opacity: 1;
}

/* Chart Container */
.chart-container {
    background: #ffffff;
    border: 1.5px solid #e5e0d8;
    border-radius: 20px;
    padding: 22px;
    margin-top: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    transition: 0.3s;
}

body.dark .chart-container {
    background: #0f0f0f;
 
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.chart-container:hover {
    border-color: #8B6B3E;
    box-shadow: 0 15px 30px rgba(139, 107, 62, 0.15);
}

body.dark .chart-container:hover {
    box-shadow: 0 15px 30px rgba(139, 107, 62, 0.25);
}

.chart-title {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e5e0d8;
}

body.dark .chart-title {
    color: #ffffff;
    border-bottom-color: #1e1e1e;
}

.chart-title i {
    color: #8B6B3E;
}

/* Chart Canvas */
canvas {
    max-height: 250px;
    width: 100% !important;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-title {
        font-size: 24px;
    }
    
    .stat-card {
        padding: 18px;
    }
    
    .stat-card h2 {
        font-size: 24px;
    }
    
    .stat-card i {
        font-size: 32px;
    }
    
    .chart-container {
        padding: 18px;
    }
    
    .chart-title {
        font-size: 18px;
    }
}

/* Cursor utilities */
.cursor-default {
    cursor: default;
}
</style>

<!-- Dashboard Title -->
<div class="dashboard-title">
    <i class="fas fa-chart-pie"></i>
    Academy Dashboard Overview
</div>

<!-- STAT CARDS - ALL GOLD -->
<div class="stats-grid">
    <!-- Students -->
    <a href="{{ route('admin.students.index') }}" class="stat-card students">
        <div>
            <p>Total Students</p>
            <h2>{{ $totalStudents ?? 0 }}</h2>
        </div>
        <i class="fas fa-user-graduate"></i>
    </a>

    <!-- Courses -->
    <a href="{{ route('admin.courses.index') }}" class="stat-card courses">
        <div>
            <p>Active Courses</p>
            <h2>{{ $activeCourses ?? 0 }}</h2>
        </div>
        <i class="fas fa-book"></i>
    </a>

    <!-- Enquiries -->
    <a href="{{ route('admin.enquiries.index') }}" class="stat-card enquiries">
        <div>
            <p>Pending Enquiries</p>
            <h2>{{ $pendingEnquiries ?? 0 }}</h2>
        </div>
        <i class="fas fa-question-circle"></i>
    </a>

    <!-- Trainers -->
    <a href="{{ route('admin.trainers.index') }}" class="stat-card trainers">
        <div>
            <p>Total Trainers</p>
            <h2>{{ $totalTrainers ?? 0 }}</h2>
        </div>
        <i class="fas fa-chalkboard-teacher"></i>
    </a>

    <!-- Revenue -->
    <div class="stat-card revenue cursor-default">
        <div>
            <p>Monthly Revenue</p>
            <h2>₹{{ number_format($monthlyRevenue ?? 0, 2) }}</h2>
        </div>
        <i class="fas fa-chart-line"></i>
    </div>


    <!-- Classes -->
   
    <!-- Alerts -->
    
</div>



<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('revenueChart').getContext('2d');
    
    // Get theme colors
    const isDark = document.body.classList.contains('dark');
    const textColor = isDark ? '#e0e0e0' : '#4a4a4a';
    const gridColor = isDark ? 'rgba(139, 107, 62, 0.2)' : 'rgba(139, 107, 62, 0.1)';
    const goldColor = '#8B6B3E';
    
    // Default data if not provided from controller
     // Destroy existing chart if any
    if(window.revenueChart) {
        window.revenueChart.destroy();
    }
    
    // Create new chart
    window.revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Revenue (₹)',
                data: revenueData,
                borderColor: goldColor,
                backgroundColor: `rgba(139, 107, 62, 0.1)`,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: goldColor,
                pointBorderColor: isDark ? '#000000' : '#ffffff',
                pointRadius: 5,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: isDark ? '#0f0f0f' : '#ffffff',
                    titleColor: goldColor,
                    bodyColor: textColor,
                    borderColor: goldColor,
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return '₹ ' + context.parsed.y.toFixed(2);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                        drawBorder: false
                    },
                    ticks: {
                        color: textColor,
                        callback: function(value) {
                            return '₹' + value;
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor
                    }
                }
            }
        }
    });
});

// Listen for theme changes
window.addEventListener('themeChanged', function() {
    // Refresh chart when theme changes
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const isDark = document.body.classList.contains('dark');
    const textColor = isDark ? '#e0e0e0' : '#4a4a4a';
    const gridColor = isDark ? 'rgba(139, 107, 62, 0.2)' : 'rgba(139, 107, 62, 0.1)';
    const goldColor = '#8B6B3E';
 
    
    if(window.revenueChart) {
        window.revenueChart.destroy();
    }
    
    window.revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                data: revenueData,
                borderColor: goldColor,
               
                backgroundColor: `rgba(139, 107, 62, 0.1)`,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: goldColor,
                pointBorderColor: isDark ? '#000000' : '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: isDark ? '#0f0f0f' : '#ffffff',
                    titleColor: goldColor,
                    bodyColor: textColor,
                    borderColor: goldColor
                }
            },
            scales: {
                y: {
                    grid: { color: gridColor },
                    ticks: { color: textColor }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: textColor }
                }
            }
        }
    });
});
</script>

@endsection