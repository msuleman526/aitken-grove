<div class="header-container">
        <header class="header">
            <!-- Logo -->
            <div class="logo-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Aitken Grove Medical & Aesthetic Center" class="logo">
            </div>
            
            <!-- Navigation Menu (hidden on mobile) -->
            <nav class="navigation desktop-nav">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="{{ route('services.index') }}" class="nav-link nav-dropdown">Services</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('services.show', 'family-health-care') }}" class="dropdown-item">Family Health Care</a>
                            <a href="{{ route('services.show', 'aesthetics-cosmetics') }}" class="dropdown-item">Aesthetics /Cosmetics</a>
                            <a href="{{ route('services.show', 'circumcision-clinic') }}" class="dropdown-item">Circumcision Clinic</a>
                            <a href="{{ route('services.show', 'skin-cancer-care') }}" class="dropdown-item">Skin Cancer Care</a>
                            <a href="{{ route('services.show', 'immunisation') }}" class="dropdown-item">Immunisation</a>
                            <a href="{{ route('services.index') }}" class="dropdown-item" style="color: #E62D5B">View All Services</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/about-us" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </nav>
            
            <!-- CTA Button (hidden on mobile) -->
            <a href="/contact" class="cta-button desktop-cta">
                Book a Consultant
            </a>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" onclick="toggleMobileMenu()">
                <div class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </header>

        <!-- Mobile Drawer Menu -->
        <div class="mobile-drawer" id="mobileDrawer">
            <div class="mobile-drawer-content">
                <!-- Close Button -->
                <button class="mobile-drawer-close" onclick="toggleMobileMenu()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- Mobile Logo -->
                <div class="mobile-logo-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Aitken Grove Medical & Aesthetic Center" class="mobile-logo">
                </div>
                
                <!-- Mobile Navigation -->
                <nav class="mobile-navigation">
                    <ul class="mobile-nav-menu">
                        <li class="mobile-nav-item">
                            <a href="/" class="mobile-nav-link" onclick="toggleMobileMenu()">Home</a>
                        </li>
                        <li class="mobile-nav-item">
                            <a href="{{ route('services.index') }}" class="mobile-nav-link" onclick="toggleMobileMenu()">Services</a>
                        </li>
                        <li class="mobile-nav-item mobile-service-submenu">
                            <a href="{{ route('services.show', 'family-health-care') }}" class="mobile-nav-sublink" onclick="toggleMobileMenu()">Family Health Care</a>
                        </li>
                        <li class="mobile-nav-item mobile-service-submenu">
                            <a href="{{ route('services.show', 'aesthetics-cosmetics') }}" class="mobile-nav-sublink" onclick="toggleMobileMenu()">Aesthetics /Cosmetics</a>
                        </li>
                        <li class="mobile-nav-item mobile-service-submenu">
                            <a href="{{ route('services.show', 'circumcision-clinic') }}" class="mobile-nav-sublink" onclick="toggleMobileMenu()">Circumcision Clinic</a>
                        </li>
                        <li class="mobile-nav-item mobile-service-submenu">
                            <a href="{{ route('services.show', 'skin-cancer-care') }}" class="mobile-nav-sublink" onclick="toggleMobileMenu()">Skin Cancer Care</a>
                        </li>
                        <li class="mobile-nav-item mobile-service-submenu">
                            <a href="{{ route('services.show', 'immunisation') }}" class="mobile-nav-sublink" onclick="toggleMobileMenu()">Immunisation</a>
                        </li>
                        <li class="mobile-nav-item">
                            <a href="/about-us" class="mobile-nav-link" onclick="toggleMobileMenu()">About Us</a>
                        </li>
                        <li class="mobile-nav-item">
                            <a href="/contact" class="mobile-nav-link" onclick="toggleMobileMenu()">Contact Us</a>
                        </li>
                    </ul>
                </nav>
                
                <!-- Mobile CTA Button -->
                <a href="/contact" class="mobile-cta-button" onclick="toggleMobileMenu()">
                    Book a Consultant
                </a>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div class="mobile-overlay" id="mobileOverlay" onclick="toggleMobileMenu()"></div>
</div>
