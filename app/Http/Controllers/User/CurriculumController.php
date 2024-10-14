<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\User;
use App\Models\Grade;
use Carbon\Carbon;

class CurriculumController extends Controller
{
    public function showCurriculumList(Request $request)
    {
        // 年月の取得（デフォルトは現在の年と月）
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        // CurriculumとUserのデータを取得
        $curriculums = Curriculum::getCurriculumsWithDeliveryTimes();
        $users = User::getUsersWithGrades(); // ログインしているユーザーの学年を取得
        $grades = Grade::all(); 
        
        // Ajaxリクエストの場合、JSONで年と月を返す
        if ($request->ajax()) { 
            return response()->json([
                'year' => $year,
                'month' => $month,
                'curriculums' => $curriculums
            ]);
        }

        // 通常リクエストの場合、ビューを返す
        return view('user/curriculum_list', [
            'curriculums' => $curriculums,
            'users' => $users,
            'grades' => $grades,
            'year' => $year,
            'month' => $month
        ]);
    }
}
