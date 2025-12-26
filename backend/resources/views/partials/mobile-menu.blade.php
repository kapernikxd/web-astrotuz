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
            <a class="menu-item" href="#"><span class="menu-ic">＋</span><span class="menu-txt">Гороскоп</span></a>
            <a class="menu-item" href="#"><span class="menu-ic">☾</span><span class="menu-txt">Лунные</span></a>
            <a class="menu-item" href="#"><span class="menu-ic">✣</span><span class="menu-txt">Фен-Шуй</span></a>
            <a class="menu-item" href="#"><span class="menu-ic">⌁</span><span class="menu-txt">Тест-My?</span></a>
            <a class="menu-item" href="#"><span class="menu-ic">✦</span><span class="menu-txt">Талисманы</span></a>
            <a class="menu-item" href="#"><span class="menu-ic">⟲</span><span class="menu-txt">Совместимость</span></a>
        </nav>

        <button class="menu-logout">Выйти</button>
    </div>
</div>
