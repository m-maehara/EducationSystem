<?php

// app/Http/Controllers/DeliveryController.php

namespace App\Http\Controllers;

use App\Models\DeliveryTime;  // ここでインポート
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーが持つ配信情報を取得
        $deliveryTimes = DeliveryTime::where('id', Auth::id())->get();

        // ビューにデータを渡す
        return view('user.delivery', compact('deliveryTimes'));
    }
}

