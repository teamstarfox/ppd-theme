// Mobile Menu - Hide/Show

let menuToggle = document.getElementsByClassName("menu-toggle");
let mobileMenu = document.getElementById('site-navigation-mobile');
let mainContent = document.getElementById('content');
let menuContainer = document.querySelector('.menu-main-menu-container'); // Select the menu container

let mobileNav = function() {
    mobileMenu.classList.toggle("mobile-nav-open");
    mainContent.classList.toggle("mobile-nav-open");
};

let closeMenuOnClickOutside = function(event) {
    if (!menuContainer.contains(event.target) && !event.target.classList.contains('menu-toggle')) {
        mobileMenu.classList.remove("mobile-nav-open");
        mainContent.classList.remove("mobile-nav-open");
    }
};

for (let i = 0; i < menuToggle.length; i++) {
    menuToggle[i].addEventListener('click', mobileNav, false);
}

document.addEventListener('click', closeMenuOnClickOutside);

window.addEventListener("scroll", function () {
  if (window.scrollY > 750) {
    document.getElementById("main__top").classList.add("active");
  } else {
    document.getElementById("main__top").classList.remove("active");
  }
});
