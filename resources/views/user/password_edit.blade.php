<!DOCTYPE html>
@extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class='container'>
    <a　href="{{ route('show.profile') }}" class="return">←戻る</a>
    <h1>パスワード変更</h1>

    <div>
        <form method="POST" action="{{ route=() }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="mb-3">
            <label for="" class="form-label">旧パスワード</label>
            <input id="" type="text" name="" class="" value="{{ $user-> }}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">新パスワード</label>
            <input id="" type="text" name="" class="" value="{{ $user-> }}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">新パスワード確認</label>
            <input id="" type="text" name="" class="" value="{{ $user-> }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
        </form>
    </div>
   
</div>
@endsection