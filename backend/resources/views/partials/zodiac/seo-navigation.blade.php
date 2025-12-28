@php
    $items = $block['toc_items'] ?? [];
@endphp

@if(count($items))
    <nav class="card zodiac-toc" aria-label="{{ $block['aria_label'] ?? 'Zodiac contents' }}">
        @if(!empty($block['toc_title']))
            <h2 class="zodiac-toc__title">{{ $block['toc_title'] }}</h2>
        @endif
        <ul class="zodiac-toc__list">
            @foreach($items as $item)
                @php
                    $url = $item['url'] ?? '#';
                @endphp
                <li class="zodiac-toc__item">
                    <a class="zodiac-toc__link" href="{{ $url }}">
                        {{ $item['label'] ?? '' }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
