import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    const dots = document.querySelectorAll('.dot');
    const images = document.querySelectorAll('.banner-image');

    dots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            // すべての画像とドットから "active" クラスを削除
            images.forEach(img => img.classList.remove('active'));
            dots.forEach(d => d.classList.remove('active'));

            // クリックされたドットに対応する画像とドットに "active" クラスを追加
            images[index].classList.add('active');
            dot.classList.add('active');
        });
    });

    // オプション: 自動スライド機能を追加する場合
    /*
    let currentSlide = 0;
    const totalSlides = images.length;

    setInterval(() => {
        dots[currentSlide].click();
        currentSlide = (currentSlide + 1) % totalSlides;
    }, 5000); // 5秒ごとにスライド
    */
});