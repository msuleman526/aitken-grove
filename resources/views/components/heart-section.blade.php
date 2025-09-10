@props(['section'])

<section class="heart-section">
    <div class="heart-container">
        <!-- Left Column: Image -->
        <div class="heart-image">
            @if(isset($section->content_json['image']) && $section->content_json['image'])
                <img src="{{ asset('storage/' . $section->content_json['image']) }}" alt="Heart Behind What We Do" class="heart-image-main">
            @else
                <img src="{{ asset('images/heart.png') }}" alt="Heart Behind What We Do" class="heart-image-main">
            @endif
        </div>
        
        <!-- Right Column: Content -->
        <div class="heart-content">
            <h2 class="heart-title">
                @if(isset($section->content_json['title']) && $section->content_json['title'])
                    {!! $section->content_json['title'] !!}
                @else
                    <span class="title-part-1">The Heart Behind</span><br>
                    <span class="title-part-2">What We Do</span>
                @endif
            </h2>
            
            <p class="heart-description">
                {{ $section->content_json['description'] ?? 'At Aitken Grove Medical Center, our mission is simple — to provide compassionate, reliable, and patient-centered healthcare that empowers families to live healthier, happier lives. We combine modern medical practices with a personal touch, ensuring every patient feels valued, supported, and cared for.' }}
            </p>
            
            <div class="heart-points">
                @if(isset($section->content_json['points']) && is_array($section->content_json['points']))
                    @foreach($section->content_json['points'] as $point)
                        <div class="heart-point">
                            <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="heart-point-icon">
                            <span class="point-text">{{ $point['text'] }}</span>
                        </div>
                    @endforeach
                @else
                    <!-- Default points if none are set -->
                    <div class="heart-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="heart-point-icon">
                        <span class="point-text">We listen, we care, and we treat every patient with dignity and kindness.</span>
                    </div>
                    <div class="heart-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="heart-point-icon">
                        <span class="point-text">We hold ourselves to the highest standards in medical expertise and patient service.</span>
                    </div>
                    <div class="heart-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="heart-point-icon">
                        <span class="point-text">We believe in honesty, transparency, and doing what's best for our patients.</span>
                    </div>
                    <div class="heart-point">
                        <img src="{{ asset('icons/check-circle.png') }}" alt="Check" class="heart-point-icon">
                        <span class="point-text">We continuously adapt and embrace new medical solutions to improve patient outcomes.</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
