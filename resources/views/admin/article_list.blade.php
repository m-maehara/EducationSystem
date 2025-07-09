<!DOCTYPE html>
@extends('admin.layouts.app')
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">

@section('content')
<div class='container'>
    <a href="{{ route('admin.show.top') }}" class='return'>←戻る</a>
    <div class="article_area">
    <h1 class='title'>お知らせ一覧</h1>
    <a href="{{ route('admin.show.article.create') }}" class="create_btn">新規登録</a>

    <div class="article_list">
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
                    <td>{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}</td>
                    <td>{{$article->title}}</td>
                    <td>
                    <div class="action_btn">
                    <a href="/admin/article_edit/{{$article->id}}" class="edit_btn">変更する</a>
                    <form method="POST" action="{{route('admin.destroy.article',$article->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete_btn">削除</button>
                        </form>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@endsection