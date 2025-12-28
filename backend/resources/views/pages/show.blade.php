@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title)

@section('content')
    <section class="content">
        <x-card class="hero">
            <h1>{{ $page->title }}</h1>
            {!! $page->content !!}
        </x-card>
    </section>
@endsection
