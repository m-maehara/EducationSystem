<!DOCTYPE html>
@extends('user.layouts.app')

<link rel="stylesheet" href="{{ asset('css/curriculum_progress.css') }}">

@section('content')
<div class='container'>
    <a href="#" class="return">←戻る</a>
   
    <div class="profile">
        <img src="{{ asset($user->profile_image) }}" alt="プロフィール画像" class="">
        <div class="profile_info">
            <h1>{{ $user->name }}さんの授業進捗</h1>
            <h2>現在の学年：<span class="current-grade">{{ $user->grade->name }}</span></h2>
        </div>
    </div>

    <div class="grade_list">
    @foreach ($lessons as $gradeBlock)
        <div class="grade_block">
            <h3 class="grade_name">{{ $gradeBlock['grade_name'] }}</h3>
            <ul class="lesson_list">
                @foreach ($gradeBlock['lessons'] as $lesson)   
                    <li>
                      <div class="lesson-row">
                        @if ($lesson['completed'])
                         <span class="badge">受講済み</span>
                        @else
                         <span class="badge empty"></span>
                        @endif

                        @if ($lesson['disabled'])
                         <span class="disabled lesson_title">{{ $lesson['title'] }}</span>
                        @else
                         <a href="#" class="lesson_title">{{ $lesson['title'] }}</a>
                        @endif
                       </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
    </div>

   
</div>
@endsection