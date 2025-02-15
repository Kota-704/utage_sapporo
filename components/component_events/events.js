document.addEventListener("DOMContentLoaded", () => {
  let eventsSwiper;

  function initializeEventsSwiper() {
    const swiperContainer = document.querySelector(".swiper_events");
    const slides = swiperContainer
      ? swiperContainer.querySelectorAll(".swiper-slide")
      : [];

    // スライドが存在しない場合はナビゲーションボタンを隠す
    if (slides.length === 0) {
      const nextBtn = document.querySelector(".swiper-button-next");
      const prevBtn = document.querySelector(".swiper-button-prev");
      if (nextBtn) {
        nextBtn.classList.remove("sp"); // `.sp` を削除
        nextBtn.style.setProperty("display", "none", "important");
      }
      if (prevBtn) {
        prevBtn.classList.remove("sp"); // `.sp` を削除
        prevBtn.style.setProperty("display", "none", "important");
      }
      if (eventsSwiper) {
        eventsSwiper.destroy(true, true);
        eventsSwiper = null;
      }
      return;
    }

    // スライドが存在している場合の処理
    if (window.innerWidth <= 500 && !eventsSwiper) {
      eventsSwiper = new Swiper(".swiper_events", {
        slidesPerView: 1,
        initialSlide: 0,
        loop: false,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
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

      // ナビゲーションボタンを表示する
      const nextBtn = document.querySelector(".swiper-button-next");
      const prevBtn = document.querySelector(".swiper-button-prev");
      if (nextBtn) nextBtn.style.display = "block";
      if (prevBtn) prevBtn.style.display = "block";
    } else if (window.innerWidth > 500 && eventsSwiper) {
      eventsSwiper.destroy(true, true);
      eventsSwiper = null;

      const nextBtn = document.querySelector(".swiper-button-next");
      const prevBtn = document.querySelector(".swiper-button-prev");

      if (nextBtn) {
        nextBtn.classList.remove("sp"); // `.sp` を削除
        nextBtn.style.setProperty("display", "none", "important");
      }
      if (prevBtn) {
        prevBtn.classList.remove("sp"); // `.sp` を削除
        prevBtn.style.setProperty("display", "none", "important");
      }
    }
  }

  initializeEventsSwiper();

  // resize 時の処理を最適化
  window.addEventListener("resize", () => {
    if (eventsSwiper) {
      eventsSwiper.update();
    } else {
      initializeEventsSwiper();
    }
  });
});
