@extends('layouts.app')

@section('title', $page->seo?->meta_title ?: $page->title)
@section('meta_description', $page->seo?->meta_description)

@section('content')
    <section class="content">
        <x-card class="hero">
            <h1>{{ $page->title }}</h1>
            {!! $page->content !!}
        </x-card>
    </section>
@endsection
