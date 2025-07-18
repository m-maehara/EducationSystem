<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Grade;
use App\Models\Curriculum;

class ProgressController extends Controller
{
    public function showProgress()
{
    $user = Auth::user();
    $grades = Grade::orderBy('id')->get();
    

    $completedLessons = $user->completedLessons()->pluck('curriculumus_id')->toArray();
    

    
    $lessons = [];
    $lessonsPerGrade = 5;

    foreach ($grades as $grade) {
         $curriculums = Curriculum::where('grade_id', $grade->id)->get();
        $gradeLessons = [];
        foreach ($curriculums as $curriculum) {
            $gradeLessons[] = [
                'title' => $curriculum->title, // ← ここでタイトルを取得
                'completed' => in_array($curriculum->id, $completedLessons),
                'disabled' => $grade->id > $user->grade_id,
            ];
        }

        $lessons[] = [
            'grade_name' => $grade->name,
            'lessons' => $gradeLessons,
        ];
    }

    return view('user.curriculum_progress', [
        'user' => $user,
        'grade' => $user->grade,
        'lessons' => $lessons,
    ]);
}

}

