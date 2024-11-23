<!-- resources/views/user/delivery.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>配信情報</h1>

    <!-- 配信がある場合 -->
    @if($deliveryTimes->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>配信タイトル</th>
                    <th>開始時間</th>
                    <th>終了時間</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveryTimes as $delivery)
                    <tr>
                        <td>{{ $delivery->delivery->title }}</td>
                        <td>{{ $delivery->start_time->format('Y-m-d H:i') }}</td>
                        <td>{{ $delivery->end_time->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('user.delivery.show', $delivery->id) }}" class="btn btn-primary">詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>現在、配信はありません。</p>
    @endif
</div>
@endsection
