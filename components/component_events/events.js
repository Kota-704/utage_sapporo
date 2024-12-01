/*--------------------
swiperの設定
--------------------*/
document.addEventListener("DOMContentLoaded", () => {
  let eventsSwiper;

  function initializeEventsSwiper() {
    if (window.innerWidth <= 500 && !eventsSwiper) {
      eventsSwiper = new Swiper(".swiper_events", {
        slidesPerView: 1,
        initialSlide: 0, // 明示的に最初のスライドを指定
        loop: false, // ループを無効化
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        on: {
          init: (swiper) => {
            swiper.update(); // 初期化時にSwiperの状態を更新
            swiper.slideTo(0, 0, false); // 最初のスライドに移動
          },
          resize: (swiper) => {
            swiper.update(); // リサイズ時にスライドを再度更新
          },
        },
      });
    } else if (window.innerWidth > 500 && eventsSwiper) {
      // Swiperのインスタンスを完全に破棄し、変数をリセット
      eventsSwiper.destroy(true, true);
      eventsSwiper = null;

      // ナビゲーションボタンを非表示
      document.querySelector(".swiper-button-next").style.display = "none";
      document.querySelector(".swiper-button-prev").style.display = "none";
    }
  }

  // 初期化を実行
  initializeEventsSwiper();

  // リサイズ時に再度初期化
  window.addEventListener("resize", initializeEventsSwiper);
});
