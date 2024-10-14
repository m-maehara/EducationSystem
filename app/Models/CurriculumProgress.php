<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    // Userテーブルとのリレーション
    public function users()
    {
        return $this->belongTo(User::class);
    }

    // Curriculumテーブルとのリレーション
    public function curriculums()
    {
        return $this->belongTo(Curriculum::class);
    }
}


