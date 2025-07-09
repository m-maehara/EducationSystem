<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    //お知らせ一覧画面
    public function showArticleList(){

        $articles = Article::all();

        return view('admin.article_list',
        ['articles' => $articles]);

    }

    public function destroyArticle($id){

        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.show.article.list');

    }

    //お知らせ新規登録画面
    public function showArticleCreate(){

        return view('admin.article_create');
    }

    public function storeArticle(Request $request){

        $input = $request->all();
        Article::create($input);
        return redirect()->route('admin.show.article.create');

    }

    //お知らせ更新画面
    public function showArticleEdit($id){

        $article = Article::find($id);

        return view('admin.article_edit',
        ['article' => $article]);
    }

    public function updateArticle(Request $request,$id){

        $article = Article::find($id);
        $attributes = $request->all();
        $article->update($attributes);
        
        return redirect()->route('admin.show.article.edit',['id'=>$article->id]);
    }

    
}
