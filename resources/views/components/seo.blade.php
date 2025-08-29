@props(['page'])

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO Meta Tags -->
<title>{{ $page->meta_title ?? $page->title }}</title>
<meta name="description" content="{{ $page->meta_description }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph Meta Tags -->
@if($page->open_graph_json)
    <meta property="og:title" content="{{ $page->open_graph_json['title'] ?? $page->meta_title ?? $page->title }}">
    <meta property="og:description" content="{{ $page->open_graph_json['description'] ?? $page->meta_description }}">
    <meta property="og:type" content="{{ $page->open_graph_json['type'] ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if(isset($page->open_graph_json['image']))
        <meta property="og:image" content="{{ $page->open_graph_json['image'] }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif
    <meta property="og:site_name" content="Aitken Grove Medical & Aesthetic Center">
@endif

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $page->meta_title ?? $page->title }}">
<meta name="twitter:description" content="{{ $page->meta_description }}">
@if($page->open_graph_json && isset($page->open_graph_json['image']))
    <meta name="twitter:image" content="{{ $page->open_graph_json['image'] }}">
@endif

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<!-- Primary Color CSS Variable -->
<style>
    :root {
        --primary: {{ config('app.primary_color', '#E62D5B') }};
    }
</style>
