<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function showProgress(){
        
        return view('user.curriculum_progress');

    }
}
