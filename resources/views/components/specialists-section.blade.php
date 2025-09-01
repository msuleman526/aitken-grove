@php
    $content = is_array($section->content_json) ? $section->content_json : json_decode($section->content_json ?? '{}', true);
    $title = $content['title'] ?? 'Meet Our Specialists';
    $description = $content['description'] ?? 'Trusted, experienced doctors dedicated to your care.';
    $specialists = $content['specialists'] ?? [];
@endphp

<section class="specialists-section" id="specialists">
    <div class="specialists-container">
        <!-- Title and Description -->
        <div class="specialists-content">
            <h2 class="specialists-title">
                <span class="title-black">Meet Our</span> <span class="title-primary">Specialists</span>
            </h2>
            <p class="specialists-description">{{ $description }}</p>
        </div>

        <!-- Specialists Cards Container -->
        <div class="specialists-wrapper">
            <!-- Specialists Scroll Container -->
            <div class="specialists-scroll" id="specialists-scroll">
                @if(!empty($specialists))
                    @foreach($specialists as $specialist)
                        <div class="specialist-card">
                            <div class="specialist-image-container">
                                @if(!empty($specialist['image']))
                                    <img src="{{ asset('storage/' . $specialist['image']) }}" 
                                         alt="{{ $specialist['name'] ?? 'Specialist' }}" 
                                         class="specialist-image">
                                @else
                                    <img src="{{ asset('images/specialist.png') }}" 
                                         alt="{{ $specialist['name'] ?? 'Specialist' }}" 
                                         class="specialist-image">
                                @endif
                                
                                <!-- Info Card Overlay -->
                                <div class="specialist-info-card">
                                    <h3 class="specialist-name">{{ $specialist['name'] ?? 'Doctor Name' }}</h3>
                                    <p class="specialist-role">{{ $specialist['role'] ?? 'Specialist' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default/Demo Specialists -->
                    @php
                        $defaultSpecialists = [
                            ['name' => 'Dr. Salman Raza', 'role' => 'Senior Orthopedic Surgeon', 'image' => null],
                            ['name' => 'Dr. Ayesha Khan', 'role' => 'Consultant Cardiologist', 'image' => null],
                            ['name' => 'Dr. Maria Ahmed', 'role' => 'Pediatrician & Child Specialist', 'image' => null],
                            ['name' => 'Dr. Hassan Malik', 'role' => 'Neurologist', 'image' => null],
                            ['name' => 'Dr. Sarah Johnson', 'role' => 'Gynecologist', 'image' => null],
                        ];
                    @endphp
                    @foreach($defaultSpecialists as $specialist)
                        <div class="specialist-card">
                            <div class="specialist-image-container">
                                <img src="{{ asset('images/specialist.png') }}" 
                                     alt="{{ $specialist['name'] }}" 
                                     class="specialist-image">
                                
                                <!-- Info Card Overlay -->
                                <div class="specialist-info-card">
                                    <h3 class="specialist-name">{{ $specialist['name'] }}</h3>
                                    <p class="specialist-role">{{ $specialist['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            
            <!-- Navigation Buttons - Both at bottom center -->
            <div class="specialists-nav-bottom">
                <button class="specialists-nav specialists-nav-left" id="specialists-nav-left" aria-label="Previous specialists">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="specialists-nav specialists-nav-right" id="specialists-nav-right" aria-label="Next specialists">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/specialists-section.css') }}">
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const scrollContainer = document.getElementById('specialists-scroll');
    const leftButton = document.getElementById('specialists-nav-left');
    const rightButton = document.getElementById('specialists-nav-right');
    
    if (!scrollContainer || !leftButton || !rightButton) return;
    
    const cardWidth = 300; // Width of each specialist card
    const gap = 24; // Gap between cards
    const scrollAmount = cardWidth + gap;
    
    // Handle left navigation
    leftButton.addEventListener('click', function() {
        scrollContainer.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
    
    // Handle right navigation
    rightButton.addEventListener('click', function() {
        scrollContainer.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
    
    // Update button visibility based on scroll position
    function updateButtons() {
        const isAtStart = scrollContainer.scrollLeft <= 0;
        const isAtEnd = scrollContainer.scrollLeft >= (scrollContainer.scrollWidth - scrollContainer.clientWidth - 1);
        
        leftButton.style.opacity = isAtStart ? '0.3' : '1';
        rightButton.style.opacity = isAtEnd ? '0.3' : '1';
        
        leftButton.style.pointerEvents = isAtStart ? 'none' : 'auto';
        rightButton.style.pointerEvents = isAtEnd ? 'none' : 'auto';
    }
    
    // Initial button state
    updateButtons();
    
    // Update buttons on scroll
    scrollContainer.addEventListener('scroll', updateButtons);
});
</script>
@endpush
