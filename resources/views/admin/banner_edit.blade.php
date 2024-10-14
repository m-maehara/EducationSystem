@extends('admin.layouts.app')

@section('title', 'バナー管理')

@section('content')
    <div class="bannerContents">
        <div class="bannerReturn">
            <a href="{{ route('admin.show.top') }}">←戻る</a>
        </div>

        <h1 class="bannerTitle">バナー管理</h1>
        
        <div class="bannerForm">
            <form action="{{ route('admin.exe.banner.edit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div id="banner-list" class = "bannerList"></div>

                <!-- 追加ボタン -->
                <button type="button" id="add-banner" class="bannerAdd">+</button><br>

                <!-- 登録ボタン -->
                <button type="submit" class="btn btn-success">登録</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // 現在の日付を取得して表示する
            var currentDate = new Date();
            updateScheduleView(currentDate);

            // ◀ ボタンのクリックイベント（前月）
            $('.scheduleChangeLeft').on('click', function(e) {
                e.preventDefault();
                currentDate.setMonth(currentDate.getMonth() - 1); // 前月へ
                updateScheduleView(currentDate);
                fetchSchedule('prev'); // サーバーからデータを取得
            });

            // ▶ ボタンのクリックイベント（翌月）
            $('.scheduleChangeRight').on('click', function(e) {
                e.preventDefault();
                currentDate.setMonth(currentDate.getMonth() + 1); // 翌月へ
                updateScheduleView(currentDate);
                fetchSchedule('next'); // サーバーからデータを取得
            });

            // スケジュールの非同期取得処理
            function fetchSchedule(direction) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンをヘッダーに含める
                    },
                    url: '/user/curriculum_list/schedule', // サーバーにリクエストを送るURL
                    type: 'POST',
                    data: {
                        direction: direction,
                        date: currentDate.toISOString().slice(0, 10) // 現在の日付を送信（フォーマット: YYYY-MM-DD）
                    },
                    success: function(response) {
                        // 取得したスケジュールを画面に反映
                        $('.scheduleMain').html(response.scheduleHtml);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error:", errorThrown);
                    }
                });
            }

            // スケジュールの年月を更新
            function updateScheduleView(date) {
                var year = date.getFullYear();
                var month = ("0" + (date.getMonth() + 1)).slice(-2); // 2桁の月表示
                $('.scheduleChangeView').text(year + '年' + month + '月スケジュール');
            }
        });
    </script>
@endsection
