<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;

    // Curriculumテーブルとのリレーション
    public function curriculums()
    {
        return $this->belongsTo(Curriculum::class, 'curriculums_id', 'id');
    }
}
