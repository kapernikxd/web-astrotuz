@extends('layouts.app')

@section('content')
    {{-- LEFT SIDEBAR --}}
    <aside class="sidebar desktop-only">
        @if($leftSidebarCards->isNotEmpty())
            <div class="sidebar-links">
                @foreach($leftSidebarCards as $card)
                    <a class="card sidebar-card" href="{{ $card->url }}">
                        <span class="sidebar-card__title">{{ $card->title }}</span>
                        @if($card->description)
                            <span class="sidebar-card__desc">{{ $card->description }}</span>
                        @endif
                        @if($card->cta_label)
                            <span class="sidebar-card__cta">{{ $card->cta_label }}</span>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif
    </aside>

    {{-- CONTENT --}}
    <section class="content">
        @yield('page_content')
    </section>

    {{-- RIGHT SIDEBAR --}}
    <aside class="sidebar desktop-only">
        @foreach($rightSidebarBlocks as $block)
            <x-card class="glass-card">
                <h4 class="glass-title">{{ $block->title }}</h4>
                @if($block->type === 'content')
                    {!! $block->content !!}
                @elseif($block->type === 'zodiac_grid')
                    <x-zodiac-grid :items="$block->zodiac_items ?? []" activeKey="aries" />
                @endif
            </x-card>
        @endforeach
    </aside>
@endsection
