<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTopController extends Controller
{
    /**
     * ユーザーのトップページを表示します。
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.top'); // user/top.blade.php を表示
    }
    public function __construct()
    {
        $this->middleware('auth'); // 認証されているユーザーのみアクセス可能
    }
}
