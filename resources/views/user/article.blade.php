<!DOCTYPE html>
{{-- @extends('user.layouts.app') --}}
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Home</title>
</head>

<body>
<a href="{{ route('user.show.profile') }}" class="return">←戻る</a>
</body>

{{-- 
@section('content')
<div class='container'>
    <a href="{{ route('user.show.top') }}" class="return">←戻る</a>
    <h2 class="article_date">{{ $articles->posted_date }}</h2>
    <h1 class="article_title">{{ $articles->title }}</h1>
    <p class="article_contents">{{ $articles->article_contents }}</p>
</div>
@endsection
--}}

</html>