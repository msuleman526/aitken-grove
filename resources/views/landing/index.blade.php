@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title . ' - Aitken Grove Medical & Aesthetic Center')

@section('meta')
    @if($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
@endsection

@section('content')
    @include('components.header')
    
    <!-- Hero Section -->
    @include('components.hero', ['page' => $page])
    
    <!-- Consultant Bar -->
    @include('components.consultant-bar', ['page' => $page])
    
    <main>
        <!-- Dynamic Sections -->
        @foreach($sections as $section)
            @if($section->key === 'caring')
                @include('components.caring-section', ['section' => $section])
            @elseif($section->key === 'specialised_treatment')
                @include('components.specialised-treatment-section', ['section' => $section])
            @elseif($section->key === 'trust')
                @include('components.trust-section', ['section' => $section])
            @elseif($section->key === 'specialists')
                @include('components.specialists-section', ['section' => $section])
            @elseif($section->key === 'firststep')
                @include('components.firststep-section', ['section' => $section])
            @elseif($section->key === 'features')
                @include('components.features-section', ['section' => $section])
            @elseif($section->key === 'testimonials')
                @include('components.testimonials-section', ['section' => $section])
            @elseif($section->key === 'pricing')
                @include('components.pricing-section', ['section' => $section])
            @elseif($section->key === 'faq')
                @include('components.faq-section', ['section' => $section])
            @elseif($section->key === 'cta_banner')
                @include('components.cta-banner', ['section' => $section])
            @endif
        @endforeach
    </main>
    
    <!-- Footer -->
    @include('components.footer')
@endsection

@push('styles')
<!-- Additional page-specific styles can be added here -->
@endpush

@push('scripts')
<script>
    // Page-specific JavaScript can go here
    console.log('Landing page loaded');
</script>
@endpush
