/*--------------------
swiperの設定
--------------------*/
document.addEventListener("DOMContentLoaded", () => {
  let newsSwiper;

  function initializeNewsSwiper() {
    if (window.innerWidth <= 500 && !newsSwiper) {
      newsSwiper = new Swiper(".swiper_news", {
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
    } else if (window.innerWidth > 500 && newsSwiper) {
      newsSwiper.destroy(true, true);
      newsSwiper = null;

      document.querySelector(".swiper-button-next").style.display = "none";
      document.querySelector(".swiper-button-prev").style.display = "none";
    }
  }

  initializeNewsSwiper();

  window.addEventListener("resize", initializeNewsSwiper);
});
