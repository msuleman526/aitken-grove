@php
    $content = is_array($section->content_json) ? $section->content_json : json_decode($section->content_json ?? '{}', true) ?? [];
    
    // Default testimonials data
    $defaultTestimonials = [
        [
            'quote' => 'The doctors here are amazing! They took great care of me and explained everything clearly. I felt comfortable and well cared for throughout my visit.',
            'author' => 'Sarah Johnson',
            'role' => 'Patient'
        ],
        [
            'quote' => 'Professional staff and excellent service. The consultation was thorough and the treatment plan was perfectly tailored to my needs. Highly recommend!',
            'author' => 'Michael Chen',
            'role' => 'Patient'
        ],
        [
            'quote' => 'Outstanding healthcare experience! The facility is modern, clean, and the medical team is incredibly knowledgeable. My family trusts them completely.',
            'author' => 'Emily Davis',
            'role' => 'Patient'
        ]
    ];
    
    $testimonials = $content['items'] ?? $defaultTestimonials;
    $title = $content['title'] ?? 'Trusted by Thousands';
    $subtitle = $content['subtitle'] ?? 'Loved by Patients';
@endphp

<section class="testimonials-section">
    <div class="testimonials-container">
        <!-- Title Section with Navigation -->
        <div class="testimonials-header">
            <div class="testimonials-title-container">
                <h2 class="testimonials-title">
                    <span class="title-black">{{ $title }}</span><br/>
                    <span class="title-primary">{{ $subtitle }}</span>
                </h2>
            </div>
            <div class="testimonials-nav">
                <button class="testimonials-nav-btn" id="testimonials-prev" aria-label="Previous testimonials">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="testimonials-nav-btn" id="testimonials-next" aria-label="Next testimonials">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Testimonials Cards Container -->
        <div class="testimonials-scroll-container" id="testimonials-container">
            <div class="testimonials-cards">
                @foreach($testimonials as $index => $testimonial)
                    <div class="testimonials-card" data-index="{{ $index }}">
                        <div class="testimonials-content">
                            <p class="testimonials-comment">{{ $testimonial['quote'] ?? '' }}</p>
                            <div class="testimonials-author">
                                <p class="testimonials-name">{{ $testimonial['author'] ?? '' }}</p>
                                <p class="testimonials-role">{{ $testimonial['role'] ?? 'Patient' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
.testimonials-section {
    height: 528px;
    background: #E9F9F9;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.testimonials-container {
    max-width: 1440px;
    width: 100%;
    margin: 0 auto;
    padding: 0 45px;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
}

.testimonials-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
}

.testimonials-title-container {
    flex: 1;
}

.testimonials-title {
    font-family: 'Cal Sans';
    font-style: normal;
    font-weight: 400;;
    font-size: 40px;
    line-height: 120%;
    margin: 0;
    text-align: left;
}

.title-black {
    color: #000000;
}

.title-primary {
    color: #E62D5B;
    margin-left: 3px;
}

.testimonials-nav {
    display: flex;
    gap: 16px;
    align-items: center;
}

.testimonials-nav-btn {
    width: 60px;
    height: 60px;
    background: #FFFFFF;
    border: none;
    border-radius: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.testimonials-nav-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.testimonials-nav-btn:active {
    transform: translateY(0);
}

.testimonials-nav-btn svg {
    color: #333333;
    transition: color 0.3s ease;
}

.testimonials-nav-btn:hover svg {
    color: #E62D5B;
}

.testimonials-scroll-container {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.testimonials-cards {
    display: flex;
    gap: 24px;
    transition: transform 0.5s ease;
    will-change: transform;
}

.testimonials-card {
    width: 500px;
    height: 280px;
    background: #FFFFFF;
    border-radius: 16px;
    padding: 40px 32px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-shrink: 0;
    transition: all 0.3s ease;
}


.testimonials-content {
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: space-between;
}

.testimonials-comment {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 150%;
    color: #000000;
    margin: 0 0 24px 0;
    flex: 1;
    overflow: hidden;
}

.testimonials-author {
    margin-top: auto;
}

.testimonials-name {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-style: normal;
    font-weight: 400;;
    font-size: 16px;
    line-height: 150%;
    color: #000000;
    margin: 0 0 4px 0;
}

.testimonials-role {
    font-family: 'Cal Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 150%;
    color: #666666;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 1400px) {
    .testimonials-container {
        padding: 0 30px;
    }
}

@media (max-width: 1200px) {
    .testimonials-container {
        padding: 0 24px;
    }
    
    .testimonials-title {
        font-size: 36px;
    }
    
    .testimonials-card {
        width: 450px;
        height: 260px;
        padding: 32px 28px;
    }
}

@media (max-width: 768px) {
    .testimonials-section {
        height: auto;
        min-height: 480px;
        padding: 60px 0;
    }
    
    .testimonials-container {
        padding: 0 20px;
    }
    
    .testimonials-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 40px;
        gap: 24px;
    }
    
    .testimonials-title {
        font-size: 32px;
        text-align: center;
    }
    
    .title-primary {
        margin-left: 0;
        display: block;
        margin-top: 4px;
    }
    
    .testimonials-cards {
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
    
    .testimonials-card {
        width: 100%;
        max-width: 400px;
        height: 240px;
        padding: 28px 24px;
    }
    
    .testimonials-nav {
        order: -1;
    }
    
    .testimonials-nav-btn {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 480px) {
    .testimonials-section {
        min-height: 440px;
        padding: 50px 0;
    }
    
    .testimonials-container {
        padding: 0 15px;
    }
    
    .testimonials-title {
        font-size: 28px;
    }
    
    .testimonials-card {
        max-width: 100%;
        height: 220px;
        padding: 24px 20px;
    }
    
    .testimonials-comment {
        font-size: 15px;
    }
    
    .testimonials-name {
        font-size: 15px;
    }
    
    .testimonials-role {
        font-size: 13px;
    }
}
</style>

<script src="{{ asset('js/testimonials-section.js') }}" defer></script>
