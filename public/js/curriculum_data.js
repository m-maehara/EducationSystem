$(document).ready(function() {
    let currentYear =  new Date().getFullYear();
    let currentMonth = new Date().getMonth() + 1;

    // CSRFトークンを設定
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 前月ボタン
    $('.scheduleChangeLeft').click(function() {
        changeMonth(-1);
    });

    // 次月ボタン
    $('.scheduleChangeRight').click(function() {
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

        $.ajax({
            url: "{{ route('user.show.curriculum') }}",
            type: 'POST',
            data: {
                year: currentYear,
                month: currentMonth
            },
            success: function(data) {
                console.log(data.year);
                currentYear = data.year;
                currentMonth = data.month;
                $('.scheduleChangeView').text(data.year + '年' + data.month + '月');
            },
            error: function() {
                alert('月の変更に失敗しました。');
            }
        });
    }
});

// JavaScriptで選択された学年を表示
document.addEventListener('DOMContentLoaded', function() {
    const gradeLinks = document.querySelectorAll('.gradeLink');
    const selectedGrade = document.getElementById('selectedGrade');

    gradeLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // リンクのデフォルトの動作を無効化
            selectedGrade.textContent = this.textContent; // 選択した学年を表示
        });
    });
});