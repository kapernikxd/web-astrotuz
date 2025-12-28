<div class="card zodiac-hero">
    <div class="zodiac-hero__content">
        @if(!empty($block['eyebrow']))
            <span class="zodiac-hero__eyebrow">{{ $block['eyebrow'] }}</span>
        @endif
        @if(!empty($block['title']))
            <h1>{{ $block['title'] }}</h1>
        @endif
        @if(!empty($block['intro']))
            <p class="muted">{!! nl2br(e($block['intro'])) !!}</p>
        @endif
    </div>
</div>
