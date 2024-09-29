<!DOCTYPE html>
@extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('user.show.top') }}" class="return">←戻る</a>
    <h1>プロフィール変更</h1>

    <div>
        <form method="POST" action="{{ route=() }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="mb-3">
            <img src="{{ asset($user->profile_image) }}" alt="プロフィール画像" class="">
            <label for="" class="form-label">プロフィール画像</label>
            <input id="" type="file" name="image" class="" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ユーザーネーム</label>
            <input id="" type="text" name="" class="" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">カナ</label>
            <input id="" type="text" name="" class="" value="{{ $user->name_kana }}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">メールアドレス</label>
            <input id="" type="text" name="" class="" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">パスワード</label>
            <a href="{{ route('show.password.edit') }}" class="btn btn-primary">パスワードを変更する</a>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
        </form>
    </div>
   
</div>
@endsection