<!DOCTYPE html>
@extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('user.show.profile.edit') }}" class="return">←戻る</a>
    <h1>パスワード変更</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="edit_form">
        <form method="POST" action="{{ route('user.update.password')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="password_edit">
        <input type="hidden" name="id">
        <div class="password_form">
            <label for="current_password" class="form-label">旧パスワード</label>
            <input id="current_password" type="password" name="current_password" class="@error('current_password') is-invalid @enderror" required>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="password_form">
            <label for="new_password" class="form-label">新パスワード</label>
            <input id="new_password" type="password" name="new_password" class="@error('new_password') is-invalid @enderror" required>
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="password_form">
            <label for="password_confirmation" class="form-label">新パスワード確認</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        <div class="btn password_btn">
            <button type="submit">登録</button>
        </div>
        </div>
        </form>
    </div>
   
</div>
@endsection