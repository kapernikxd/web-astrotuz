@props([
  'activeKey' => null,
  'items' => [],
])

<div class="zodiac-grid">
  @foreach($items as $item)
    <x-zodiac-chip
      :label="$item['label'] ?? ''"
      :url="$item['url'] ?? null"
      :active="($item['key'] ?? null) === $activeKey"
    >
      {!! $item['svg'] ?? '' !!}
    </x-zodiac-chip>
  @endforeach
</div>
