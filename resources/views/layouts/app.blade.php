<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aitken Grove Medical & Aesthetic Center')</title>
    
    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Professional medical and aesthetic services at Aitken Grove. Comprehensive healthcare for all ages.')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Aitken Grove Medical & Aesthetic Center')">
    <meta property="og:description" content="@yield('meta_description', 'Professional medical and aesthetic services at Aitken Grove. Comprehensive healthcare for all ages.')">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Aitken Grove">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Aitken Grove Medical & Aesthetic Center')">
    <meta name="twitter:description" content="@yield('meta_description', 'Professional medical and aesthetic services at Aitken Grove. Comprehensive healthcare for all ages.')">
    
    @yield('meta')
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/consultant-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caring-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/specialised-treatment-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trust-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/specialists-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/firststep-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/testimonials-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <style>
        :root {
            --primary-color: #E62D5B;
            --secondary-color: #FFFFFF;
            --accent-color: #000000;
            --header-bg: #FCEAEF;
            --max-content-width: 1440px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: var(--accent-color);
        }
        
        .container {
            max-width: var(--max-content-width);
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        .header-container {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            max-width: 1320px;
            width: calc(100% - 40px);
            padding: 0 20px;
            z-index: 1000;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 100px;
            height: 104px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid #DDDDDD
        }
        
        .logo {
            width: 301.32px;
            height: 50px;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 32px;
            align-items: center;
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-link {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-dropdown {
            position: relative;
        }
        
        .nav-dropdown > a::after {
            content: '▼';
            font-size: 12px;
            margin-left: 4px;
            transition: transform 0.3s ease;
        }
        
        .nav-dropdown > a:hover::after {
            content: '▲';
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--secondary-color);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 16px 0;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .nav-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-item {
            display: block;
            padding: 8px 20px;
            color: var(--accent-color);
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 150%;
            transition: background-color 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--primary-color);
        }
        
        .cta-button {
            background: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            border-radius: 100px;
            width: 196px;
            height: 56px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 150%;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cta-button:hover {
            background: #60C6C8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 45, 91, 0.3);
        }
        
        /* Mobile Menu Toggle Button */
        .mobile-menu-toggle {
            display: none;
            background: white;
            border: none;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .mobile-menu-toggle:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .hamburger-icon {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 24px;
            height: 18px;
            margin: auto;
        }
        
        .hamburger-icon span {
            display: block;
            width: 20px;
            height: 2px;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            transform-origin: center;
        }
        
        .hamburger-icon span:not(:last-child) {
            margin-bottom: 4px;
        }
        
        /* Mobile Drawer */
        .mobile-drawer {
            position: fixed;
            top: -20px;
            right: -20px;
            width: 320px;
            height: 100vh;
            background: white;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.15);
            z-index: 10000;
            overflow-y: auto;
            display: none;
        }
        
        .mobile-drawer.active {
            display: block !important;
        }
        
        /* Remove debug border */
        .mobile-drawer:not(.active) {
            /* border: 3px solid red !important; */
        }
        
        .mobile-drawer-content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .mobile-drawer-close {
            align-self: flex-end;
            background: none;
            border: none;
            width: 32px;
            height: 32px;
            cursor: pointer;
            color: var(--accent-color);
            margin-bottom: 20px;
        }
        
        .mobile-logo-wrapper {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .mobile-logo {
            width: 240px;
            height: 40px;
        }
        
        .mobile-navigation {
            flex: 1;
        }
        
        .mobile-nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .mobile-nav-item {
            margin-bottom: 8px;
        }
        
        .mobile-nav-link {
            display: block;
            padding: 16px 0;
            color: var(--accent-color);
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 18px;
            line-height: 150%;
            border-bottom: 1px solid #f0f0f0;
            transition: color 0.3s ease;
        }
        
        .mobile-nav-link:hover {
            color: var(--primary-color);
        }
        
        .mobile-service-submenu .mobile-nav-sublink {
            display: block;
            padding: 12px 0 12px 24px;
            color: #666;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            transition: color 0.3s ease;
        }
        
        .mobile-service-submenu .mobile-nav-sublink:hover {
            color: var(--primary-color);
        }
        
        .mobile-cta-button {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 100px;
            width: 100%;
            height: 56px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 24px;
            transition: all 0.3s ease;
        }
        
        .mobile-cta-button:hover {
            background: #60C6C8;
        }
        
        /* Mobile Overlay */
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 9999;
        }
        
        .mobile-overlay.active {
            opacity: 1;
            visibility: hidden;
        }
        
        /* Hide mobile drawer on desktop - greater than 940px */
        @media (min-width: 941px) {
            .mobile-drawer {
                display: none !important;
            }
            
            .mobile-overlay {
                display: none !important;
            }
        }
        
        /* Mobile Responsive */
        @media (max-width: 1200px) {
            .header-container {
                max-width: calc(100% - 32px);
                width: calc(100% - 32px);
                padding: 0 16px;
            }
            
            .header {
                padding: 0 24px;
            }
            
            .logo {
                width: 200px;
                height: 33px;
            }
        }
        
        @media (max-width: 940px) {
            .desktop-nav {
                display: none;
            }
            
            .desktop-cta {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
        }
        
        @media (max-width: 768px) {
            .header-container {
                top: 16px;
                width: calc(100% - 20px);
            }
            
            
            .header {
                padding: 0 16px;
                height: 80px;
                background: rgba(255, 255, 255, 0.50);
            }
            
            .mobile-drawer {
                width: 280px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @yield('content')
    
    <!-- Mobile Menu JavaScript -->
    <script>
        function toggleMobileMenu() {
            const drawer = document.getElementById('mobileDrawer');
            const overlay = document.getElementById('mobileOverlay');
            
            if (drawer && overlay) {
                const isActive = drawer.classList.contains('active');
                
                if (isActive) {
                    drawer.classList.remove('active');
                    overlay.classList.remove('active');
                    document.body.style.overflow = 'auto';
                } else {
                    drawer.classList.add('active');
                    overlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            }
        }
        
        // Close menu when clicking outside or on overlay
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('mobileOverlay');
            if (overlay) {
                overlay.addEventListener('click', toggleMobileMenu);
            }
            
            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const drawer = document.getElementById('mobileDrawer');
                    if (drawer && drawer.classList.contains('active')) {
                        toggleMobileMenu();
                    }
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
