@props(['service'])

<section class="service-cta-section">
    <div class="service-cta-container">
        <div class="service-cta-background">
            <div class="service-cta-content">
                <h2 class="service-cta-title">
                    {{ $service->consultant_json['title'] ?? 'Start Your Family\'s Care Today' }}
                </h2>
                <p class="service-cta-description">
                    {{ $service->consultant_json['description'] ?? 'Take the first step toward better family health. Our dedicated doctors are here to provide personalized care and guidance.' }}
                </p>
                <a href="#" class="service-cta-btn">Book a Consultant</a>
            </div>
        </div>
    </div>
</section>
