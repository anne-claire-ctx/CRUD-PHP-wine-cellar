const swiper = new Swiper(".swiper-container", {
  // Optional parameters
  direction: "horizontal",
  autoplay: {
    delay: 9000,
  },
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

const burgerIcon = document.querySelector(".burger-icon");
const menu = document.querySelector(".menu");
burgerIcon.addEventListener("click", () => {
  menu.classList.toggle("display-none");
});
