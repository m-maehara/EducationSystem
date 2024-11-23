@extends('layouts.app')

@section('content')
<div class="container">

    <!-- お知らせ欄 -->
    <div class="mt-4">
        <h2>お知らせ</h2>
        <div class="notification-box p-3">
            <p class="mb-2"><a href="{{ route('article.show', 1) }}">お知らせ1: サービスメンテナンスのお知らせ</a></p>
            <p class="mb-2"><a href="{{ route('article.show', 2) }}">お知らせ2: 新機能追加のお知らせ</a></p>
            <p class="mb-2"><a href="{{ route('article.show', 3) }}">お知らせ3: 年末年始の営業時間について</a></p>
        </div>
    </div>
</div>
@endsection

<!-- カスタムCSS -->
<style>
    .notification-box {
        background-color: #f8f9fa; /* 薄いグレーの背景色 */
        border-radius: 8px; /* 角を丸くする */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 軽いシャドウを追加 */
    }
</style>
