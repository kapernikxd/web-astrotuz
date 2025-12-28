@php
    $items = $block['nav_items'] ?? [];
@endphp

@if(count($items))
    <nav class="zodiac-nav" aria-label="{{ $block['aria_label'] ?? 'Zodiac navigation' }}">
        <ul class="zodiac-nav__list">
            @foreach($items as $item)
                @php
                    $isActive = $item['is_active'] ?? false;
                    $url = $item['url'] ?? '#';
                @endphp
                <li class="zodiac-nav__item">
                    <a
                        class="zodiac-nav__link {{ $isActive ? 'is-active' : '' }}"
                        href="{{ $url }}"
                        @if($isActive) aria-current="page" @endif
                    >
                        {{ $item['label'] ?? '' }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
