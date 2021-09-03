// SWIPER
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

// BURGER
const burgerIcon = document.querySelector(".burger-icon");
const menu = document.querySelector(".menu");
burgerIcon.addEventListener("click", () => {
  menu.classList.toggle("display-none");
});


// MOUSE EVENT
// const mouseEvent = document.querySelector(".mouse");
// const mouseEvent1 = document.querySelector(".mouse1");
// const mouseEvent2 = document.querySelector(".mouse2");

// window.addEventListener("mousemove", (event) => {
//   mouseEvent.style.left = event.x + "px";
//   mouseEvent.style.top = event.y + "px";
//   mouseEvent1.style.left = event.x + "px";
//   mouseEvent1.style.top = event.y + "px";
//   mouseEvent2.style.left = event.x + "px";
//   mouseEvent2.style.top = event.y + "px";
// });