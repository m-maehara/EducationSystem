<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/register');
    }

    public function exeRegisterForm(Request $request)
    {
        $request->validate([
            'name' =>  ['required', 'max:255'],
            'kana' => ['required', 'max:255'],
            'email' => ['required', 'max:255' , 'regex:/^[a-zA-Z0-9@]+$/'],
            'password' => ['required', 'min:8' , 'max:255' , 'regex:/^[a-zA-Z0-9]+$/'],
            'passconf' => ['required' , 'same:password'],
        ],[
            'name.required' => 'ユーザーネームは入力必須項目です',
            'name.max' => 'ユーザーネームは255文字以内で入力してください',
            'kana.required' => 'カナは入力必須項目です',
            'kana.max' => 'カナは255文字以内で入力してください',
            'email.required' => 'メールアドレスは入力必須項目です',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'email.regex' => 'メールアドレスは半角で入力してください',
            'password.required' => 'パスワードは入力必須項目です',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは255文字以内で入力してください',
            'password.regex' => 'パスワードは半角で入力してください',
            'passconf.required' => 'パスワード確認は入力必須項目です',
            'passconf.same' => 'パスワードが一致しません',
        ]);

        //登録処理
        Admin::storeAdmin($request->all());
        //rogin画面を表示　一時的に登録画面を表示している。
        return redirect()->route('admin.show.login');
    }
}
