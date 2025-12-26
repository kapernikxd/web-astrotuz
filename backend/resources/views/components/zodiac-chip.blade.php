@props([
  'label',
  'href' => '#',
  'active' => false,
])

<a {{ $attributes->merge(['class' => 'zodiac-chip ' . ($active ? 'is-active' : ''), 'href' => $href]) }}>
    <span class="zodiac-icon">
        {{ $slot }}
    </span>
    <span class="zodiac-label">{{ $label }}</span>
</a>
