@props(['page'])

<section class="consultant-bar">
    <div class="consultant-bar-background">
        <img src="/images/bar.png" alt="Consultant Bar Background">
    </div>
    
    <div class="consultant-bar-content">
        <!-- Left Side - Opening Hours -->
        <div class="opening-hours">
            <div class="icon">
                <img src="/icons/clock.png" alt="Opening Hours">
            </div>
            <div class="text">
                <span>Opening Hours:</span>
                <span>{{ $page->opening_hours ?? 'Mon-Fri 9AM-6PM' }}</span>
            </div>
        </div>
        
        <!-- Center - CTA Button -->
        <div class="consultant-cta">
            <a href="{{ $page->hero_cta_url ?? '#book-appointment' }}" class="consultant-btn">
                {{ $page->hero_cta_label ?? 'Book Consultation' }}
            </a>
        </div>
        
        <!-- Right Side - Contact Info -->
        <div class="contact-info">
            <!-- Phone -->
            <div class="contact-item">
                <div class="icon">
                    <img src="/icons/phone.png" alt="Phone">
                </div>
                <div class="text">
                    <span>{{ $page->contact_phone ?? '+1 (555) 123-4567' }}</span>
                </div>
            </div>
            
            <!-- Email -->
            <div class="contact-item">
                <div class="icon">
                    <img src="/icons/email.png" alt="Email">
                </div>
                <div class="text">
                    <span>{{ $page->contact_email ?? 'info@aitkengrove.com' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
