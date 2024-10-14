<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'curriculums';

    // delivery_timesテーブルとのリレーション
    public function deliveryTimes()
    {
        return $this->hasMany(DeliveryTime::class, 'curriculums_id', 'id');
    }

    // CurriculumProgressテーブルとのリレーション
    public function curriculumProgress()
    {
        return $this->hasMany(CurriculumProgress::class);
    }

    // Gradeテーブルとのリレーション
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // -------------------------------------------------------------------------------------------------------

    // DeliveryTimesテーブルとともにCurriculumsテーブルを取得
    public static function getCurriculumsWithDeliveryTimes()
    {
        return self::with('deliveryTimes')->get();
    }
}
