<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* カスタムオレンジの背景色 */
        .bg-orange {
            background-color: #FF8C00 !important;
        }
        
        /* カスタムオレンジボタン */
        .btn-orange {
            background-color: #FF8C00;
            color: #ffffff;
            border: none;
        }

        .btn-orange:hover {
            background-color: #FF7F00;
        }

        .btn-orange:focus {
            outline: none;
            box-shadow: none;
        }

        /* ログアウトリンクの文字色を黒に変更 */
        .navbar-nav .nav-link.logout-link {
            color: black !important; /* 文字色を黒に */
        }

        .navbar-nav .nav-link.logout-link:hover {
            color: #333 !important; /* ホバー時も黒に近い色 */
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- ログイン、新規登録、/user/deliveryページ以外でヘッダーを表示 -->
        @if (!Route::is('login') && !Route::is('register'))
            <nav class="navbar navbar-expand-md navbar-light bg-orange shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- Laravelの文字を削除 -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                            <button class="btn btn-success" onclick="window.location.href='{{ route('curriculum_list') }}'">時間割</button>
                            </li>
                            <li class="nav-item">
                            <button class="btn btn-success" onclick="window.location.href='{{ route('progress') }}'">授業進捗</button>
                            </li>
                            <li class="nav-item">
                            <button class="btn btn-success" onclick="window.location.href='{{ route('profile') }}'">プロフィール設定</button>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <!-- ログアウトボタン -->
                                <li class="nav-item">
                                    <a class="nav-link logout-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <!-- /login, /register, /user/deliveryページ以外でバナー画像を表示 -->
        @if (!Route::is('login') && !Route::is('register') && !Route::is('user.delivery'))
            <div class="banner-slider">
                <div class="banner-images">
                    <img src="{{ asset('images/banner1.jpg') }}" alt="バナー画像1" class="img-fluid banner-image active">
                    <img src="{{ asset('images/banner2.jpg') }}" alt="バナー画像2" class="img-fluid banner-image">
                    <img src="{{ asset('images/banner3.jpg') }}" alt="バナー画像3" class="img-fluid banner-image">
                </div>
                <div class="dots">
                    <span class="dot active" data-slide="0"></span>
                    <span class="dot" data-slide="1"></span>
                    <span class="dot" data-slide="2"></span>
                </div>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
