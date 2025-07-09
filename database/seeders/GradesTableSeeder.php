<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            
            'name' => '小学１年生',
    
        ]);
        Grade::create([
            
            'name' => '小学２年生',
    
        ]);
        Grade::create([
            
            'name' => '小学３年生',
    
        ]);
        Grade::create([
            
            'name' => '小学４年生',
    
        ]);
        Grade::create([
            
            'name' => '小学５年生',
    
        ]);
        Grade::create([
            
            'name' => '小学６年生',
    
        ]);
        Grade::create([
            
            'name' => '中学１年生',
    
        ]);
        Grade::create([
            
            'name' => '中学２年生',
    
        ]);
        Grade::create([
            
            'name' => '中学３年生',
    
        ]);
        Grade::create([
            
            'name' => '高校１年生',
    
        ]);
        Grade::create([
            
            'name' => '高校２年生',
    
        ]);
        Grade::create([
            
            'name' => '高校３年生',
    
        ]);

    }
}
