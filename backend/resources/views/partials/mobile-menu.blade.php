<div class="menu-overlay" id="menuOverlay" hidden>
    <div class="menu-sheet" id="mobileMenu" role="dialog" aria-modal="true">

        <div class="menu-head">
            <div class="menu-brand">
                <span class="menu-brand__moon">☾</span>
                <span>ASTROTUZ</span>
            </div>

            <button class="menu-close" id="menuCloseBtn" aria-label="Закрыть меню">✕</button>
        </div>

        <nav class="menu-list">
            <a class="menu-item" href="{{ route('natal') }}"><span class="menu-ic">≡</span><span class="menu-txt">Натальная карта</span></a>
            @foreach ($menuItems ?? [] as $menuItem)
                <a class="menu-item" href="{{ $menuItem->url ?? '#' }}">
                    <span class="menu-ic">{{ $menuItem->icon ?: '•' }}</span>
                    <span class="menu-txt">{{ $menuItem->title }}</span>
                </a>
            @endforeach
        </nav>

        <button class="menu-logout">Выйти</button>
    </div>
</div>
