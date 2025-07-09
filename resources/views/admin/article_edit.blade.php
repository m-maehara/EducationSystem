<!DOCTYPE html>
@extends('admin.layouts.app')

<link rel="stylesheet" href="{{ asset('css/article.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('admin.show.article.list') }}" class="return">←戻る</a>
    <div class="article_area">
    <h1>お知らせ変更</h1>
    <form method="POST" action="{{route('admin.update.article',$article->id)}}" enctype="multipart/form-data" >
        
    @csrf
        <input type="hidden" name="id" value="{{$article->id}}">

        <div class="article_form">
            <label for="posted_date" class="form-label">投稿日時</label>
            <input id="posted_date" type="text" name="posted_date" class="" value="{{ $article->posted_date }}" required>
        </div>

        <div class="article_form">
            <label for="title" class="form-label">タイトル</label>
            <input id="title" type="text" name="title" class="" value="{{ $article->title }}" required>
        </div>
    
        <div class="article_form">
            <label for="article_contents" class="form-label">本文</label>
            <textarea id="article_contents" name="article_contents" class="" required>{{ $article->article_contents }} </textarea>
        </div>

        <div class="submit_btn">
            <button type="submit">登録</button>
        </div>
    </form>
    </div>
</div>
@endsection