<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'デフォルトタイトル')</title>
    <link rel="stylesheet" href="{{ asset('css/user/head.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/curriculum_list.css') }}">
</head>
<body>
    <div class = "publicLayouts">  
        <div class="publicLayouts_a">
            <div class = "publicClassManagement">
                <a href="#" class="a">時間割</a>
            </div>
            <div class = "publicNoticeManagement">
                <a href="#" class="a">授業進捗</a>
            </div>
            <div class = "publicBannerManagement">
                <a href="#" class="a">プロフィール設定</a>
            </div>
        </div>
        
        <div class = "logout">
            <form action="#" method="post" class = "form">
                @csrf
                <button type="submit" class="logout_button">ログアウト</button>      
            </form>   
        </div>
    </div>
    
    <div class = "contents">
        @yield('content')
        @yield('scripts')
    </div>
</body>
</html>