// Loaded with `defer` after the Swiper library, so Swiper is ready by the
// time this runs. Horizontal slides, dots only, autoplay every 5 seconds.

const swiper = new Swiper(".swiper", {
  direction: "horizontal",
  loop: true,
  speed: 500,

  autoplay: {
    delay: 5000,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
