/*--------------------
swiperの設定
--------------------*/

const swiper = new Swiper(".swiper_campaign", {
  slidesPerView: 3,
  loop: true,
  loopAdditionalSlides: 0,
  effect: "coverflow",
  coverflowEffect: {
    rotate: 0,
    stretch: 10,
    depth: 350,
    modifier: 1,
    slideShadows: false,
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
