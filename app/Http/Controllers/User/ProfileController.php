<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use app\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //プロフィール編集画面
    public function showProfileForm(){
        
        $user = Auth::user();
        return view('user.profile_edit',
        ['user'=> $user]);

    }

    public function updateProfile(ProfileRequest $request){

        $user = Auth::user();
        DB::beginTransaction();
        try {
           $attributes = $request->all();
           $user->update($attributes);
           DB::commit();
           } catch (\Exception $e) {
           DB::rollBack();
           return back()->withErrors(['error' => 'プロフィールの更新に失敗しました。']);
           }
        
        return redirect()->route('user.show.profile.edit');
    }

    //パスワード変更画面
    public function showPasswordForm(){
        
        return view('user.password_edit');

    }

    public function updatePassword(PasswordRequest $request){

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => '現在のパスワードが正しくありません。']);
        }

        DB::beginTransaction();
        try {
           $user->update([
            'password' => Hash::make($request->new_password),
            ]);
           DB::commit();
           return redirect()->route('user.show.password.edit')->with('success', 'パスワードを更新しました！');
          } catch (\Exception $e) {
           DB::rollBack();
           return back()->withErrors(['error' => 'パスワードの更新に失敗しました。']);
    }

    }
}
