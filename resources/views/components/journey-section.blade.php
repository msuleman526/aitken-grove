@php
    $content = $section->content_json ?? [];
    
    // Default content if none set
    $title = $content['title'] ?? '<span class="title-normal">A Journey of</span> <span class="title-highlight">Compassion,</span><br><span class="title-highlight">Trust, and Dedication</span> <span class="title-normal">to</span><br><span class="title-accent">Better Health</span> <span class="title-normal">for</span> <span class="title-highlight2">Every</span><br><span class="title-accent2">Generation</span>';
    
    $description = $content['description'] ?? '<p>From the very beginning, our vision has been simple yet powerful — to create a place where people feel truly cared for. Not just treated. What started as a small initiative has grown into a trusted healthcare service that serves individuals and families with the highest level of compassion and professionalism. Every step of the way, we\'ve strived to ensure that patients feel respected, heard, and supported in their journey toward better health.</p><p>As we\'ve grown, so has our commitment to excellence. By blending modern medical advancements with a personalized approach, we\'ve been able to deliver care that goes beyond treatment — care that builds lasting trust. Each patient interaction is a chance for us to make a difference, and it\'s this belief that keeps us dedicated to raising the standard of healthcare in our community.</p><p>Today, our story continues with the same passion that fueled our beginnings. We remain deeply rooted in our mission to support every life we touch, expanding our services to meet evolving needs while never losing sight of the values that brought us here. For us, it\'s not just about medicine — it\'s about being a reliable partner in your health and wellness journey, for today and for generations to come.</p>';
    
    $image = $content['image'] ?? asset('images/heart2.png');
@endphp

<section class="journey-section">
    <div class="journey-container">
        <!-- Left Column: Title and Image -->
        <div class="journey-left-column">
            <h2 class="journey-title">{!! $title !!}</h2>
            <div class="journey-image">
                <img src="{{ $image }}" alt="Journey of Compassion" loading="lazy">
            </div>
        </div>
        
        <!-- Right Column: Description -->
        <div class="journey-right-column">
            <div class="journey-description">{!! $description !!}</div>
        </div>
    </div>
</section>
