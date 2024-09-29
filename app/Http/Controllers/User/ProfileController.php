<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use app\Models\user;

class ProfileController extends Controller
{
    public function showProfileForm(){
        
        return view('user.profile_edit');

    }

    public function showPasswordForm(){
        
        return view('user.password_edit');

    }
}
