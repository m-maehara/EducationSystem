<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showArticleList(){

        $articles = Article::all();

        return view('admin.article_list',
        ['articles' => $articles]);

    }

    public function destroyArticle($id){

        $article = Article::find($id);
        $article->delete();
        return redirect()->route('show.article.list');

    }
}
