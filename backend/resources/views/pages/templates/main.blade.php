@extends('layouts.page-main')

@section('title', $page->meta_title ?: $page->title)

@section('page_content')
    <x-card class="hero">
        <h1>{{ $page->title }}</h1>
        {!! $page->content !!}
    </x-card>
@endsection
