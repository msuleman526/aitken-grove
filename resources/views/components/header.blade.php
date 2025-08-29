<div class="header-wrapper">
    <div class="header-container">
        <header class="header">
            <!-- Logo -->
            <div class="logo-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Aitken Grove Medical & Aesthetic Center" class="logo">
            </div>
            
            <!-- Navigation Menu -->
            <nav class="navigation">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown">Services</a>
                        <div class="dropdown-menu">
                            <a href="/medical-services" class="dropdown-item">Medical Services</a>
                            <a href="/aesthetic-treatments" class="dropdown-item">Aesthetic Treatments</a>
                            <a href="/wellness-programs" class="dropdown-item">Wellness Programs</a>
                            <a href="/consultations" class="dropdown-item">Consultations</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </nav>
            
            <!-- CTA Button -->
            <a href="/book-consultation" class="cta-button">
                Book a Consultant
            </a>
            
            <!-- Mobile Menu Toggle (hidden on desktop) -->
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                ☰
            </button>
        </header>
    </div>
</div>
