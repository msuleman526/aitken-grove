<section class="about-service">
    <div class="about-service-container">
        <div class="about-service-button">
            {{ $service->button_text ?: 'About Our Family Health Care' }}
        </div>
        
        <div class="about-service-title">
            @if($service->about_title)
                {!! $service->getColoredAboutTitle() !!}
            @else
                We believe <span style="color: #E62D5B;">good health</span> begins at home. Our <span style="color: #5EC6C8;">family health care services</span> are designed to provide <span style="color: #00000080;">compassionate</span>, <span style="color: #00000080;">continuous</span>, and reliable care for you and your loved ones, <span style="color: #17687F;">no matter the age or stage of life</span>.
            @endif
        </div>
    </div>
</section>
