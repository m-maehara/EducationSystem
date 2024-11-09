@extends('user.layouts.app')

@section('title', '時間割')

@section('content')
    <div class="curriculum_listRetrun">
        <a href="#" class="curriculum_listRetrun_a">←戻る</a>
    </div>

    <div class="curriculum_listSchedule">
        <div class="scheduleChange">
            <div class="scheduleChangeLeft"><a href="#" class="scheduleChangeLeft_a">◀</a></div>

            <div class="scheduleChangeView">{{ $year }}年{{ $month }}月スケジュール</div>

            <div class="scheduleChangeRight"><a href="#" class="scheduleChangeLeft_a">▶</a></div>
            @if($users->grade_id < 10)
                <div class="thisGrade thisGradeLow" id="selectedGrade" data-grade-id="{{ $users->grade_id }}">{{ $users->grades->name }}</div>
            @else
            <div class="thisGrade thisGradeHigh" id="selectedGrade" data-grade-id="{{ $users->grade_id }}">{{ $users->grades->name }}</div>
            @endif
        </div>

        <div class="scheduleViewMain">
            <div class="scheduleView">
                <ul class="scheduleViewList">
                    @foreach($grades as $grade)
                        <li class="scheduleViewListLi">
                            @if($grade->id < 10)
                                <a href="#" class="gradeLink gradeLinkLow" data-grade-id="{{ $grade->id }}">
                                    {{ $grade->name }}
                                </a>
                            @else
                                <a href="#" class="gradeLink gradeLinkHigh" data-grade-id="{{ $grade->id }}">
                                    {{ $grade->name }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="scheduleMain">
                <!-- 初期スケジュールデータ -->
                @foreach($curriculums as $curriculum)
                    <div class="curriculumItem">
                        <img src="{{ asset('/storage/app/public/images/curriculum_list/' . $curriculum->thumbnail . '.jpg') }}" alt="Thumbnail">
                        <p>{{ $curriculum->title }}</p>
                        @if($curriculum->deliveryTimes->isEmpty())
                            <p>表示項目がありません</p>
                        @else
                            <div class="deliveryTimes">
                                @foreach($curriculum->deliveryTimes as $deliveryTime)
                                    <p>{{ \Carbon\Carbon::parse($deliveryTime->delivery_from)->format('n月j日 H:i') }} - {{ \Carbon\Carbon::parse($deliveryTime->delivery_to)->format('H:i') }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentYear = new Date().getFullYear();
            let currentMonth = new Date().getMonth() + 1;
            let firstGradeId = $('#selectedGrade').data('grade-id');    // 初期学年IDの取得
            let selectedGradeId = $('#selectedGrade').data('grade-id');

            const curriculumUrl = "{{ route('user.show.curriculum') }}";

            // 学年リンクのクリックイベント
            $('.gradeLink').click(function(e) {
                e.preventDefault();
                selectedGradeId = $(this).data('grade-id'); // 選択された学年IDを更新

                // 現在の学年より上の学年はクリックできないようにする
                if(selectedGradeId <= firstGradeId){
                    // 学年表示を更新
                    $('#selectedGrade').text($(this).text());

                    // スケジュールを再取得
                    loadSchedule(currentYear, currentMonth);
                }

                
            });

            // 月変更のクリックイベント
            $('.scheduleChangeLeft').click(function(e) {
                e.preventDefault();
                changeMonth(-1);
            });

            $('.scheduleChangeRight').click(function(e) {
                e.preventDefault();
                changeMonth(1);
            });

            // 月を変更する関数
            function changeMonth(direction) {
                currentMonth += direction;

                if (currentMonth > 12) {
                    currentMonth = 1;
                    currentYear++;
                } else if (currentMonth < 1) {
                    currentMonth = 12;
                    currentYear--;
                }
                
                loadSchedule(currentYear, currentMonth);
            }

            // Ajaxでスケジュールを取得し、表示する関数
            function loadSchedule(year, month) {
                $.ajax({
                    url: curriculumUrl,
                    type: 'GET',
                    data: {
                        year: year,
                        month: month,
                        grade_id: selectedGradeId 
                    },
                    success: function(data) {
                        // スケジュール表示を更新
                        $('.scheduleChangeView').text(`${data.year}年${data.month}月スケジュール`);

                        // フィルタリングされたカリキュラムのみを更新
                        const filteredCurriculums = filterCurriculumsByMonthAndGrade(data.curriculums, year, month, selectedGradeId);
                        updateScheduleMain(filteredCurriculums);
                    },
                    error: function() {
                        alert('エラーが発生しました。');
                    }
                });
            }

            // 日付と学年が一致する場合、カリキュラムを表示させる
            function filterCurriculumsByMonthAndGrade(curriculums, year, month, gradeId) {
                return curriculums.filter(curriculum => {
                    // alway_delivery_flg が 1 かつgradeIdとgrade_idが同じ場合は表示
                    if (curriculum.alway_delivery_flg === 1 && curriculum.grade_id == gradeId) {
                        return true; 
                    }

                    // カリキュラムの grade_id が選択された学年と一致するかを確認
                    if (curriculum.grade_id !== gradeId) {
                        return false; 
                    }

                    // delivery_times が存在するか確認
                    if (Array.isArray(curriculum.delivery_times) && curriculum.delivery_times.length > 0) {
                        // 指定された年と月に一致する delivery_times があるか確認
                        return curriculum.delivery_times.some(time => {
                            const deliveryFrom = moment(time.delivery_from);
                            const deliveryTo = moment(time.delivery_to);
                            const yearMonthFrom = `${deliveryFrom.year()}${String(deliveryFrom.month() + 1).padStart(2, '0')}`;
                            const yearMonthTo = `${deliveryTo.year()}${String(deliveryTo.month() + 1).padStart(2, '0')}`;
                            
                            console.log(yearMonthFrom,yearMonthTo,`${year}${String(month).padStart(2, '0')}`);
                            return yearMonthFrom <= `${year}${String(month).padStart(2, '0')}` &&
                                `${year}${String(month).padStart(2, '0')}` <= yearMonthTo;
                        });
                    }
                    return false;
                });
            }

            // スケジュールデータを使ってscheduleMainを更新する
            function updateScheduleMain(curriculums) {

                let scheduleHtml = '';

                if (curriculums.length === 0) {
                    scheduleHtml = '<p>表示項目がありません</p>';
                } else {
                    curriculums.forEach(curriculum => {
                        let deliveryTimesHtml = '';

                        // delivery_times が存在するか確認
                        if (Array.isArray(curriculum.delivery_times) && curriculum.delivery_times.length > 0) {
                            // delivery_times の内容をループで処理
                            curriculum.delivery_times.forEach(time => {
                                deliveryTimesHtml += `<p>${moment(time.delivery_from).format('M月D日 H:mm')} - ${moment(time.delivery_to).format('M月D日 H:mm')}</p>`;
                            });
                        } 

                        scheduleHtml += `
                            <div class="curriculumItem">
                                <img src="/EducationSystem/storage/app/public/images/curriculum_list/${curriculum.thumbnail}" alt="Thumbnail" class="Thumbnail">
                                <p>${curriculum.title}</p>
                                <div class="deliveryTimes">${deliveryTimesHtml}</div>
                            </div>
                        `;
                    });
                }

                $('.scheduleMain').html(scheduleHtml);
            }

            // 初期表示
            loadSchedule(currentYear, currentMonth);
        });
    </script>
@endsection
