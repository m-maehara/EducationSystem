<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>管理_新規ユーザー登録</title>
    </head>
    <body>
        
        <div class = "register_header">
            <header class = "header">
                <a href = "{{ route('admin.show.login') }}">ログインはこちら</a>
            </header>
        </div>
        
        <div class = "register_body">
            <div class = "body_title">
                <h1 class = "title">新規管理ユーザー登録</h1>
            </div>

            <div class = "body_form">
                <form action="{{ route('admin.exe.register') }}" method="post" class = "form">
                @csrf
                    <label for="name">
                        ユーザーネーム
                        <input type="text" name="name">
                        @if ($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </label><br>

                    <label for="kana">
                        カナ
                        <input type="text" name="kana">
                        @if ($errors->has('kana'))
                            <div class="error">{{ $errors->first('kana') }}</div>
                        @endif
                    </label><br>

                    <label for="email">
                        メールアドレス
                        <input type="text" name="email">
                        @if ($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </label><br>

                    <label for="password">
                        パスワード
                        <input type="text" name="password">
                        @if ($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </label><br>

                    <label for="passconf">
                        パスワード確認
                        <input type="text" name="passconf">
                        @if ($errors->has('passconf'))
                            <div class="error">{{ $errors->first('passconf') }}</div>
                        @endif
                    </label><br>

                    <div class = "register_regist">
                        <button>登録</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
