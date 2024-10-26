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
        // 削除するバナーIDを取得
        $deleteBannerIds = json_decode($request->input('delete_banner_ids', '[]'), true);
        // テーブルの最後に取得したIDを格納
        $lastIndex = $request->input('last_index');
        
        // バナーを削除
        Banner::deleteBanners($deleteBannerIds);
        
        // viewで送られてきたファイルを格納
        $banners = $request->file('banners');
        
        if($lastIndex == 0){
            if($banners){
                foreach ($banners as $key => $file) {
                    Banner::addBanner($banners, $key);
                }
            }
        }else{
            // bannersにデータがあるかを確認
            if($banners){
                foreach ($banners as $key => $file) {
                    // バナーIDを取得
                    $bannersId = $request->input('banner_id');
                    // dd($lastIndex);
                    // 既存のバナーと追加のバナーで分ける
                    if($key <= $lastIndex){
                        // バナーを更新する
                        Banner::updateBanner($banners, $key);
                    }else{
                        // dd("新規");
                        Banner::addBanner($banners, $key);
                    }
                }
            }
        }
        return redirect()->route('admin.show.banner.edit');
    }
}