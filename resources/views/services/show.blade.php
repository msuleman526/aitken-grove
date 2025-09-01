@extends('layouts.app')

@section('title', $service->meta_title ?: $service->title)
@section('meta_description', $service->meta_description ?: $service->description)
@section('canonical_url', $service->canonical_url)
@section('meta_robots', $service->meta_robots)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/service-hero.css') }}">
<link rel="stylesheet" href="{{ asset('css/about-service.css') }}">
@endpush

@section('content')
    @include('components.header')
    
    <x-service-hero :service="$service" />
    
    <x-about-service :service="$service" />
    
    <!-- Footer -->
    @include('components.footer')
@endsection
