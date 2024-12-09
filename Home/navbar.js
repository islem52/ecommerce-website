// Logic to hide navbar on scroll down and show on scroll up
let lastScrollY = window.scrollY;
const navbar = document.querySelector(".button-container");

window.addEventListener("scroll", () => {
  const currentScrollY = window.scrollY;

  if (currentScrollY > lastScrollY) {
    // Scrolling down, hide the navbar
    navbar.style.transform = "translateY(-200%)";
  } else {
    // Scrolling up, show the navbar
    navbar.style.transform = "translateY(0)";
  }

  lastScrollY = currentScrollY;
});
