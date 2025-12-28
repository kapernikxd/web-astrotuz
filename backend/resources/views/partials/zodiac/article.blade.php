<div class="card zodiac-article">
    @if(!empty($block['heading']))
        <h2>{{ $block['heading'] }}</h2>
    @endif
    {!! $block['body'] ?? '' !!}
</div>
