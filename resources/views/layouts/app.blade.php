<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aitken Grove Medical & Aesthetic Center')</title>
    
    <!-- Meta -->
    @yield('meta')
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/cal-sans" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/consultant-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caring-section.css') }}">
    <link rel="stylesheet" href="{{ asset('css/specialised-treatment-section.css') }}">
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
        
        .header-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        .header-wrapper {
            background: var(--header-bg);
            width: 100%;
            max-height: 136px;
            padding: 30px 0;
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
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
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
            font-weight: 500;
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
            background: #d02554;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 45, 91, 0.3);
        }
        
        /* Mobile Responsive */
        @media (max-width: 1200px) {
            .header-container {
                max-width: 100%;
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
        
        @media (max-width: 768px) {
            .header {
                padding: 0 16px;
                height: 80px;
            }
            
            .nav-menu {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 24px;
                color: var(--accent-color);
                cursor: pointer;
            }
            
            .cta-button {
                width: 140px;
                height: 44px;
                font-size: 12px;
            }
        }
        
        .mobile-menu-toggle {
            display: none;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @yield('content')
    
    @stack('scripts')
</body>
</html>
