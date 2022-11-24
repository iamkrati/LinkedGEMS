// swaper js code
var swiper = new Swiper(".mySwiper", {
    cssMode: true,
    slidesPerView: 5,
        spaceBetween: 30,
        freeMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    mousewheel: true,
    keyboard: true,
  });