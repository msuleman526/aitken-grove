@php
    $content = $section->content_json ?? [];
    $buttonText = $content['button_text'] ?? 'About Us';
    $titleParts = $content['title_parts'] ?? [
        ['text' => 'Your Health,', 'color' => '#000000'],
        ['text' => 'Our Promise', 'color' => '#E62D5B'],
        ['text' => 'for a', 'color' => '#000000'],
        ['text' => 'Better Tomorrow', 'color' => '#17687F']
    ];
    $description = $content['description'] ?? 'Dedicated to caring for you and your family with compassion, trust, and medical excellence.';
    $heroImage = $content['hero_image'] ?? '/images/about-hero.png';
@endphp

<section class="about-hero-section">
    <div class="about-hero-container">
        <!-- Left Column -->
        <div class="about-hero-left">
            <!-- About Us Button -->
            <div class="about-hero-button">
                {{ $buttonText }}
            </div>
            
            <!-- Title -->
            <h1 class="about-hero-title">
                @foreach($titleParts as $part)
                    <span style="color: {{ $part['color'] }};">{{ $part['text'] }}</span>
                    @if(!$loop->last) @endif
                @endforeach
            </h1>
            
            <!-- Description -->
            <p class="about-hero-description">
                {{ $description }}
            </p>
        </div>
        
        <!-- Right Column -->
        <div class="about-hero-right">
            <img src="{{ asset($heroImage) }}" alt="About Us" class="about-hero-image">
        </div>
    </div>
</section>