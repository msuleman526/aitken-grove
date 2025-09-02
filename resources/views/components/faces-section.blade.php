<section class="faces-section" id="faces">
    <div class="faces-container">
        <!-- Title and Description -->
        <div class="faces-content">
            <h2 class="faces-title">
                <span class="title-black">Faces Behind</span> <span class="title-primary"  style="margin-left: 0px;">Your Care</span>
            </h2>
            <p class="faces-description">Meet the doctors who treat every patient like family.</p>
        </div>

        <!-- Doctors Cards Container -->
        <div class="faces-wrapper">
            <!-- Faces Scroll Container -->
            <div class="faces-scroll" id="faces-scroll">
                @php
                    // Default doctors for the faces section
                    $doctors = [
                        ['name' => 'Dr. Salman Raza', 'role' => 'Senior Orthopedic Surgeon'],
                        ['name' => 'Dr. Ayesha Khan', 'role' => 'Consultant Cardiologist'],
                        ['name' => 'Dr. Maria Ahmed', 'role' => 'Pediatrician & Child Specialist'],
                        ['name' => 'Dr. Hassan Malik', 'role' => 'Neurologist'],
                        ['name' => 'Dr. Sarah Johnson', 'role' => 'Gynecologist'],
                    ];
                @endphp
                
                @foreach($doctors as $doctor)
                    <div class="faces-card">
                        <div class="faces-image-container">
                            <img src="{{ asset('images/specialist.png') }}" 
                                 alt="{{ $doctor['name'] }}" 
                                 class="faces-image">
                            
                            <!-- Info Card Overlay -->
                            <div class="faces-info-card">
                                <h3 class="faces-name">{{ $doctor['name'] }}</h3>
                                <p class="faces-role">{{ $doctor['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Navigation Buttons - Both at bottom center -->
            <div class="faces-nav-bottom">
                <button class="faces-nav faces-nav-left" id="faces-nav-left" aria-label="Previous doctors">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="faces-nav faces-nav-right" id="faces-nav-right" aria-label="Next doctors">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/faces-section.css') }}">
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const scrollContainer = document.getElementById('faces-scroll');
    const leftButton = document.getElementById('faces-nav-left');
    const rightButton = document.getElementById('faces-nav-right');
    
    if (!scrollContainer || !leftButton || !rightButton) return;
    
    const cardWidth = 300; // Width of each faces card
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
