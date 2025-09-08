@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description)
@section('canonical_url', $page->canonical_url ?? url()->current())
@section('meta_robots', $page->meta_robots ?? 'index, follow')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/hero-contact-section.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/firststep-section.css') }}">
@endpush

@section('content')
@include('components.header')

<!-- HeroContact Section -->
<x-hero-contact-section :section="$heroContactSection" />

<!-- FirstStep Section -->
@include('components.firststep-section', ['section' => $firstStepSection])

<!-- Footer -->
@include('components.footer')
@endsection
