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
