@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="hero">
        <div class="hero__inner">
            <h1 class="hero__title">{{ $title }}</h1>
            <p class="hero__subtitle">{{ $subtitle }}</p>
        </div>
    </section>

    <section class="cards">
        @foreach ($content as $line)
            <article class="card">
                <p class="card__desc">{{ $line }}</p>
            </article>
        @endforeach
    </section>
@endsection
