<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use Illuminate\Database\Seeder;

class CurriculumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curriculum::create([
            
            'title' => '授業タイトル1',
    
        ]);

        Curriculum::create([
            
            'title' => '授業タイトル1',
    
        ]);

        Curriculum::create([
            
            'title' => '授業タイトル2',
    
        ]);

        Curriculum::create([
            
            'title' => '授業タイトル3',
    
        ]);

        Curriculum::create([
            
            'title' => '授業タイトル4',
    
        ]);

        Curriculum::create([
            
            'title' => '授業タイトル5',
    
        ]);
    }
}
