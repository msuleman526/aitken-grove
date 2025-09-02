@props(['service'])

<section class="why-choose-section">
    <div class="why-choose-container">
        <!-- Left Column: Content -->
        <div class="why-choose-content">
            <h2 class="why-choose-title">
                @if(isset($service->why_choose_json['title']) && $service->why_choose_json['title'])
                    @php
                        $title = $service->why_choose_json['title'];
                        $titleParts = explode('?', $title);
                        $mainTitle = $titleParts[0] ?? $title;
                        $questionPart = isset($titleParts[1]) ? '?' : '';
                        
                        // Split the main title to make "Family Health Care" pink
                        $highlightedTitle = str_ireplace('Family Health Care', '<span class="title-highlight">Family Health Care</span>', $mainTitle);
                    @endphp
                    
                    <span class="title-line-1">Why Choose Our</span><br>
                    <span class="title-line-2">{!! $highlightedTitle !!}{{ $questionPart }}</span>
                @else
                    <span class="title-line-1">Why Choose Our</span><br>
                    <span class="title-line-2"><span class="title-highlight">Family Health Care</span>?</span>
                @endif
            </h2>
            
            <p class="why-choose-description">
                {{ $service->why_choose_json['description'] ?? 'We understand that every family deserves care that is reliable, personal, and convenient. Here\'s why families trust us:' }}
            </p>
            
            <div class="why-choose-points">
                @if(isset($service->why_choose_json['points']) && is_array($service->why_choose_json['points']))
                    @foreach($service->why_choose_json['points'] as $point)
                        <div class="why-choose-point">
                            <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="why-choose-point-icon">
                            <span class="point-text">{{ $point['text'] }}</span>
                        </div>
                    @endforeach
                @else
                    <!-- Default points if none are set -->
                    <div class="why-choose-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="why-choose-point-icon">
                        <span class="point-text">Personalized care plans for every family member</span>
                    </div>
                    <div class="why-choose-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="why-choose-point-icon">
                        <span class="point-text">Preventive screenings and regular check-ups</span>
                    </div>
                    <div class="why-choose-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="why-choose-point-icon">
                        <span class="point-text">Experienced doctors across multiple specialties</span>
                    </div>
                    <div class="why-choose-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="why-choose-point-icon">
                        <span class="point-text">A caring, supportive, and family-friendly environment</span>
                    </div>
                    <div class="why-choose-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="why-choose-point-icon">
                        <span class="point-text">Convenient appointment scheduling and ongoing support</span>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Right Column: Images -->
        <div class="why-choose-images">
            <!-- Left Image Column -->
            <div class="image-column-left">
                @if(isset($service->why_choose_json['main_image']) && $service->why_choose_json['main_image'])
                    <img src="{{ asset('storage/' . $service->why_choose_json['main_image']) }}" alt="Healthcare Professional" class="why-choose-image-main">
                @else
                    <img src="{{ asset('images/caring1.png') }}" alt="Healthcare Professional" class="why-choose-image-main">
                @endif
            </div>
            
            <!-- Right Image Column -->
            <div class="image-column-right">
                @if(isset($service->why_choose_json['top_right_image']) && $service->why_choose_json['top_right_image'])
                    <img src="{{ asset('storage/' . $service->why_choose_json['top_right_image']) }}" alt="Patient Consultation" class="why-choose-image-top">
                @else
                    <img src="{{ asset('images/caring2.png') }}" alt="Patient Consultation" class="why-choose-image-top">
                @endif
                
                @if(isset($service->why_choose_json['bottom_right_image']) && $service->why_choose_json['bottom_right_image'])
                    <img src="{{ asset('storage/' . $service->why_choose_json['bottom_right_image']) }}" alt="Medical Care" class="why-choose-image-bottom">
                @else
                    <img src="{{ asset('images/caring3.png') }}" alt="Medical Care" class="why-choose-image-bottom">
                @endif
            </div>
        </div>
    </div>
</section>
