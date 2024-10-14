@extends('admin.layouts.app')

@section('title', '管理_トップ')

@section('content')
    <div class = "topContents">
        <div class = "topName">
            <!-- ログイン中のユーザーの名前を表示 -->
            <p>ユーザーネーム : {{ Auth::guard('admin')->user()->name }}</p>
        </div>
        <div class = "topEmail">
            <!-- ログイン中のユーザーのメールアドレスを表示 -->
            <p>メールアドレス : {{ Auth::guard('admin')->user()->email }}</p>
        </div>
    </div>
@endsection