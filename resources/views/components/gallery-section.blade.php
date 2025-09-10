@props(['section'])

<section class="gallery-section">
    <div class="gallery-container">
        <div class="gallery-scroll" id="galleryScroll">
            @if(isset($section->content_json['images']) && is_array($section->content_json['images']) && count($section->content_json['images']) > 0)
                @foreach($section->content_json['images'] as $image)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $image['path']) }}" alt="{{ $image['alt'] ?? 'Gallery Image' }}" class="gallery-image">
                    </div>
                @endforeach
                <!-- Duplicate images for seamless scrolling -->
                @foreach($section->content_json['images'] as $image)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $image['path']) }}" alt="{{ $image['alt'] ?? 'Gallery Image' }}" class="gallery-image">
                    </div>
                @endforeach
            @else
                <!-- Default gallery images if none are uploaded -->
                @for($i = 1; $i <= 10; $i++)
                    <div class="gallery-item">
                        <img src="{{ asset('images/gallery/image' . $i . '.png') }}" alt="Gallery Image {{ $i }}" class="gallery-image">
                    </div>
                @endfor
                <!-- Duplicate for seamless scrolling -->
                @for($i = 1; $i <= 10; $i++)
                    <div class="gallery-item">
                        <img src="{{ asset('images/gallery/image' . $i . '.png') }}" alt="Gallery Image {{ $i }}" class="gallery-image">
                    </div>
                @endfor
            @endif
        </div>
    </div>
</section>
