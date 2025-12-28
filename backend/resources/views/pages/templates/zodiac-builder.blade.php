@extends('layouts.page-main')

@section('title', $page->meta_title ?: $page->title)

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
        @endswitch
    @endforeach
@endsection
