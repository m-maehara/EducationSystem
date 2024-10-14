<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    //バナーテーブルからデータを取得
    public static function getAllBanners()
    {
        //debug_print_backtrace();
        return self::all();
    }

    // バナー削除
    public static function deleteBanners($delete_banner_ids)
    {
        if ($delete_banner_ids) {
            foreach ($delete_banner_ids as $id) {
                $banner = self::find($id);
                if ($banner) {
                    $storagePath = str_replace('storage/', 'public/', $banner->path);
                    Storage::delete($storagePath); 
                    $banner->delete();
                }
            }
        }
    }

    //バナー追加
    public static function addBanners($new_banners)
    {
        if ($new_banners) {
            foreach ($new_banners as $file) {
                //画像ファイルを storage/app/public/images/banner に保存
                $path = $file->storeAs('public/images/banner', $file->getClientOriginalName());
                dd($path);
                //DBには 'storage/images/banner/ファイル名' の形式で保存
                self::create([
                    'path' => str_replace('public/', 'storage/', $path),
                ]);
            }
        }
    }
}
