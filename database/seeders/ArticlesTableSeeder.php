<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    public function run()
    {
        Article::create([
            
            'title' => 'お知らせタイトル',
            'posted_date' => '2024-09-01',
            'article_contents' => 'お知らせテキストテキストテキストテキスト',
    
        ]);
    }
}
