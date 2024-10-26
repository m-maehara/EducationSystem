<!DOCTYPE html>
<html lang="ja">    
    <head>
        <meta charset="utf-8">
        <title>管理_ログイン</title>
        <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    </head>
    <body>
    <div class = "login_header">
            <header class = "header">
                <a href = "{{ route('admin.show.register') }}" class = "a_header">新規会員登録はこちら</a>
            </header>
        </div>
        
        <div class = "login_body">
            <div class = "body_title">
                <h1 class = "title">管理画面ログイン</h1>
            </div>

            <div class = "body_from">
                <form action="{{ route('admin.exe.login') }}" method="post" class = "form">
                @csrf
                    <label for="email" class="label_field">
                        <p class="label_text">メールアドレス</p>
                        <input type="text" name="email" class="input_field">
                        @if ($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </label><br>

                    <label for="password" class="label_field">
                        <p class="label_text">パスワード</p>
                        <input type="text" name="password" class="input_field">
                        @if ($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </label><br>

                    <div class = "register_regist">
                        <button class="regist_login">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
