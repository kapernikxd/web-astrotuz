@extends('layouts.page-main')

@section('title', $page->seo?->meta_title ?: $page->title)
@section('meta_description', $page->seo?->meta_description)

@section('page_content')
    @foreach($page->zodiac_blocks ?? [] as $block)
        @switch($block['type'] ?? null)
            @case('hero')
                @include('partials.zodiac.hero', ['block' => $block])
                @break
            @case('article')
                @include('partials.zodiac.article', ['block' => $block])
                @break
            @case('compatibility')
                @include('partials.zodiac.compatibility', ['block' => $block])
                @break
            @case('navigation')
                @include('partials.zodiac.navigation', ['block' => $block])
                @break
            @case('seo_navigation')
                @include('partials.zodiac.seo-navigation', ['block' => $block])
                @break
        @endswitch
    @endforeach
@endsection
