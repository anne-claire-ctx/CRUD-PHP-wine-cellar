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
// burgerIcon.addEventListener("click", () => {
//   menu.classList.toggle("is-opened");
// });


// ICONES CONTACT

const icon_1 = document.getElementById('icon-1');
const icon_2 = document.getElementById('icon-2');
const icon_3 = document.getElementById('icon-3');

function mouseIn(ele) {
  if (ele == 1) {
    icon_1.setAttribute("src", "assets/img/facebook-color.png");
  } else if (ele == 2) {
    icon_2.setAttribute("src", "assets/img/twitter-color.png");
  } else {
    icon_3.setAttribute("src", "assets/img/instagram-color.png");
  }
}

function mouseOut(ele) {
  if (ele == 1) {
    icon_1.setAttribute("src", "assets/img/facebook.png");
  } else if (ele == 2) {
    icon_2.setAttribute("src", "assets/img/twitter.png");
  } else {
    icon_3.setAttribute("src", "assets/img/instagram.png");
  }
}
