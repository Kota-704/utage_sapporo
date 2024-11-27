/*--------------------
swiperの設定
--------------------*/

const swiper = new Swiper(".swiper_campaign", {
  slidesPerView: 2.5,
  loop: true,
  loopAdditionalSlides: -3,
  centeredSlides: true,
  initialSlide: 4,
  loopedSlides: 3,
  effect: "coverflow",
  coverflowEffect: {
    rotate: 0,
    stretch: 10,
    depth: 100,
    modifier: 2,
    slideShadows: false,
  },
  autoplay: {
    delay: 13000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

swiper.on("init", () => {
  swiper.update();
});
swiper.init();
