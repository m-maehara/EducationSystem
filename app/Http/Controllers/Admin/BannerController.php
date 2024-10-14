<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function showBannerEdit()
    {
        $banners = Banner::getAllBanners();
        
        return view('admin/banner_edit', ['banners' => $banners]);
    }

    public function exeBannerEdit(Request $request)
    {
        dd("a");
        // 削除処理
        Banner::deleteBanners($request->delete_banner_ids);
        // 追加処理
        Banner::addBanners($request->file('new_banners'));

        return redirect()->route('admin.show.banner.edit');
    }
}
