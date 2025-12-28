<section class="compatibility">
    <div class="compatibility__head">
        @if(!empty($block['compatibility_title']))
            <h2>{{ $block['compatibility_title'] }}</h2>
        @endif
        @if(!empty($block['description']))
            <p class="muted">{!! nl2br(e($block['description'])) !!}</p>
        @endif
    </div>

    @if(!empty($block['items']))
        <div class="compatibility__scroll" aria-label="Ссылки на совместимость">
            @foreach($block['items'] as $item)
                <a class="compatibility-card" href="{{ $item['url'] ?? '#' }}">
                    @if(!empty($item['label']))
                        <span class="compatibility-card__label">{{ $item['label'] }}</span>
                    @endif
                    @if(!empty($item['meta']))
                        <span class="compatibility-card__meta">{{ $item['meta'] }}</span>
                    @endif
                    @if(!empty($item['cta']))
                        <span class="compatibility-card__cta">{{ $item['cta'] }}</span>
                    @endif
                </a>
            @endforeach
        </div>
    @endif
</section>
