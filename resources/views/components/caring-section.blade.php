@props(['section'])

<section class="caring-section">
    <div class="caring-container">
        <!-- Left Column: Content -->
        <div class="caring-content">
            <h2 class="caring-title">
                <span class="title-line-1">{{ explode(',', $section->content_json['title'] ?? 'Caring for You, Every Step of the Way')[0] ?? 'Caring for You' }},</span><br>
                <span class="title-line-2">{{ explode(',', $section->content_json['title'] ?? 'Caring for You, Every Step of the Way')[1] ?? ' Every Step of the Way' }}</span>
            </h2>
            
            <p class="caring-description">
                {{ $section->content_json['description'] ?? 'We provide trusted healthcare for all ages. Our team combines experience, compassion, and modern treatments to keep you and your family healthy.' }}
            </p>
            
            <div class="caring-points">
                @if(isset($section->content_json['points']) && is_array($section->content_json['points']))
                    @foreach($section->content_json['points'] as $point)
                        <div class="caring-point">
                            <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="caring-point-icon">
                            <span class="point-text">{{ $point['text'] }}</span>
                        </div>
                    @endforeach
                @else
                    <!-- Default points if none are set -->
                    <div class="caring-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="caring-point-icon">
                        <span class="point-text">Care for children, adults & seniors</span>
                    </div>
                    <div class="caring-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="caring-point-icon">
                        <span class="point-text">Experienced doctors across specialities</span>
                    </div>
                    <div class="caring-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="caring-point-icon">
                        <span class="point-text">Advanced facilities & modern treatments</span>
                    </div>
                    <div class="caring-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="caring-point-icon">
                        <span class="point-text">Preventive & personalized care plans</span>
                    </div>
                    <div class="caring-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="caring-point-icon">
                        <span class="point-text">Patient-centered approach with personalized care plans</span>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Right Column: Images -->
        <div class="caring-images">
            <!-- Left Image Column -->
            <div class="image-column-left">
                @if(isset($section->content_json['main_image']) && $section->content_json['main_image'])
                    <img src="{{ asset('storage/' . $section->content_json['main_image']) }}" alt="Healthcare Professional" class="caring-image-main">
                @else
                    <img src="{{ asset('images/caring1.png') }}" alt="Healthcare Professional" class="caring-image-main">
                @endif
            </div>
            
            <!-- Right Image Column -->
            <div class="image-column-right">
                @if(isset($section->content_json['top_right_image']) && $section->content_json['top_right_image'])
                    <img src="{{ asset('storage/' . $section->content_json['top_right_image']) }}" alt="Patient Consultation" class="caring-image-top">
                @else
                    <img src="{{ asset('images/caring2.png') }}" alt="Patient Consultation" class="caring-image-top">
                @endif
                
                @if(isset($section->content_json['bottom_right_image']) && $section->content_json['bottom_right_image'])
                    <img src="{{ asset('storage/' . $section->content_json['bottom_right_image']) }}" alt="Medical Care" class="caring-image-bottom">
                @else
                    <img src="{{ asset('images/caring3.png') }}" alt="Medical Care" class="caring-image-bottom">
                @endif
            </div>
        </div>
    </div>
</section>
