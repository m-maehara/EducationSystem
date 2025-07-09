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

    public function storeArticle(Request $request){

        $request->validate([

            'title'=>'required',
            'posted_date'=>'required',
            'article_contents'=>'required',

        ]);

        $article = new Article([

            'title' => $request->get('title'),
            'posted_date' => $request->get('posted_date'),
            'article_contents' => $request->get('article_contents'),

        ]);

    }

    public function updateArticle(Request $request, $id){

        $request->validate([

            'title'=>'required',
            'posted_date'=>'required',
            'article_contents'=>'required',

        ]);

        


    }


}
