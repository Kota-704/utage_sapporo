document.addEventListener("DOMContentLoaded", () => {
  let newsSwiper;

  function initializeNewsSwiper() {
    const swiperContainer = document.querySelector(".swiper_news");
    if (!swiperContainer) return;

    const slides = swiperContainer.querySelectorAll(".swiper-slide");

    // `.swiper_news` 内の `.swiper-button-next` と `.swiper-button-prev` を取得
    const nextBtns = swiperContainer.querySelectorAll(".swiper-button-next");
    const prevBtns = swiperContainer.querySelectorAll(".swiper-button-prev");

    // スライドが存在しない場合はナビゲーションボタンを隠す
    if (slides.length === 0) {
      nextBtns.forEach((btn) => {
        btn.classList.remove("sp"); // `.sp` を削除
        btn.style.setProperty("display", "none", "important");
      });
      prevBtns.forEach((btn) => {
        btn.classList.remove("sp"); // `.sp` を削除
        prevBtns.forEach((btn) => {
          btn.classList.remove("sp"); // `.sp` を削除
          btn.style.setProperty("display", "none", "important");
        });
      });

      if (newsSwiper) {
        newsSwiper.destroy(true, true);
        newsSwiper = null;
      }
      return;
    }

    // スライドが存在している場合の処理
    if (window.innerWidth <= 500 && !newsSwiper) {
      newsSwiper = new Swiper(".swiper_news", {
        slidesPerView: 1,
        initialSlide: 0,
        loop: false,
        navigation: {
          nextEl: ".swiper_news .swiper-button-next",
          prevEl: ".swiper_news .swiper-button-prev",
        },
        on: {
          init: (swiper) => {
            swiper.update();
            swiper.slideTo(0, 0, false);
          },
          resize: (swiper) => {
            swiper.update();
          },
        },
      });

      // ナビゲーションボタンを表示する（`news` の Swiper だけ）
      nextBtns.forEach((btn) => (btn.style.display = "block"));
      prevBtns.forEach((btn) => (btn.style.display = "block"));
    } else if (window.innerWidth > 500 && newsSwiper) {
      newsSwiper.destroy(true, true);
      newsSwiper = null;

      nextBtns.forEach((btn) => {
        btn.classList.remove("sp"); // `.sp` を削除
        btn.style.setProperty("display", "none", "important");
      });

      prevBtns.forEach((btn) => {
        btn.classList.remove("sp"); // `.sp` を削除
        btn.style.setProperty("display", "none", "important");
      });
    }
  }

  initializeNewsSwiper();

  // resize 時の処理を最適化
  window.addEventListener("resize", () => {
    if (newsSwiper) {
      newsSwiper.update();
    } else {
      initializeNewsSwiper();
    }
  });
});
