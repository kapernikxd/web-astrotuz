<x-filament-panels::page>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/zodiac-builder.css') }}">
    @endpush

    <div class="space-y-10">
        @foreach ($sections as $section)
            <x-filament::section>
                <x-slot name="heading">
                    {{ $section['title'] }}
                </x-slot>
                <x-slot name="description">
                    {{ $section['description'] }}
                </x-slot>

                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($section['blocks'] as $block)
                        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                            <div class="space-y-1 border-b border-gray-200 px-4 py-3">
                                <p class="text-sm font-semibold text-gray-900">{{ $block['label'] }}</p>
                                <p class="text-xs text-gray-500">{{ $block['path'] }}</p>
                            </div>

                            <div class="space-y-3 px-4 py-3 text-sm text-gray-600">
                                <p>{{ $block['summary'] }}</p>
                                @if (!empty($block['use_cases']))
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">Когда использовать</p>
                                        <ul class="mt-1 list-disc space-y-1 pl-4 text-xs text-gray-500">
                                            @foreach ($block['use_cases'] as $useCase)
                                                <li>{{ $useCase }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="border-t border-gray-200 bg-gray-50 px-4 py-4">
                                <div class="rounded-lg border border-dashed border-gray-200 bg-white p-4">
                                    @include($block['partial'], $block['data'])
                                </div>
                            </div>

                            @if (!empty($block['mock']))
                                <div class="border-t border-gray-200 bg-white px-4 py-3">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">Mock данные</p>
                                    <pre class="mt-2 overflow-auto rounded-lg bg-gray-900 p-3 text-xs text-gray-100">{{ json_encode($block['mock'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </x-filament::section>
        @endforeach
    </div>
</x-filament-panels::page>
