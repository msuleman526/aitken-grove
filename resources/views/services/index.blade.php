@extends('layouts.app')

@section('title', 'Our Services - Aitken Grove')
@section('meta_description', 'Comprehensive medical services for every stage of life, from children to seniors, ensuring your family\'s health is always in safe hands.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/services-index.css') }}">
@endpush

@section('content')
@include('components.header')

<div class="services-index">
    <div class="services-header">
        <div class="services-header-content">
            <h1 class="services-title">Our Services</h1>
            <p class="services-description">Comprehensive medical services for every stage of life, from children to seniors, ensuring your family's health is always in safe hands.</p>
        </div>
    </div>
    
    <div class="services-grid">
        <div class="services-container">
            @foreach($services as $service)
                <div class="service-card">
                    <div class="service-card-image" style="background-image: url('{{ $service->getHeroBackgroundUrl() }}');"></div>
                    <div class="service-card-content">
                        <h3 class="service-card-title">{{ $service->title }}</h3>
                        <p class="service-card-description">{{ Str::limit($service->description, 120) }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="service-card-button">Learn More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
<!-- Footer -->
@include('components.footer')
@endsection
