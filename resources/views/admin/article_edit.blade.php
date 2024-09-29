<!DOCTYPE html>
@extends('admin.layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('admin.show.top') }}" class="return">←戻る</a>

    <h1>お知らせ変更</h1>

    <div>
    <form method="POST" action="{{route('')}}" enctype="multipart/form-data" >
        
        @csrf
        <input type="hidden" name="id" value="{{$article->id}}">

        <div class="mb-3">
            <label for="" class="form-label">投稿日時</label>
            <input id="" type="text" name="" class="" value="{{ $article->posted_date }}" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">タイトル</label>
            <input id="" type="text" name="" class="" value="{{ $article->title }}" required>
        </div>
    
        <div class="mb-3">
            <label for="" class="form-label">本文</label>
            <textarea id="" name="" class="" value="{{ $article->article_contents }}" ></textarea>
        </div>

        <div class="create-button">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
    </div>
</div>
@endsection