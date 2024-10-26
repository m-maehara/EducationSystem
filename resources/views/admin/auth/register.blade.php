<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>管理_新規ユーザー登録</title>
        <link rel="stylesheet" href="{{ asset('css/admin/register.css') }}">
    </head>
    <body>
        
        <div class = "register_header">
            <header class = "header">
                <a href = "{{ route('admin.show.login') }}" class = "a_header">ログインはこちら</a>
            </header>
        </div>
        
        <div class = "register_body">
            <div class = "body_title">
                <h1 class = "title">新規管理ユーザー登録</h1>
            </div>

            <div class = "body_form">
                <form action="{{ route('admin.exe.register') }}" method="post" class = "form">
                @csrf
                    <label for="name" class="label_field">
                        <p class="label_text">ユーザーネーム</p>
                        <input type="text" name="name" class="input_field">
                        @if ($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </label><br>

                    <label for="kana" class="label_field">
                        <p class="label_text">カナ</p>
                        <input type="text" name="kana" class="input_field">
                        @if ($errors->has('kana'))
                            <div class="error">{{ $errors->first('kana') }}</div>
                        @endif
                    </label><br>

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

                    <label for="passconf" class="label_field">
                        <p class="label_text">パスワード確認</p>
                        <input type="text" name="passconf" class="input_field">
                        @if ($errors->has('passconf'))
                            <div class="error">{{ $errors->first('passconf') }}</div>
                        @endif
                    </label><br>

                    <div class = "register_regist">
                        <button class="regist_regist">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
