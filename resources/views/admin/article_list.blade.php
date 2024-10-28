<!DOCTYPE html>
@extends('admin.layouts.app')
    <link rel="stylesheet" href="{{ asset('css/article_list.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('admin.show.top') }}" class='return'>←戻る</a>

    <h1 class='title'>お知らせ一覧</h1>
    <a href="{{ route('admin.show.article.create') }}" class="btn btn-primary btn-sm mx-1">新規登録</a>

    <div class="products mt-5">
        <table id="article-table">
            <thead>
                <tr>
                    <th>投稿日時</th>
                    <th>タイトル</th>
                </tr>
            </thead>
            <tbody id="article-tbody">
                @foreach ($articles as $article)
                <tr>
                    <td>{{$article->posted_date}}</td>
                    <td>{{$article->title}}</td>
                    <td><a href="/article_edit/{{$article->id}}" class="btn btn-primary btn-sm mx-1">変更する</a>
                    <form method="POST" action="{{route('admin.destroy.article',$article->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection