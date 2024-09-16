<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Admin extends Authenticatable 
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'kana',
        'email',
        'password'
    ];

    // パスワードをハッシュ化
    public function setPassAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    //管理ユーザー登録画面で登録
    public static function storeAdmin($data)
    {
        DB::table('admins')->insert([
            'name' => $data['name'],
            'kana' => $data['kana'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), 
            'created_at' => now(), 
            'updated_at' => now()  
        ]);
    }

    //ログイン画面でアカウントを取得
    public static function attemptLogin($email, $password)
    {
        // ユーザーを検索
        $admin = self::where('email', $email)->first();

        // ユーザーが存在し、パスワードが一致するかをチェック
        if ($admin && Hash::check($password, $admin->password)) {
            // セッションにユーザーIDを保存してログイン状態にする
            Auth::guard('admin')->login($admin);
            return true;
        }

        return false;
    }
}
