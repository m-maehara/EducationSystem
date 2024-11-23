<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function delivery()
    {
        // ログインユーザーが作成した配信情報を取得
        $deliveries = Delivery::where('user_id', Auth::id())->get();

        return view('user.delivery', compact('deliveries'));
    }
}
