<!DOCTYPE html>
 @extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/article.css') }}">

@section('content')
<div class='container'>
    <a href="#" class="return">←戻る</a>
    <div class='article_block'>
      <h2 class="article_date">{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}</h2>
      <h1 class="article_title">{{ $article->title }}</h1>
      <p class="article_contents">{{ $article->article_contents }}</p>
    </div>
</div>
@endsection

</html>