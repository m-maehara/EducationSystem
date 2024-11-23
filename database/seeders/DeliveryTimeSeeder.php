<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeliveryTimeSeeder extends Seeder
{
    public function run()
    {
        // ダミーデータの挿入
        DB::table('delivery_times')->insert([
            [
                'curriculums_id' => 1,  // 実際のカリキュラムIDに変更
                'delivery_from' => Carbon::now()->addDays(1),  // 明日
                'delivery_to' => Carbon::now()->addDays(1)->addHours(1),  // 明日の1時間後
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 2,  // 実際のカリキュラムIDに変更
                'delivery_from' => Carbon::now()->addDays(2),  // 明後日
                'delivery_to' => Carbon::now()->addDays(2)->addHours(1),  // 明後日の1時間後
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 3,  // 実際のカリキュラムIDに変更
                'delivery_from' => Carbon::now()->addDays(3),  // 3日後
                'delivery_to' => Carbon::now()->addDays(3)->addHours(2),  // 3日後の2時間後
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
