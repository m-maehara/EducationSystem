<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    public function run()
    {
        Article::create([
            
            'title' => 'お知らせタイトル1',
            'posted_date' => '2024-09-01',
            'article_contents' => 'お知らせテキストテキストテキストテキスト',
    
        ]);

        Article::create([
            
            'title' => 'お知らせタイトル2',
            'posted_date' => '2024-09-10',
            'article_contents' => 'お知らせテキストテキストテキストテキスト',
    
        ]);

        Article::create([
            
            'title' => 'お知らせタイトル3',
            'posted_date' => '2024-09-20',
            'article_contents' => 'お知らせテキストテキストテキストテキスト',
    
        ]);

        Article::create([
            
            'title' => 'お知らせタイトル4',
            'posted_date' => '2024-09-30',
            'article_contents' => 'お知らせテキストテキストテキストテキスト',
    
        ]);
    }
}
