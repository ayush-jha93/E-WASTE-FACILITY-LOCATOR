<?php
// Set Security Headers
header_remove('X-Powered-By');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Content-Security-Policy: default-src 'self' https:; script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://unpkg.com; style-src 'self' 'unsafe-inline' https:; img-src 'self' data: https: blob:; frame-src https://www.youtube.com;");

$current_page = basename($_SERVER['SCRIPT_FILENAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/kisspng-earth-world-map-globe-vector-hand-planet-5a9af8cfde0632.1928504515201056799094.png" rel="icon" type="image/png">
    <title><?= htmlspecialchars($page_title ?? 'EcoRecycle | E-Waste Management India') ?></title>
    
    <!-- Tailwind CSS Standard CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.2/lottie.min.js"></script>
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .glass-nav {
            background: #ffffff;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
        }
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #10b981;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link.active {
            color: #10b981;
            font-weight: 600;
        }
        .nav-link.active::after {
            width: 100%;
        }
        
        /* Animation utilities */
        .animate-slow-zoom {
            animation: slow-zoom 20s infinite alternate;
        }
        @keyframes slow-zoom {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">
    <!-- Navigation -->
    <nav class="glass-nav border-b border-emerald-100 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="index.php" class="flex items-center gap-3 group">
                <div class="bg-emerald-600 p-2 rounded-lg transition-transform group-hover:rotate-12">
                    <i class="fas fa-recycle text-white text-xl"></i>
                </div>
                <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-500">EcoRecycle</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="index.php" class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?> text-slate-600 hover:text-emerald-600">Home</a>
                <a href="Facility.php" class="nav-link <?= ($current_page == 'Facility.php') ? 'active' : '' ?> text-slate-600 hover:text-emerald-600">Facilities</a>
                <a href="Resources.php" class="nav-link <?= ($current_page == 'Resources.php') ? 'active' : '' ?> text-slate-600 hover:text-emerald-600">Resources</a>
                <a href="contact.php" class="nav-link <?= ($current_page == 'contact.php') ? 'active' : '' ?> text-slate-600 hover:text-emerald-600">Contact</a>
                <a href="Facility.php" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-full font-medium transition-all shadow-md hover:shadow-lg">
                    Locate Center
                </a>
            </div>
            
            <button id="mobileMenuBtn" aria-expanded="false" aria-controls="mobileMenu" aria-label="Toggle navigation menu" class="md:hidden text-emerald-600 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden bg-white border-t border-emerald-50 px-4 py-6 space-y-4">
            <a href="index.php" class="block py-2 text-slate-600 hover:text-emerald-600 font-medium <?= ($current_page == 'index.php') ? 'text-emerald-600' : '' ?>">Home</a>
            <a href="Facility.php" class="block py-2 text-slate-600 hover:text-emerald-600 font-medium <?= ($current_page == 'Facility.php') ? 'text-emerald-600' : '' ?>">Facilities</a>
            <a href="Resources.php" class="block py-2 text-slate-600 hover:text-emerald-600 font-medium <?= ($current_page == 'Resources.php') ? 'text-emerald-600' : '' ?>">Resources</a>
            <a href="contact.php" class="block py-2 text-slate-600 hover:text-emerald-600 font-medium <?= ($current_page == 'contact.php') ? 'text-emerald-600' : '' ?>">Contact</a>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
                    mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
