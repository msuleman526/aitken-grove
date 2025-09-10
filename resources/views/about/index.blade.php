@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description)
@section('canonical_url', $page->canonical_url ?? url()->current())
@section('meta_robots', $page->meta_robots ?? 'index, follow')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about-hero-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/heart-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/gallery-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/journey-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/specialists-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/firststep-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/testimonials-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/about-counts-section.css') }}">
@endpush

@section('content')
@include('components.header')


<!-- About Hero Section -->
<x-about-hero-section :section="$aboutHeroSection" />

<!-- About Counts Section -->
<x-about-counts-section :section="$aboutCountsSection" />

<!-- Heart Section -->
<x-heart-section :section="$heartSection" />

<!-- Gallery Section -->
<x-gallery-section :section="$gallerySection" />

<!-- Journey Section -->
<x-journey-section :section="$journeySection" />

<!-- Specialists Section -->
@if($specialistsSection)
@include('components.specialists-section', ['section' => $specialistsSection])
@endif

<!-- FirstStep Section -->
@if($firststepSection)
@include('components.firststep-section', ['section' => $firststepSection])
@endif

<!-- Testimonials Section -->
@if($testimonialsSection)
@include('components.testimonials-section', ['section' => $testimonialsSection])
@endif

<!-- Footer -->
@include('components.footer')
@endsection