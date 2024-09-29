<!DOCTYPE html>
@extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('user.show.top') }}" class="return">←戻る</a>
   
    <div>
        <img src="{{ asset($user->profile_image) }}" alt="プロフィール画像" class="">
        <h1>{{ $user->name }}さんの授業進捗</h1>
        <h2>現在の学年：</h2>
        <h2>{{ $grade->name }}</h2>
    </div>

    <div class="grade_list">
        <div>
            <h3></h3>
            <ol></ol>
        </div>
    </div>
</div>
@endsection