@php
    $content = is_array($section->content_json) ? $section->content_json : json_decode($section->content_json, true);
    
    // Default content
    $defaultTitle = 'Take the First Step Toward Better Health';
    $defaultDescription = 'Book your appointment with our trusted doctors today and get the right care without long waits.';
    $defaultCtaLabel = 'Book a Consultant';
    $defaultCtaUrl = '#';
    
    $title = $content['title'] ?? $defaultTitle;
    $description = $content['description'] ?? $defaultDescription;
    $ctaLabel = $content['cta_label'] ?? $defaultCtaLabel;
    $ctaUrl = $content['cta_url'] ?? $defaultCtaUrl;
@endphp

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/firststep-section.css') }}">
@endpush

<section class="firststep-section">
    <div class="firststep-container">
        <div class="firststep-background">
            <div class="firststep-content">
                <h2 class="firststep-title">{{ $title }}</h2>
                <p class="firststep-description">{{ $description }}</p>
                <a href="{{ $ctaUrl }}" class="firststep-btn">{{ $ctaLabel }}</a>
            </div>
        </div>
    </div>
</section>
