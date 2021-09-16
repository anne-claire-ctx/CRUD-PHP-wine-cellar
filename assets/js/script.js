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
const link = document.querySelector('#link');
const burger = document.querySelector('#burger');
const menu = document.querySelector(".menu");

link.addEventListener('click', () => {
  burger.classList.toggle('open')
  menu.classList.toggle('display-none')
});

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


// MODAL

const exitModal = document.querySelector(".exit");
const modal = document.querySelector(".error");
exitModal.addEventListener("click", () => {
  modal.classList.toggle("display-none");
});

// POPUP redirection 

function confirmLeave() {
  alert("Vous allez être redirigé sur une autre page.")
}
