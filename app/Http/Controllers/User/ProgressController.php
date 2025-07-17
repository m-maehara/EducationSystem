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
    $grade = Grade::pluck('name')->toArray();
    $currentGradeName = $user->grade?->name ?? '未設定'; 
    $currentGradeIndex = array_search($currentGradeName, $grade);

    $completedLessons = $user->completedLessons()->pluck('curriculumus_id')->toArray();
    

    
    $lessons = [];
    $lessonsPerGrade = 5;

    foreach ($grade as $gradeIndex => $gradeName) {
        $gradeLessons = [];
        for ($i = 1; $i <= $lessonsPerGrade; $i++) {
            $lessonId = $gradeIndex * $lessonsPerGrade + $i;
            $gradeLessons[] = [
                'title' => "授業タイトル",
                'completed' => in_array($lessonId, $completedLessons),
                'disabled' => $gradeIndex > $currentGradeIndex,
            ];
        }

        $lessons[] = [
            'grade_name' => $gradeName,
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

