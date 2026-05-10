<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A1makeover Admin</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ================ CUSTOM STYLES - DARK GOLD THEME ================ */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* GOLD TONES - Fixed for both themes */
            --gold-deep: #8B6B3E;
            --gold-rich: #A07D4A;
            --gold-dim: #745A31;
            --gold-glow: #B68F5C;
            
            /* DARK MODE */
            --bg-dark: #000000;
            --sidebar-dark: #0A0A0A;
            --card-dark: #0F0F0F;
            --text-dark: #FFFFFF;
            --text-soft-dark: #E0E0E0;
            --border-dark: #1E1E1E;
            --hover-dark: #151515;
            
            /* LIGHT MODE */
            --bg-light: #F8F7F4;
            --sidebar-light: #FFFFFF;
            --card-light: #FFFFFF;
            --text-light: #1A1A1A;
            --text-soft-light: #4A4A4A;
            --border-light: #E5E0D8;
            --hover-light: #F0EDE8;
        }

        /* Default theme - LIGHT (changed from dark) */
        body {
            --bg: var(--bg-light);
            --sidebar: var(--sidebar-light);
            --card: var(--card-light);
            --text: var(--text-light);
            --text-soft: var(--text-soft-light);
            --border: var(--border-light);
            --hover: var(--hover-light);
            --glow: rgba(139, 107, 62, 0.15);
            
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        /* Dark theme */
        body.dark {
            --bg: var(--bg-dark);
            --sidebar: var(--sidebar-dark);
            --card: var(--card-dark);
            --text: var(--text-dark);
            --text-soft: var(--text-soft-dark);
            --border: var(--border-dark);
            --hover: var(--hover-dark);
            --glow: rgba(160, 125, 74, 0.25);
        }

        /* ================ PREMIUM FONTS ================ */
        h1, h2, h3, h4, h5, h6, .fancy-text, .page-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        /* ================ SIDEBAR ================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 70px;
            background: var(--sidebar);
            transition: width 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            border-right: 2px solid var(--gold-rich);
            box-shadow: 2px 0 20px var(--glow);
        }

        .sidebar:hover {
            width: 240px;
        }

        /* Logo */
        .sidebar-logo {
            padding: 24px 16px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo i {
            min-width: 38px;
            text-align: center;
            font-size: 24px;
            color: var(--gold-rich);
        }

        .sidebar-logo span {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 20px;
            color: var(--gold-rich);
            text-shadow: 0 2px 5px var(--glow);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar:hover .sidebar-logo span {
            opacity: 1;
        }

        /* Menu */
        nav {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        /* Scrollbar styling */
        nav::-webkit-scrollbar {
            width: 4px;
        }

        nav::-webkit-scrollbar-track {
            background: var(--border);
        }

        nav::-webkit-scrollbar-thumb {
            background: var(--gold-rich);
            border-radius: 4px;
        }

        nav::-webkit-scrollbar-thumb:hover {
            background: var(--gold-glow);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--text-soft);
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
            margin: 4px 10px;
            border-radius: 10px;
        }

        .sidebar-link i {
            min-width: 38px;
            text-align: center;
            font-size: 20px;
            color: var(--gold-rich);
            transition: all 0.25s ease;
        }

        .sidebar-link span {
            opacity: 0;
            transition: opacity 0.3s ease;
            font-size: 15px;
            font-weight: 500;
            margin-left: 4px;
        }

        .sidebar:hover .sidebar-link span {
            opacity: 1;
        }

        .sidebar-link:hover {
            background: var(--hover);
            border-left: 3px solid var(--gold-rich);
            transform: translateX(4px);
        }

        .sidebar-link:hover i {
            color: var(--gold-glow);
            transform: scale(1.1);
        }

        .sidebar-link.active {
            background: var(--hover);
            border-left: 3px solid var(--gold-rich);
        }

        .sidebar-link.active i {
            color: var(--gold-glow);
        }

        .sidebar-link.active span {
            color: var(--gold-rich);
            font-weight: 600;
        }

        /* Logout Section */
        .logout-section {
            margin-top: auto;
            padding: 20px 12px;
            border-top: 1px solid var(--border);
            background: var(--sidebar);
        }

        .logout-btn {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background: transparent;
            border: 1.5px solid var(--gold-rich);
            color: var(--gold-rich);
            transition: all 0.25s ease;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            font-family: 'Playfair Display', serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            opacity: 0;
        }

        .sidebar:hover .logout-btn {
            opacity: 1;
        }

        .logout-btn:hover {
            background: var(--gold-rich);
            color: var(--sidebar);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px var(--glow);
        }

        .logout-btn:hover i {
            color: var(--sidebar);
        }

        /* ================ MAIN CONTENT ================ */
        .main-content {
            margin-left: 70px;
            transition: margin-left 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            max-height: 80vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - 70px);
        }

        .sidebar:hover ~ .main-content {
            margin-left: 240px;
            width: calc(100% - 240px);
        }

        /* ================ HEADER ================ */
        .admin-header {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 0 30px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 15px var(--glow);
            position: relative;
        }

        .admin-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 200px;
            height: 2px;
            background: linear-gradient(90deg, var(--gold-rich), var(--gold-dim), transparent);
        }

        .header-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 24px;
            color: var(--gold-rich);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-title i {
            color: var(--gold-rich);
            font-size: 28px;
        }

        /* Theme toggle button */
        .theme-toggle {
            background: var(--hover);
            border: 1.5px solid var(--gold-dim);
            border-radius: 40px;
            padding: 10px 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-soft);
            font-size: 14px;
            font-weight: 500;
        }

        .theme-toggle:hover {
            border-color: var(--gold-rich);
            box-shadow: 0 0 20px var(--glow);
            transform: translateY(-2px);
        }

        .theme-toggle i {
            font-size: 18px;
            color: var(--gold-rich);
        }

        /* ================ MAIN CONTENT AREA ================ */
        .content-area {
            padding: 30px;
            flex: 1;
            background: var(--bg);
        }

        /* ================ SCROLLBAR ================ */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--border);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold-rich);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-glow);
        }

        /* ================ UTILITY CLASSES ================ */
        .text-gold {
            color: var(--gold-rich);
        }

        .border-gold {
            border-color: var(--gold-rich);
        }

        /* ================ RESPONSIVE ================ */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                border-right: none;
            }
            
            .sidebar:hover {
                width: 220px;
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .sidebar:hover ~ .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
            }
            
            .admin-header {
                padding: 0 20px;
                height: 70px;
            }
            
            .header-title {
                font-size: 20px;
            }
            
            .header-title i {
                font-size: 24px;
            }
            
            .content-area {
                padding: 20px;
            }
            
            .theme-toggle span {
                display: none;
            }
            
            .theme-toggle {
                padding: 10px 15px;
            }
        }
    </style>
</head>

<!-- Laravel ke saath dynamic class -->
<body class="@auth{{ session('theme') == 'dark' ? 'dark' : '' }}@endauth">
    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <i class="fas fa-cut"></i>
                <span>A1makeover</span>
            </div>

            <nav>
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                
  <a href="{{ route('admin.trainers.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.trainers.*') ? 'active' : '' }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Trainers</span>
                </a>
                   <a href="{{ route('admin.courses.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i>
                    <span>Courses</span>
                </a>
                <a href="{{ route('admin.students.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate"></i>
                    <span>Students</span>
                </a>

                <a href="{{ route('admin.payments.indexx') }}" 
   class="sidebar-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
    <i class="fas fa-money-bill-wave"></i>
    <span>Fees / Payments</span>
</a>
             

              

                <a href="{{ route('admin.enquiries.index') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle"></i>
                    <span>Enquiries</span>
                </a>

                <a href="{{ route('admin.salary.report') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.salary.report') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Salary Report</span>
                </a>

                <a href="{{ route('admin.certificate.create') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.certificate.*') ? 'active' : '' }}">
                    <i class="fas fa-certificate"></i>
                    <span>Certificate</span>
                </a>
            </nav>

            <!-- Logout Section -->
            <div class="logout-section">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <header class="admin-header">
                <div class="header-title">
                    <i class="fas fa-graduation-cap"></i>
                    Academy Portal
                </div>

                <!-- Theme Toggle Button -->
                <div class="theme-toggle" id="themeToggle">
                    <i class="fas {{ session('theme') == 'dark' ? 'fa-sun' : 'fa-moon' }}" id="themeIcon"></i>
                    <span id="themeText">{{ session('theme') == 'dark' ? 'Light' : 'Dark' }} Mode</span>
                </div>
            </header>

            <main class="content-area">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Theme Toggle Script with AJAX for Laravel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const themeText = document.getElementById('themeText');
            const body = document.body;
            
            // Check localStorage first, then session
            const savedTheme = localStorage.getItem('admin_theme');
            const sessionTheme = '{{ session('theme') }}';
            
            // Apply theme based on priority: localStorage > session > default (light)
            if (savedTheme === 'dark' || (sessionTheme === 'dark' && !savedTheme)) {
                body.classList.add('dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                themeText.textContent = 'Light Mode';
                localStorage.setItem('admin_theme', 'dark');
            } else {
                body.classList.remove('dark');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                themeText.textContent = 'Dark Mode';
                localStorage.setItem('admin_theme', 'light');
            }
            
            // Toggle theme
            themeToggle.addEventListener('click', function() {
                // Add animation
                this.style.transform = 'scale(0.95)';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
                
                // Toggle dark class
                body.classList.toggle('dark');
                
                // Update icons and text
                if (body.classList.contains('dark')) {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                    themeText.textContent = 'Light Mode';
                    localStorage.setItem('admin_theme', 'dark');
                } else {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                    themeText.textContent = 'Dark Mode';
                    localStorage.setItem('admin_theme', 'light');
                }
                
                // Send theme preference to server (optional - for session)
                fetch('/update-theme', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        theme: body.classList.contains('dark') ? 'dark' : 'light'
                    })
                }).catch(error => console.log('Theme sync error:', error));
            });
        });
    </script>

    <!-- Add this route in web.php if you want session sync:
        Route::post('/update-theme', function(Request $request) {
            session(['theme' => $request->theme]);
            return response()->json(['success' => true]);
        })->middleware('auth');
    -->
</body>
</html>