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
                <a href="#">時間割</a>
            </div>
            <div class = "publicNoticeManagement">
                <a href="#">授業進捗</a>
            </div>
            <div class = "publicBannerManagement">
                <a href="#">プロフィール設定</a>
            </div>
        </div>
        
        <div class = "logout">
            <form action="" method="post" class = "form">
            @csrf
            <button type="submit">ログアウト</button>
            </form>        
        </div>
    </div>
    
    <div class = "contents">
        @yield('content')
    </div>
</body>
</html>