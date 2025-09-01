@props(['section'])

<section class="trust-section">
    <div class="trust-container">
        <!-- Left Column: Content -->
        <div class="trust-content">
            <h2 class="trust-title">
                @php
                    $titleText = $section->content_json['title'] ?? 'Care You Can Trust';
                    $titleParts = explode(' ', $titleText);
                    
                    // Find where "Can" starts to split the title
                    $splitIndex = -1;
                    foreach($titleParts as $index => $word) {
                        if(strtolower($word) === 'can') {
                            $splitIndex = $index;
                            break;
                        }
                    }
                    
                    if($splitIndex > 0) {
                        $blackPart = implode(' ', array_slice($titleParts, 0, $splitIndex));
                        $primaryPart = implode(' ', array_slice($titleParts, $splitIndex));
                    } else {
                        // Fallback: split at "Care You" and "Can Trust"
                        $blackPart = 'Care You';
                        $primaryPart = ' Can Trust';
                    }
                @endphp
                <span class="title-black">{{ $blackPart }}</span><span class="title-primary"> </span><span class="title-primary">{{ $primaryPart }}</span>
            </h2>
            
            <p class="trust-description">
                {{ $section->content_json['description'] ?? 'At Aitken Grove Medical Center, we believe healthcare should be more than just treatment — it should be compassion, trust, and excellence combined. That\'s why thousands of patients choose us every year.' }}
            </p>
            
            <div class="trust-points">
                @if(isset($section->content_json['points']) && is_array($section->content_json['points']))
                    @foreach($section->content_json['points'] as $point)
                        <div class="trust-point">
                            <div class="trust-point-icon">
                                @if(isset($point['icon']) && $point['icon'])
                                    <img src="{{ asset('icons/trust/' . $point['icon']) }}" alt="{{ $point['title'] ?? 'Trust Point' }}" class="trust-icon">
                                @else
                                    <img src="{{ asset('icons/trust/default-icon.png') }}" alt="{{ $point['title'] ?? 'Trust Point' }}" class="trust-icon">
                                @endif
                            </div>
                            <div class="point-content">
                                <h3 class="point-title">{{ $point['title'] ?? '100+ Specialist Doctors' }}</h3>
                                <p class="point-description">{{ $point['description'] ?? 'Expert doctors across multiple specialties for complete care.' }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default trust points if none are set -->
                    <div class="trust-point">
                        <div class="trust-point-icon">
                            <img src="{{ asset('icons/trust/trust1.png') }}" alt="Specialist Doctors" class="trust-icon">
                        </div>
                        <div class="point-content">
                            <h3 class="point-title">100+ Specialist Doctors</h3>
                            <p class="point-description">Expert doctors across multiple specialties for complete care.</p>
                        </div>
                    </div>
                    <div class="trust-point">
                        <div class="trust-point-icon">
                            <img src="{{ asset('icons/trust/trust2.png') }}" alt="Years of Excellence" class="trust-icon">
                        </div>
                        <div class="point-content">
                            <h3 class="point-title">20+ Years of Excellence</h3>
                            <p class="point-description">Decades of trusted, reliable, patient-first service.</p>
                        </div>
                    </div>
                    <div class="trust-point">
                        <div class="trust-point-icon">
                            <img src="{{ asset('icons/trust/trust3.png') }}" alt="Same-Day Appointments" class="trust-icon">
                        </div>
                        <div class="point-content">
                            <h3 class="point-title">Same-Day Appointments</h3>
                            <p class="point-description">Quick bookings and minimal waiting time.</p>
                        </div>
                    </div>
                    <div class="trust-point">
                        <div class="trust-point-icon">
                            <img src="{{ asset('icons/trust/trust4.png') }}" alt="Modern Facilities" class="trust-icon">
                        </div>
                        <div class="point-content">
                            <h3 class="point-title">Modern Facilities & Equipment</h3>
                            <p class="point-description">Advanced technology for accurate results & effective care.</p>
                        </div>
                    </div>
                    <div class="trust-point">
                        <div class="trust-point-icon">
                            <img src="{{ asset('icons/trust/trust5.png') }}" alt="Comprehensive Healthcare" class="trust-icon">
                        </div>
                        <div class="point-content">
                            <h3 class="point-title">Comprehensive Healthcare</h3>
                            <p class="point-description">From checkups to treatments — all under one roof.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Right Column: Image -->
        <div class="trust-image">
            <img src="{{ asset('images/trust-girl.png') }}" alt="Trust - Medical Professional" class="trust-main-image">
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/trust-section.css') }}">
@endpush