<header class="topbar">
    <div class="container topbar__inner">

        <button class="burger mobile-only-flex" type="button" id="burgerBtn"
                aria-label="Открыть меню" aria-controls="mobileMenu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <a class="brand" href="/">
            <span class="brand__mark" aria-hidden="true">✦</span>
            <span class="brand__text">ASTROTUZ</span>
        </a>

        <nav class="desktop-nav desktop-only" aria-label="Главное меню">
            <a class="nav__link {{ request()->routeIs('natal') ? 'is-active' : '' }}" href="{{ route('natal') }}">Натальная Карта</a>
            <a class="nav__link {{ request()->routeIs('horoscope') ? 'is-active' : '' }}" href="{{ route('horoscope') }}">Гороскоп</a>
            <a class="nav__link {{ request()->routeIs('lunar') ? 'is-active' : '' }}" href="{{ route('lunar') }}">Лунные</a>
            <a class="nav__link {{ request()->routeIs('feng-shui') ? 'is-active' : '' }}" href="{{ route('feng-shui') }}">Фен-Шуй</a>
            <a class="nav__link {{ request()->routeIs('test-my') ? 'is-active' : '' }}" href="{{ route('test-my') }}">Тест-My?</a>
            <a class="nav__link {{ request()->routeIs('talismans') ? 'is-active' : '' }}" href="{{ route('talismans') }}">Талисманы</a>
            <a class="nav__link {{ request()->routeIs('compatibility') ? 'is-active' : '' }}" href="{{ route('compatibility') }}">Совместимость</a>
        </nav>

        <div class="topbar__actions">
            <button class="topbar__icon" type="button" aria-label="Поиск">
                <svg viewBox="0 0 24 24">
                    <path d="M10.5 18.5a8 8 0 1 1 5.05-1.8l4.13 4.13-1.41 1.41-4.13-4.13a7.96 7.96 0 0 1-3.64.89Z" />
                </svg>
            </button>

            <div class="topbar__divider"></div>

            <button class="topbar__icon" type="button" aria-label="Профиль">
                <svg viewBox="0 0 24 24">
                    <path d="M12 12a4.5 4.5 0 1 0-4.5-4.5A4.5 4.5 0 0 0 12 12Zm0 2c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5Z" />
                </svg>
            </button>
        </div>

    </div>
</header>
