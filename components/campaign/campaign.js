/*--------------------
swiperの設定
--------------------*/

const swiper = new Swiper(".swiper_campaign", {
  slidesPerView: 3,
  loop: true,
  loopAdditionalSlides: 1,
  // autoplay: {
  //   delay: 3000,
  // },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
