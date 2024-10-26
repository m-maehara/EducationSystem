<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'image'];

    //バナーテーブルからデータを取得
    public static function getAllBanners()
    {
        return self::all();
    }

    // バナーを削除
    public static function deleteBanners($bannerIds)
    {
        // $bannerIdsが配列かつ空白でない
        if (is_array($bannerIds) && !empty($bannerIds)) {
            // 一度に複数のバナーを削除
            self::whereIn('id', $bannerIds)->delete();
        }
    }


    // バナー画像を編集
    public static function updateBanner($bannerData, $index)
    {
        // $indexの値を文字列に変換
        $index = (int) trim($index, '[]');

        // imageを取得できるか確認
        if (isset($bannerData[$index]['image'])) {
            // imageを$imageに格納
            $image = $bannerData[$index]['image'];
            // 画像を保存する
            $path = $image->storeAs('public/images/banner', $image->getClientOriginalName());
            $imagePath = 'storage/images/banner/' . $image->getClientOriginalName();
            
            // バナーを更新
            self::where('id', $index)->update([
                'image' => $imagePath,
            ]);
        } else {
            return redirect()->route('admin.show.banner.edit');
        }
    }

    // バナー画像を追加
    public static function addBanner($bannerData, $index){
        // $indexの値を文字列に変換
        $index = (int) trim($index, '[]');

        if (isset($bannerData[$index]['image'])) {
            // imageを$imageに格納
            $image = $bannerData[$index]['image'];
            // 画像を保存する
            $path = $image->storeAs('public/images/banner', $image->getClientOriginalName());
            $imagePath = 'storage/images/banner/' . $image->getClientOriginalName();

            self::create([
                'id' => $index,
                'image' => $imagePath,
            ]);
        }
    }





    // // バナー画像を編集
    // public static function updateBanner($bannerData, $index)
    // {
    //     if (isset($bannerData['image'])) {
    //         $image = $bannerData['image'];

    //         // 画像を保存する
    //         $path = $image->storeAs('public/images/banner', $image->getClientOriginalName());

    //         $imagePath = 'storage/images/banner/' . $image->getClientOriginalName();

    //         // バナーを更新
    //         self::where('id', $index)->update([
    //             'image' => $imagePath,
    //         ]);
    //     }
    // }

    // // バナーを追加
    // public static function addBanner($bannerData)
    // {
    //     if (isset($bannerData['image'])) {
    //         $image = $bannerData['image'];

    //         // 画像を保存する
    //         $path = $image->storeAs('public/images/banner', uniqid() . '_' . $image->getClientOriginalName());

    //         $imagePath = 'storage/images/banner/' . $image->getClientOriginalName();

    //         // データベースに新しいバナーを作成
    //         self::create([
    //             'image' => $imagePath,
    //         ]);
    //     }
    // }

}
