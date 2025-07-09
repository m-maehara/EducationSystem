<!DOCTYPE html>
@extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}">

@section('content')
<div class='container'>
    <a href="#" class="return">←戻る</a>
    <h1>プロフィール変更</h1>

    <div class="edit_form">
        <form method="POST" action="{{route('user.update.profile')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="profile_image">
            <img src="{{asset('/storage/' . $user->profile_image)}}" alt="プロフィール画像">
            <div class="edit_image">
               <label for="profile_image" class="form-label">プロフィール画像</label>
               <input id="profile_image" type="file" name="image">
            </div>
        </div>
        <div class="edit_info">
            <div class="info_form">
               <label for="name">ユーザーネーム</label>
               <input id="name" type="text" name="name" class="" value="{{ $user->name }}" required>
            </div>
            <div class="info_form">
               <label for="name_kana">カナ</label>
               <input id="name_kana" type="text" name="name_kana" value="{{ $user->name_kana }}" required>
            </div>
            <div class="info_form">
                <label for="email">メールアドレス</label>
                <input id="email" type="text" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="info_form">
                <label for="password">パスワード</label>
                <a href="{{ route('user.show.password.edit') }}" class="password">パスワードを変更する</a>
            </div>
            <div class="btn">
                <button type="submit">登録</button>
            </div>
        </div>
        </form>
    </div>
   
</div>
@endsection