<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    //お知らせ一覧画面
    public function showArticleList(){

        $articles = Article::all();

        return view('admin.article_list',
        ['articles' => $articles]);

    }

    public function destroyArticle($id){

        DB::beginTransaction();
        try{
        $article = Article::find($id);
        $article->delete();
        DB::commit();} catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => '削除に失敗しました。']);
        }
        return redirect()->route('admin.show.article.list');

    }

    //お知らせ新規登録画面
    public function showArticleCreate(){

        return view('admin.article_create');
    }

    public function storeArticle(ArticleRequest $request){

        DB::beginTransaction();
        try{
        $input = $request->all();
        Article::create($input);
        DB::commit();} catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => '登録に失敗しました。']);
        }
        return redirect()->route('admin.show.article.create');

    }

    //お知らせ更新画面
    public function showArticleEdit($id){

        $article = Article::find($id);

        return view('admin.article_edit',
        ['article' => $article]);
    }

    public function updateArticle(ArticleRequest $request,$id){

        DB::beginTransaction();
        try{
        $article = Article::find($id);
        $attributes = $request->all();
        $article->update($attributes);
        DB::commit();} catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => '登録に失敗しました。']);
        }
        
        return redirect()->route('admin.show.article.edit',['id'=>$article->id]);
    }

    
}
