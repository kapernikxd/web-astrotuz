@props([
  'label',
  'active' => false,
])

<button {{ $attributes->merge(['class' => 'zodiac-chip ' . ($active ? 'is-active' : '')]) }} type="button">
    <span class="zodiac-icon">
        {{ $slot }}
    </span>
    <span class="zodiac-label">{{ $label }}</span>
</button>
