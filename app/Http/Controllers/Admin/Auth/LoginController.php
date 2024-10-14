<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin/auth/login');
    }

    public function exeLoginForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'max:255' , 'regex:/^[a-zA-Z0-9@]+$/'],
            'password' => ['required', 'min:8' , 'regex:/^[a-zA-Z0-9]+$/'],
        ],[
            'email.required' => 'メールアドレスは入力必須項目です',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'email.regex' => 'メールアドレスは半角で入力してください',
            'password.required' => 'パスワードは入力必須項目です',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.regex' => 'パスワードは半角で入力してください',
        ]);
        
        $email = $request->input('email');
        $password = $request->input('password');
        
        if (Admin::attemptLogin($email, $password)) {
            //dd($email, $password,Admin::where('email', $email)->first()->id);
            return redirect()->route('admin.show.top')->with('success', 'ログインに成功しました');
        }

        return redirect()->back()->withErrors(['email' => '認証に失敗しました。']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.show.login');
    }

}
