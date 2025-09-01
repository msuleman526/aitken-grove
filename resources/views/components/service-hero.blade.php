<section class="service-hero">
    <div class="service-hero-background" style="background-image: url('{{ $service->getHeroBackgroundUrl() }}');">
        <div class="service-hero-overlay"></div>
        <div class="service-hero-content">
            <div class="service-hero-inner">
                <h1 class="service-hero-title">{{ $service->title }}</h1>
                <p class="service-hero-description">{{ $service->description }}</p>
            </div>
        </div>
    </div>
</section>
