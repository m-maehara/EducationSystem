<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'デフォルトタイトル')</title>
</head>
<body>
    <div class = "publicLayouts">  
        <div>
            <div class = "publicClassManagement">
                <a href="#">授業管理</a>
            </div>
            <div class = "publicNoticeManagement">
                <a href="#">お知らせ管理</a>
            </div>
            <div class = "publicBannerManagement">
                <a href="{{ route('admin.show.banner.edit') }}">バナー管理</a>
            </div>
        </div>
        
        <div class = "logout">
            <form action="{{ route('admin.exe.logout') }}" method="post" class = "form">
            @csrf
            <button type="submit">ログアウト</button>         
        </div>
    </div>
    
    <div class = "contents">
        @yield('content')
        @yield('scripts')
    </div>
</body>
</html>