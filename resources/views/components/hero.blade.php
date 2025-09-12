@props(['page'])

<section class="hero-section">
    <!-- Background Pattern -->
    <div class="hero-background"></div>
    
    <!-- Main Content Container -->
    <div class="hero-content">
        <!-- Aitken Grove Text Logo -->
        <div class="hero-logo">
            <img src="/images/aitken_long_txt.png" 
                 alt="Aitken Grove"
                 class="logo-desktop">
            <img src="/images/aitken_long_txt1.png" 
                 alt="Aitken Grove"
                 class="logo-mobile">
        </div>
        
        <!-- Hero Main Content -->
        <div class="hero-main">
            <!-- Left Side Content -->
            <div class="hero-text">
                <h1 class="hero-title">
                    @if($page->hero_title)
                        {!! preg_replace(['/Our/', '/Health/'], ['<span class="color-accent">Our</span>', '<span class="color-primary">Health</span>'], $page->hero_title) !!}
                    @else
                        Your <span class="color-primary">Healthh</span><br>
                        <span class="color-primary">Our</span> <span class="color-accent">Priority</span>
                    @endif
                </h1>
                
                <p class="hero-description">
                    {{ $page->hero_description ?? 'From routine check-ups to specialized treatments, we provide quality healthcare in a caring and supportive environment.' }}
                </p>
            </div>
            
            <!-- Center - Girl Image -->
            <div class="hero-girl">
                <img src="/images/hero-girl.png" class="hero-desktop" alt="Healthcare Professional">
                <img src="/images/hero-girl1.png" class="hero-mobile" alt="Healthcare Professional">
            </div>
            
            <!-- Right Side - Stats Boxes -->
            <div class="hero-stats">
                @if($page->hero_stats && is_array($page->hero_stats))
                    @foreach($page->hero_stats as $stat)
                        <div class="stat-box">
                            <img src="/images/{{ $stat['icon'] ?? 'box1' }}.png" alt="{{ $stat['label'] ?? 'Stat' }}">
                            <div class="stat-number">
                                {{ $stat['number'] ?? '30+' }}
                            </div>
                            <div class="stat-label">
                                {{ $stat['label'] ?? 'Tests Available' }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default stats if none configured -->
                    <div class="stat-box">
                        <img src="/images/box1.png" alt="Tests Available">
                        <div class="stat-number">30+</div>
                        <div class="stat-label">Tests Available</div>
                    </div>
                    <div class="stat-box">
                        <img src="/images/box2.png" alt="Doctors Available">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Doctors Available</div>
                    </div>
                    <div class="stat-box">
                        <img src="/images/box3.png" alt="Patients Treated">
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Patients Treated</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
