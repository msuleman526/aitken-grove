{{-- Specialised Treatment Section Component --}}
<section class="specialised-treatment-section">
    <div class="specialised-treatment-container">
        {{-- Section Title --}}
        @if(!empty($section->content_json['title']))
            <h2 class="specialised-treatment-title">
                <span class="color-black">Your </span><span class="color-primary">Health</span><span class="color-black">, Our </span><span class="color-primary">Complete Approach</span>
            </h2>
        @endif

        {{-- Section Description --}}
        @if(!empty($section->content_json['description']))
            <p class="specialised-treatment-description">
                {{ $section->content_json['description'] }}
            </p>
        @endif

        {{-- Treatment Cards Grid --}}
        @if(!empty($section->content_json['cards']))
            <div class="treatment-cards-grid">
                @foreach($section->content_json['cards'] as $card)
                    <div class="treatment-card">
                        {{-- Card Icon --}}
                        @if(!empty($card['icon']))
                            <img src="{{ asset('icons/treatment/' . $card['icon']) }}" 
                                 alt="{{ $card['title'] ?? 'Treatment Icon' }}" 
                                 class="treatment-card-icon"
                                 loading="lazy">
                        @endif

                        {{-- Card Content --}}
                        <div class="treatment-card-content">
                            {{-- Card Title --}}
                            @if(!empty($card['title']))
                                <h3 class="treatment-card-title">
                                    {{ $card['title'] }}
                                </h3>
                            @endif

                            {{-- Card Description --}}
                            @if(!empty($card['description']))
                                <p class="treatment-card-description">
                                    {{ $card['description'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
