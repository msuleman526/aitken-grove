<footer class="footer-wrapper">
    {{-- Consultant CTA Section --}}
    <section class="consultant-cta-section">
        <div class="consultant-container">
            <div class="consultant-image">
                <img src="{{ asset('images/consultant.png') }}" alt="Book a Consultant" width="141" height="90">
            </div>
            <h2 class="consultant-title">
                Book a <span class="consultant-title-primary">Consultant Today</span>
            </h2>
            <p class="consultant-description">
                Take the first step towards better health with our experienced doctors. Whether it's a routine check-up or a specialist consultation, we make booking quick, simple, and stress-free.
            </p>
            <a href="/book-consultation" class="consultant-button">
                Book a Consultant
            </a>
        </div>
    </section>

    {{-- Separator --}}
    <div class="footer-separator"></div>

    {{-- Main Footer Content --}}
    <div class="footer-content">
        <div class="footer-container">
            <div class="footer-row">
                {{-- Left Column --}}
                <div class="footer-left">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Aitken Grove Medical & Aesthetic Center" width="301" height="50">
                    </div>
                    <p class="footer-description">
                        Providing trusted, patient-focused healthcare with expert doctors, modern facilities, and compassionate care for the community.
                    </p>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <img src="{{ asset('icons/footer/phone.png') }}" alt="Phone" width="24" height="24">
                            <span>+1 234 5678 900</span>
                        </div>
                        <div class="contact-item">
                            <img src="{{ asset('icons/footer/mail.png') }}" alt="Email" width="24" height="24">
                            <span>contact@aitkengrove.com</span>
                        </div>
                        <div class="contact-item">
                            <img src="{{ asset('icons/footer/location.png') }}" alt="Location" width="24" height="24">
                            <span>123 Health Street, City Center, Melbourne, VIC 3000, Australia</span>
                        </div>
                    </div>
                </div>

                {{-- Right Column --}}
                <div class="footer-right">
                    {{-- Quick Links --}}
                    <div class="footer-menu">
                        <h3 class="footer-menu-title">Quick Links</h3>
                        <ul class="footer-menu-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/book-consultation">Book a Consultant</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/blogs">Blogs</a></li>
                        </ul>
                    </div>

                    {{-- Services --}}
                    <div class="footer-menu services-menu">
                        <h3 class="footer-menu-title">Services</h3>
                        @php
                            $services = [
                                ['url' => '/services/family-health', 'name' => 'Family Health Care'],
                                ['url' => '/services/aesthetics-cosmetics', 'name' => 'Aesthetics / Cosmetics'],
                                ['url' => '/services/circumcision-clinic', 'name' => 'Circumcision Clinic'],
                                ['url' => '/services/skin-cancer-care', 'name' => 'Skin Cancer Care'],
                                ['url' => '/services/immunisation', 'name' => 'Immunisation'],
                                ['url' => '/services/travel-advice', 'name' => 'Travel Advice'],
                                ['url' => '/services/weight-loss-clinic', 'name' => 'Weight Loss Clinic'],
                                ['url' => '/services/medical-cannabis', 'name' => 'Medical Cannabis'],
                                ['url' => '/services/pregnancy-care', 'name' => 'Pregnancy Care'],
                                ['url' => '/services/mens-health', 'name' => 'Men\'s Health'],
                                ['url' => '/services/womens-health', 'name' => 'Women\'s Health'],
                                ['url' => '/services/iron-infusion', 'name' => 'Iron Infusion'],
                                ['url' => '/services/mental-health', 'name' => 'Mental Health'],
                                ['url' => '/services/work-cover-tac', 'name' => 'Work Cover & TAC']
                            ];
                            $serviceCount = count($services);
                            $shouldSplit = $serviceCount > 5;
                            $firstColumnCount = $shouldSplit ? ceil($serviceCount / 2) : $serviceCount;
                        @endphp
                        
                        @if($shouldSplit)
                            <div class="services-columns">
                                <ul class="footer-menu-list services-column-1">
                                    @for($i = 0; $i < $firstColumnCount; $i++)
                                        @if(isset($services[$i]))
                                            <li><a href="{{ $services[$i]['url'] }}">{{ $services[$i]['name'] }}</a></li>
                                        @endif
                                    @endfor
                                </ul>
                                <ul class="footer-menu-list services-column-2">
                                    @for($i = $firstColumnCount; $i < $serviceCount; $i++)
                                        @if(isset($services[$i]))
                                            <li><a href="{{ $services[$i]['url'] }}">{{ $services[$i]['name'] }}</a></li>
                                        @endif
                                    @endfor
                                </ul>
                            </div>
                        @else
                            <ul class="footer-menu-list">
                                @foreach($services as $service)
                                    <li><a href="{{ $service['url'] }}">{{ $service['name'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Separator --}}
    <div class="footer-separator"></div>

    {{-- Footer Bottom --}}
    <div class="footer-bottom">
        <div class="footer-container">
            <div class="footer-bottom-content">
                <div class="footer-copyright">
                    © 2024 Aitken Grove. All rights reserved.
                </div>
                <div class="footer-legal">
                    <a href="/terms-conditions">Terms & Conditions</a>
                    <a href="/privacy-policy">Privacy Policy</a>
                    <a href="/cookie-policy">Cookie Policy</a>
                </div>
                <div class="footer-social">
                    <a href="#" class="social-link">
                        <img src="{{ asset('icons/footer/facebook.png') }}" alt="Facebook" width="36" height="36">
                    </a>
                    <a href="#" class="social-link">
                        <img src="{{ asset('icons/footer/instagram.png') }}" alt="Instagram" width="36" height="36">
                    </a>
                    <a href="#" class="social-link">
                        <img src="{{ asset('icons/footer/twitter.png') }}" alt="Twitter" width="58" height="36">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
