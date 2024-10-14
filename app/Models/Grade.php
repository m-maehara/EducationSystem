<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // Userテーブルとのリレーション
    public function users()
    {
        return $this->hasMany(User::class,'grade_id' , 'id');
    }

    // Curriculumテーブルとのリレーション
    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
}
