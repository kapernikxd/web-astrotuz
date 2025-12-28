@extends('layouts.page-blank')

@section('title', $page->seo?->meta_title ?: $page->title)
@section('meta_description', $page->seo?->meta_description)

@section('page_content')
    <x-card class="hero">
        <h1>{{ $page->title }}</h1>
        {!! $page->content !!}
    </x-card>
@endsection
