@extends('admin.layouts.app')

@section('title', 'バナー管理')

@section('content')
    <div class="bannerContents">
        <div class="bannerReturn">
            <a href="{{ route('admin.show.top') }}" class="bannerReturn_a">←戻る</a>
        </div>

        <h1 class="bannerTitle">バナー管理</h1>
        
        <div class="bannerForm">
            <form action="{{ route('admin.exe.banner.edit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="bannerFormPic">
                    <!-- 削除するバナーIDを送信するための非表示フィールド -->
                    <input type="hidden" id="delete-banner-ids" name="delete_banner_ids" value="[]">
                    <input type="hidden" id="last-index" name="last_index" value="">

                    <div id="banner-list" class="bannerList"></div>
                </div>

                <!-- 追加ボタン -->
                <button type="button" id="add-banner" class="bannerAdd">+</button><br>

                <!-- 登録ボタン -->
                <button type="submit" class="btn btn-success">登録</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const banners = @json($banners);
            const bannerList = $('#banner-list');
            let deleteBanner = [];
            let oloLastIndex = 0;

            // バナーテーブルの中身を取得
            banners.forEach(function(banner){
                addBannerHTML(banner.image,banner.id);
                oloLastIndex = banner.id;
            });
            
            // hiddenでデータのidを取得する
            document.getElementById('last-index').value = oloLastIndex;
            
            if(oloLastIndex > 0){
                // 最後に取得したバナーid+1の値をlastIndexに格納
                lastIndex = oloLastIndex + 1;
            }else{
                // lastIndexが取得できない場合1を代入
                lastIndex = 1;
            }

            // +ボタン押下で行を追加する
            $('#add-banner').on('click', function() {
                addBannerHTML('storage/images/banner/sample.jpg');
            });

            // bannerListに行を追加するメソッド
            function addBannerHTML(image, index = lastIndex ++){
                // HTML変数に行を格納
                const HTML = `
                    <div class="bannerRow" data-id="${index}">
                        <img src="/EducationSystem/public/user/${image}" alt="banner image" class="bannerImage">
                        <label for="customFile${index}" class="customFileLabel">ファイルを選択</label>
                        <input type="file" id="customFile${index}" name="banners[${index}][image]" class="bannerFile">
                        <input type="hidden" name="banner_id" id="bannerId">
                        <button type="button" class="bannerRemove">-</button>
                    </div>
                    `;
                bannerList.append(HTML);  // 行を追加
            }
            
            // バナーテーブルにデータがあった場合
            if(oloLastIndex > 0){
                // hiddenでデータのidを取得する
                const bannerId = document.querySelector('.bannerRow').getAttribute('data-id');
                document.getElementById('bannerId').value = bannerId;
                console.log(bannerId);
            }
            

            // ファイル選択を押下してファイルを取得する
            $(document).on('change', '.bannerFile', function () {
                const bannerDataId = $(this).closest('.bannerRow').data('id'); // 現在の行の data-id を取得
                const file = this.files[0]; // 選択されたファイルを取得
                console.log(bannerDataId);

                if (file) {
                    const reader = new FileReader();
                    console.log(reader);
                    reader.onload = function(e) {
                        $(`.bannerRow[data-id="${bannerDataId}"]`).find('.bannerImage').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file); 
                }
            });

            // -ボタンで行を削除
            $(document).on('click', '.bannerRemove', function () {
                const deleteRow = $(this).closest('.bannerRow');
                const bannerId = $(this).closest('.bannerRow').data('id');

                // 削除するバナーIDをリストに追加
                deleteBanner.push(bannerId);

                // 削除IDをフォームの非表示フィールドに反映
                $('#delete-banner-ids').val(JSON.stringify(deleteBanner)); 

                // 行を削除
                deleteRow.remove();
            });
        });
    </script>
@endsection
