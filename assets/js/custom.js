$(document).ready(function () {
  var swiper = new Swiper("#skills", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    loop: true,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 2000, // Speed of transition (lower value = faster)
    momentumRatio: 0.4, // Adjusts the momentum (smoothens free scroll)
  });

});
