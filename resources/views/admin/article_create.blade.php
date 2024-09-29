<!DOCTYPE html>
@extends('admin.layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('admin.show.top') }}" class="return">←戻る</a>

    <h1>お知らせ新規登録</h1>

    <div>
    <form method="POST" action="{{route('')}}" enctype="multipart/form-data" >
        
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">投稿日時</label>
            <input id="" type="text" name="" class="" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">タイトル</label>
            <input id="" type="text" name="" class="" required>
        </div>
    
        <div class="mb-3">
            <label for="" class="form-label">本文</label>
            <textarea id="" name="" class="" ></textarea>
        </div>

        <div class="create-button">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
    </div>
</div>
@endsection