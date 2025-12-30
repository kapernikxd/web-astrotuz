@if($footerSetting)
    @php
        $primaryLinks = collect($footerSetting->primary_links ?? []);
        $secondaryLinks = collect($footerSetting->secondary_links ?? []);
        $socialLinks = collect($footerSetting->social_links ?? []);
    @endphp
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <span class="footer-title">{{ $footerSetting->title }}</span>
                @if($footerSetting->description)
                    <p class="footer-desc">{{ $footerSetting->description }}</p>
                @endif
            </div>

            @if($primaryLinks->isNotEmpty())
                <div class="footer-column">
                    <span class="footer-heading">Разделы</span>
                    <ul class="footer-links">
                        @foreach($primaryLinks as $link)
                            <li>
                                <a href="{{ $link['url'] ?? '#' }}">{{ $link['label'] ?? '' }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($secondaryLinks->isNotEmpty())
                <div class="footer-column">
                    <span class="footer-heading">Полезное</span>
                    <ul class="footer-links">
                        @foreach($secondaryLinks as $link)
                            <li>
                                <a href="{{ $link['url'] ?? '#' }}">{{ $link['label'] ?? '' }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($socialLinks->isNotEmpty())
                <div class="footer-column">
                    <span class="footer-heading">Соцсети</span>
                    <ul class="footer-links">
                        @foreach($socialLinks as $link)
                            <li>
                                <a href="{{ $link['url'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
                                    {{ $link['label'] ?? '' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom__inner">
                <span class="footer-copy">
                    {{ $footerSetting->copyright_line ?? '© ' . now()->year . ' Astrotuz. Все права защищены.' }}
                </span>
                <span class="footer-note">С любовью к звездам ✨</span>
            </div>
        </div>
    </footer>
@endif
