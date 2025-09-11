// Testimonials Section JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initTestimonialsCarousel();
});

function initTestimonialsCarousel() {
    const container = document.getElementById('testimonials-container');
    const cardsContainer = container?.querySelector('.testimonials-cards');
    const prevBtn = document.getElementById('testimonials-prev');
    const nextBtn = document.getElementById('testimonials-next');
    const prevBtnMobile = document.getElementById('testimonials-prev-mobile');
    const nextBtnMobile = document.getElementById('testimonials-next-mobile');
    
    if (!cardsContainer || (!prevBtn && !prevBtnMobile) || (!nextBtn && !nextBtnMobile)) return;
    
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
            // Mobile: horizontal scroll with full card width
            const cardWidth = cardsContainer.querySelector('.testimonials-card')?.offsetWidth || 320;
            const gap = 20;
            const translateX = currentIndex * (cardWidth + gap);
            cardsContainer.style.transform = `translateX(-${translateX}px)`;
        } else {
            const cardWidth = window.innerWidth <= 1200 ? 450 : 500;
            const gap = 24;
            const translateX = currentIndex * (cardWidth + gap);
            cardsContainer.style.transform = `translateX(-${translateX}px)`;
        }
        
        updateButtonStates();
    }
    
    function updateButtonStates() {
        const isFirst = currentIndex === 0;
        const isLast = currentIndex >= maxIndex;
        
        // Update desktop buttons
        if (prevBtn) {
            prevBtn.style.opacity = isFirst ? '0.5' : '1';
            prevBtn.disabled = isFirst;
        }
        if (nextBtn) {
            nextBtn.style.opacity = isLast ? '0.5' : '1';
            nextBtn.disabled = isLast;
        }
        
        // Update mobile buttons
        if (prevBtnMobile) {
            prevBtnMobile.style.opacity = isFirst ? '0.5' : '1';
            prevBtnMobile.disabled = isFirst;
        }
        if (nextBtnMobile) {
            nextBtnMobile.style.opacity = isLast ? '0.5' : '1';
            nextBtnMobile.disabled = isLast;
        }
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
    if (prevBtn) prevBtn.addEventListener('click', goPrev);
    if (nextBtn) nextBtn.addEventListener('click', goNext);
    if (prevBtnMobile) prevBtnMobile.addEventListener('click', goPrev);
    if (nextBtnMobile) nextBtnMobile.addEventListener('click', goNext);
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
    const nextBtnMobile = document.getElementById('testimonials-next-mobile');
    const prevBtn = document.getElementById('testimonials-prev');
    const prevBtnMobile = document.getElementById('testimonials-prev-mobile');
    
    if ((!nextBtn && !nextBtnMobile) || (!prevBtn && !prevBtnMobile)) return;
    
    let autoplayTimer;
    
    function startAutoplay() {
        autoplayTimer = setInterval(() => {
            const activeNextBtn = window.innerWidth <= 768 ? nextBtnMobile : nextBtn;
            const activePrevBtn = window.innerWidth <= 768 ? prevBtnMobile : prevBtn;
            
            if (activeNextBtn && !activeNextBtn.disabled) {
                activeNextBtn.click();
            } else if (activePrevBtn) {
                // Loop back to start
                activePrevBtn.click();
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
