// Testimonials Section JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initTestimonialsCarousel();
});

function initTestimonialsCarousel() {
    const container = document.getElementById('testimonials-container');
    const cardsContainer = container?.querySelector('.testimonials-cards');
    const prevBtn = document.getElementById('testimonials-prev');
    const nextBtn = document.getElementById('testimonials-next');
    
    if (!cardsContainer || !prevBtn || !nextBtn) return;
    
    const cards = cardsContainer.querySelectorAll('.testimonials-card');
    if (cards.length === 0) return;
    
    let currentIndex = 0;
    let cardsToShow = getCardsToShow();
    let maxIndex = Math.max(0, cards.length - cardsToShow);
    
    function getCardsToShow() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1200) return 2;
        return 3;
    }
    
    function updateCarousel() {
        if (window.innerWidth <= 768) {
            // Mobile: vertical stack, no transform needed
            cardsContainer.style.transform = 'translateY(0)';
            return;
        }
        
        const cardWidth = window.innerWidth <= 1200 ? 450 : 500;
        const gap = 24;
        const translateX = currentIndex * (cardWidth + gap);
        cardsContainer.style.transform = `translateX(-${translateX}px)`;
        
        updateButtonStates();
    }
    
    function updateButtonStates() {
        prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= maxIndex;
    }
    
    function goNext() {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCarousel();
        }
    }
    
    function goPrev() {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    }
    
    function handleResize() {
        const newCardsToShow = getCardsToShow();
        const newMaxIndex = Math.max(0, cards.length - newCardsToShow);
        
        if (currentIndex > newMaxIndex) {
            currentIndex = newMaxIndex;
        }
        
        cardsToShow = newCardsToShow;
        maxIndex = newMaxIndex;
        updateCarousel();
    }
    
    // Event Listeners
    prevBtn.addEventListener('click', goPrev);
    nextBtn.addEventListener('click', goNext);
    window.addEventListener('resize', handleResize);
    
    // Touch/Swipe support for mobile
    let startX = 0;
    let isDragging = false;
    
    cardsContainer.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
    }, { passive: true });
    
    cardsContainer.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        
        const endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        
        if (Math.abs(diff) > 50) { // Minimum swipe distance
            if (diff > 0) {
                goNext();
            } else {
                goPrev();
            }
        }
        
        isDragging = false;
    }, { passive: true });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.target.closest('.testimonials-section')) {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                goPrev();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                goNext();
            }
        }
    });
    
    // Initialize
    updateCarousel();
}

// Auto-play functionality (optional)
function startTestimonialsAutoplay(interval = 5000) {
    const nextBtn = document.getElementById('testimonials-next');
    const prevBtn = document.getElementById('testimonials-prev');
    
    if (!nextBtn || !prevBtn) return;
    
    let autoplayTimer;
    
    function startAutoplay() {
        autoplayTimer = setInterval(() => {
            if (!nextBtn.disabled) {
                nextBtn.click();
            } else {
                // Loop back to start
                prevBtn.click();
            }
        }, interval);
    }
    
    function stopAutoplay() {
        clearInterval(autoplayTimer);
    }
    
    // Start autoplay
    startAutoplay();
    
    // Pause on hover/focus
    const testimonialsSection = document.querySelector('.testimonials-section');
    if (testimonialsSection) {
        testimonialsSection.addEventListener('mouseenter', stopAutoplay);
        testimonialsSection.addEventListener('mouseleave', startAutoplay);
        testimonialsSection.addEventListener('focusin', stopAutoplay);
        testimonialsSection.addEventListener('focusout', startAutoplay);
    }
}

// Uncomment the line below to enable autoplay
// startTestimonialsAutoplay();
