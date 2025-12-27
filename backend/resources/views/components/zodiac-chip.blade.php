@props([
  'label',
  'active' => false,
  'url' => null,
])

@if ($url)
    <a {{ $attributes->merge(['class' => 'zodiac-chip ' . ($active ? 'is-active' : '')]) }} href="{{ $url }}">
        <span class="zodiac-icon">
            {{ $slot }}
        </span>
        <span class="zodiac-label">{{ $label }}</span>
    </a>
@else
    <button {{ $attributes->merge(['class' => 'zodiac-chip ' . ($active ? 'is-active' : '')]) }} type="button">
        <span class="zodiac-icon">
            {{ $slot }}
        </span>
        <span class="zodiac-label">{{ $label }}</span>
    </button>
@endif
