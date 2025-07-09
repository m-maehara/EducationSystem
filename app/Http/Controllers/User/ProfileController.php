<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use app\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //プロフィール編集画面
    public function showProfileForm(){
        
        $user = Auth::user();
        return view('user.profile_edit',
        ['user'=> $user]);

    }

    public function updateProfile(Request $request){

        $user = User::all();
        $attributes = $request->all();
        $user->update($attributes);
        
        return redirect()->route('user.show.profile.edit');
    }

    //パスワード変更画面
    public function showPasswordForm(){
        
        return view('user.password_edit');

    }

    public function updatePassword(Request $request){

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => '現在のパスワードが正しくありません。']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('user.show.password.edit')->with('success', 'パスワードを更新しました！');

    }
}
