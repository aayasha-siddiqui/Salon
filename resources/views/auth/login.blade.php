<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>A1 Makeover | Premium Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    /* Dark Gold Theme - Exactly as before */
    --gold-deep: #8B6B3E;
    --gold-rich: #A07D4A;
    --gold-dim: #745A31;
    --gold-glow: #B68F5C;
    --bg-dark: #000000;
    --card-dark: #0F0F0F;
    --text-dark: #FFFFFF;
    --text-soft: #E0E0E0;
    --border-dark: #1E1E1E;
}

body {
    background: var(--bg-dark);
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Premium Background with Animated Particles */
.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: var(--gold-dim);
    border-radius: 50%;
    pointer-events: none;
    animation: particleFloat 8s infinite linear;
}

@keyframes particleFloat {
    0% {
        transform: translateY(0) translateX(0);
        opacity: 0;
    }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% {
        transform: translateY(-100vh) translateX(100px);
        opacity: 0;
    }
}

/* Premium Typography */
.brand {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    letter-spacing: 0.5px;
}

.gold {
    color: var(--gold-rich);
}

.gold-text {
    background: linear-gradient(135deg, var(--gold-deep), var(--gold-glow));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Main Card Styling - TILTED */
.premium-card {
    background: var(--card-dark);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.5),
        0 0 0 2px var(--gold-dim),
        0 0 20px var(--gold-dim);
    transform: rotate(-1deg) skewX(-0.5deg);
    transition: transform 0.5s ease;
}

.premium-card:hover {
    transform: rotate(0deg) skewX(0deg);
    box-shadow: 
        0 30px 70px rgba(160, 125, 74, 0.3),
        0 0 0 2px var(--gold-rich);
}

/* LEFT IMAGE SECTION - TILTED OPPOSITE */
.image-section {
    position: relative;
    overflow: hidden;
    min-height: 220px;
    transform: skewX(6deg) scale(1.05);
    margin-left: -10px;
    border-right: 2px solid var(--gold-dim);
}

.image-section img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1.1) skewX(-1deg);
    transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.image-section:hover img {
    transform: scale(1.15) skewX(-1deg);
}

/* Gold Overlay Pattern */
.overlay-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        linear-gradient(45deg, rgba(139, 107, 62, 0.15) 25%, transparent 25%),
        linear-gradient(-45deg, rgba(139, 107, 62, 0.15) 25%, transparent 25%);
    background-size: 30px 30px;
    pointer-events: none;
}

/* Luxury Badge */
.luxury-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(139, 107, 62, 0.2);
    backdrop-filter: blur(10px);
    padding: 8px 18px;
    border-radius: 40px;
    border: 1px solid var(--gold-dim);
    z-index: 20;
    animation: badgePulse 2s ease-in-out infinite;
}

@keyframes badgePulse {
    0%, 100% { box-shadow: 0 0 10px var(--gold-dim); }
    50% { box-shadow: 0 0 20px var(--gold-rich); }
}

/* RIGHT FORM SECTION - TILTED */
.form-section {
    padding: 2.5rem;
    transform: skewX(-0.5deg) translateX(5px);
    background: var(--card-dark);
}

/* Gold Button */
.gold-btn {
    position: relative;
    background: linear-gradient(135deg, var(--gold-deep), var(--gold-rich), var(--gold-glow));
    background-size: 200% 200%;
    animation: gradientShift 4s ease infinite;
    color: white;
    font-weight: 600;
    padding: 14px 24px;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: none;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(139, 107, 62, 0.3);
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.gold-btn:hover {
    transform: scale(1.02) translateY(-3px) skewX(1deg);
    box-shadow: 0 15px 30px rgba(160, 125, 74, 0.5);
}

.gold-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.7s ease;
}

.gold-btn:hover::before {
    left: 150%;
}

/* Input Fields */
.input-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.input-group i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gold-rich);
    font-size: 1.1rem;
    z-index: 10;
    transition: all 0.3s ease;
}

.input-group input {
    width: 100%;
    padding: 14px 16px 14px 48px;
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid var(--border-dark);
    border-radius: 12px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    color: var(--text-dark);
}

.input-group input:focus {
    border-color: var(--gold-rich);
    box-shadow: 
        0 0 0 4px rgba(160, 125, 74, 0.1),
        0 5px 15px rgba(139, 107, 62, 0.2);
    outline: none;
    transform: scale(1.02) skewX(-0.5deg);
    background: rgba(255, 255, 255, 0.1);
}

.input-group input:focus + i {
    transform: translateY(-50%) scale(1.1) rotate(5deg);
    color: var(--gold-glow);
}

.input-group input::placeholder {
    color: rgba(255, 255, 255, 0.3);
    font-weight: 300;
}

/* Floating Orbs - Dark Gold Theme */
.floating-orb {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    z-index: 1;
}

.orb-1 {
    width: 400px;
    height: 400px;
    top: -150px;
    left: -150px;
    background: radial-gradient(circle at 30% 30%, var(--gold-dim), transparent 70%);
    animation: orbFloat1 25s infinite linear;
    opacity: 0.2;
}

.orb-2 {
    width: 500px;
    height: 500px;
    bottom: -200px;
    right: -200px;
    background: radial-gradient(circle at 70% 70%, var(--gold-deep), transparent 70%);
    animation: orbFloat2 30s infinite reverse;
    opacity: 0.15;
}

@keyframes orbFloat1 {
    0% { transform: rotate(0deg) translate(30px) rotate(0deg); }
    100% { transform: rotate(360deg) translate(30px) rotate(-360deg); }
}

@keyframes orbFloat2 {
    0% { transform: rotate(0deg) translate(50px) rotate(0deg); }
    100% { transform: rotate(-360deg) translate(50px) rotate(360deg); }
}

/* Shimmer Effect */
.shimmer {
    position: absolute;
    top: 0;
    left: -100%;
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: skewX(-25deg);
    animation: shimmerMove 6s infinite;
}

@keyframes shimmerMove {
    100% { left: 150%; }
}

/* Stats Counter */
.stats-container {
    position: absolute;
    bottom: 30px;
    left: 30px;
    display: flex;
    gap: 20px;
    z-index: 20;
    transform: skewX(-1deg);
}

.stat-item {
    text-align: center;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    padding: 8px 15px;
    border-radius: 10px;
    border: 1px solid var(--gold-dim);
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--gold-rich);
    line-height: 1;
}

.stat-label {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.8);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Decorative Lines */
.decor-line {
    position: absolute;
    width: 100px;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold-rich), transparent);
}

.decor-line-1 {
    top: 20px;
    left: 20px;
    transform: rotate(-5deg);
}

.decor-line-2 {
    bottom: 20px;
    right: 20px;
    transform: rotate(85deg);
}

/* Welcome Header */
.welcome-header {
    border-left: 4px solid var(--gold-rich);
    padding-left: 20px;
    transform: skewX(-1deg);
}

/* Responsive */
@media (max-width: 768px) {
    .floating-orb {
        display: none;
    }
    
    .premium-card {
        transform: none;
        margin: 15px;
    }
    
    .image-section {
        min-height: 250px;
        transform: none;
        margin-left: 0;
    }
    
    .form-section {
        transform: none;
        padding: 1.5rem;
    }
    
    .stats-container {
        bottom: 15px;
        left: 15px;
        transform: none;
    }
    
    .stat-value {
        font-size: 1.2rem;
    }
}

/* Checkbox Styling */
.accent-gold {
    accent-color: var(--gold-rich);
}

/* Links */
.gold-link {
    color: var(--gold-rich);
    transition: all 0.3s ease;
}

.gold-link:hover {
    color: var(--gold-glow);
    text-decoration: underline;
    transform: translateX(2px);
}

/* Loading Animation */
@keyframes spin {
    to { transform: rotate(360deg); }
}

.fa-spinner {
    animation: spin 1s linear infinite;
}

/* Corner Accents */
.corner-accent {
    position: absolute;
    width: 50px;
    height: 50px;
    border: 2px solid var(--gold-dim);
    opacity: 0.3;
}

.corner-tl {
    top: 20px;
    left: 20px;
    border-right: none;
    border-bottom: none;
}

.corner-br {
    bottom: 20px;
    right: 20px;
    border-left: none;
    border-top: none;
}
</style>

</head>
<body>

<!-- Particle Background -->
<div id="particles"></div>

<!-- Floating Orbs -->
<div class="floating-orb orb-1"></div>
<div class="floating-orb orb-2"></div>

<!-- Main Container -->
<div class="container mx-auto px-5 relative z-10">

    <!-- Premium Card - TILTED -->
    <div class="premium-card max-w-5xl mx-auto grid md:grid-cols-2">
        
        <!-- LEFT IMAGE SECTION - TILTED -->
        <div class="image-section relative group">
            
            <!-- Background Image -->
            <img
            src="https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
            alt="A1 Makeover Luxury Salon">
            
            <!-- Gold Pattern Overlay -->
            <div class="overlay-pattern"></div>
            
            <!-- Shimmer Effect -->
            <div class="shimmer"></div>
            
            <!-- Luxury Badge -->
            <div class="luxury-badge">
                <i class="fas fa-crown text-xs mr-1" style="color: var(--gold-rich);"></i>
                

            </div>
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent flex items-end">
                
                <div class="p-8 text-white">
                    
                    <!-- Animated Icon -->
                    <div class="mb-4 relative">
                        <i class="fas fa-spa text-5xl" style="color: var(--gold-rich);"></i>
                        <i class="fas fa-sparkles absolute -top-2 -right-2 text-xs" style="color: var(--gold-glow);"></i>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl brand mb-2 tracking-wider gold-text">
                        A1 Makeover
                    </h2>
                    
                    <p class="text-sm uppercase tracking-[3px] text-gray-400 mb-4">
                        Where Beauty Meets Luxury
                    </p>
                    
                    <!-- Premium Features -->
                    <div class="flex gap-4 mt-4">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle" style="color: var(--gold-rich);"></i>
                            <span class="text-xs text-gray-300">Expert Stylists</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle" style="color: var(--gold-rich);"></i>
                            <span class="text-xs text-gray-300">Premium Products</span>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- Stats Counter -->
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-value">15+</div>
                    <div class="stat-label">Years</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">50K+</div>
                    <div class="stat-label">Clients</div>
                </div>
            </div>
            
        </div>
        
        <!-- RIGHT FORM SECTION - TILTED -->
        <div class="form-section relative">
            
            <!-- Corner Accents -->
            <div class="corner-accent corner-tl"></div>
            <div class="corner-accent corner-br"></div>
            
            <!-- Decorative Lines -->
            <div class="decor-line decor-line-1"></div>
            <div class="decor-line decor-line-2"></div>
            
            <!-- Welcome Header -->
            <div class="welcome-header mb-8">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-crown" style="color: var(--gold-rich);"></i>
                    <span class="text-xs uppercase tracking-[3px] text-gray-500">Premium Access</span>
                </div>
                
                <h1 class="text-3xl md:text-4xl brand mb-2 gold-text">
                    Welcome Back
                </h1>
                
                <p class="text-gray-400 text-sm flex items-center gap-2">
                    <i class="fas fa-gem" style="color: var(--gold-rich);"></i>
                    Sign in to your account
                </p>
            </div>
            
            <!-- Login Form -->
            <form method="POST" action="/login" class="space-y-4">
                @csrf
                
                <!-- Email Input with Icon -->
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required>
                </div>
                
                <!-- Password Input with Icon -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required>
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="accent-gold w-4 h-4">
                        <span class="text-gray-400">Remember me</span>
                    </label>
                    
                  
                </div>
                
                <!-- Premium Login Button -->
                <button
                type="submit"
                class="gold-btn w-full mt-6 relative group">
                    
                    <span class="relative z-10 flex items-center justify-center gap-3 text-base">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </span>
                    
                </button>
                
            </form>
            
            <!-- Sign Up Link -->
           
            <!-- Decorative Element -->
            <div class="absolute bottom-6 right-6 opacity-10">
                <i class="fas fa-cut text-6xl" style="color: var(--gold-rich);"></i>
            </div>
            
        </div>
        
    </div>
    
    <!-- Footer Text -->
    <div class="text-center mt-6 text-gray-600 text-xs tracking-wider">
        <i class="fas fa-copyright mr-1"></i>
        2026 A1 Makeover Luxury Salon
    </div>
    
</div>

<!-- Scripts -->
<script>
// Particle Background
document.addEventListener('DOMContentLoaded', function() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = 30;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 5 + 's';
        
        const size = Math.random() * 4 + 2;
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';
        
        particlesContainer.appendChild(particle);
    }
    
    // Input animations
    const inputs = document.querySelectorAll('.input-group input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02) skewX(-0.5deg)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1) skewX(0deg)';
        });
    });
    
    // Loading effect on form submit
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    form.addEventListener('submit', function(e) {
        submitBtn.innerHTML = '<span class="flex items-center justify-center gap-2"><i class="fas fa-spinner"></i> Please wait...</span>';
        submitBtn.disabled = true;
    });
});
</script>

</body>
</html>