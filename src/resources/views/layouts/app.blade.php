    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')

<body>
<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/">
        <img src="{{ asset('storage/images/logo.svg') }}" alt="logo">
        </a>

        <form class="header__search" action="/" method="GET">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="何をお探しですか？">
        </form>

        <nav class="header__nav">
            @auth
            <form id="logout-form" action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                ログアウト
            </button>
            </form>
            @endauth

            @guest
                <a href="/login" class="login-btn">ログイン</a>
            @endguest

            <a href="/mypage" class="mypage-btn">マイページ</a>
            <form class="exhibition-button" action="/sell" method="GET">
                <button type="submit" class="exhibition-button">出品</button>
            </form>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>
</body>
