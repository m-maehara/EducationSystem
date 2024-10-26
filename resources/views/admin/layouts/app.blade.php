<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'デフォルトタイトル')</title>
    <link rel="stylesheet" href="{{ asset('css/admin/head.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/top.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/banner.css') }}">
</head>
<body>
    <div class = "publicLayouts">  
        <div class="publicLayouts_a">
            <div class = "publicClassManagement">
                <a href="#" class="a">授業管理</a>
            </div>
            <div class = "publicNoticeManagement">
                <a href="#" class="a">お知らせ管理</a>
            </div>
            <div class = "publicBannerManagement">
                <a href="{{ route('admin.show.banner.edit') }}" class="a">バナー管理</a>
            </div>
        </div>
        
        <div class = "logout">
            <form action="{{ route('admin.exe.logout') }}" method="post" class = "form">
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