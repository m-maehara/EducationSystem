<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable =
    [
        'title',
        'posted_date',
        'article_contents',

    ];

    public function getList() {
        
        $article = DB::table('articles')->get();

        return $article;
    }
}
