@extends('layouts.app')

@section('title', $service->meta_title ?: $service->title)
@section('meta_description', $service->meta_description ?: $service->description)
@section('canonical_url', $service->canonical_url)
@section('meta_robots', $service->meta_robots)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/service-hero.css') }}">
<link rel="stylesheet" href="{{ asset('css/about-service.css') }}">
<link rel="stylesheet" href="{{ asset('css/why-choose-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/faces-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/testimonials-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/service-testimonials-override.css') }}">
<link rel="stylesheet" href="{{ asset('css/questions-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/service-cta-section.css') }}">
@endpush

@section('content')
    @include('components.header')
    
    <x-service-hero :service="$service" />
    
    <x-about-service :service="$service" />
    
    <x-why-choose-section :service="$service" />

    <x-service-cta-section :service="$service" />
    
    <x-faces-section />
    
    @if($testimonialsSection)
        @include('components.testimonials-section', ['section' => $testimonialsSection])
    @endif
    
    <x-questions-section :service="$service" />
    
    <!-- Footer -->
    @include('components.footer')
@endsection
