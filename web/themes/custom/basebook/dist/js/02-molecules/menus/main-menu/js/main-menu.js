/******/ (() => { // webpackBootstrap
/*!**************************************************************!*\
  !*** ./components/02-molecules/menus/main-menu/main-menu.js ***!
  \**************************************************************/
Drupal.behaviors.mainMenu={attach:function(a){var b=a.getElementById("toggle-expand"),c=a.getElementById("main-nav");if(c){var d=c.getElementsByClassName("expand-sub");b.addEventListener("click",function(a){b.classList.toggle("toggle-expand--open"),c.classList.toggle("main-nav--open"),a.preventDefault()}),Array.from(d).forEach(function(a){a.addEventListener("click",function(a){var b=a.currentTarget,c=b.nextElementSibling;b.classList.toggle("expand-sub--open"),c.classList.toggle("main-menu--sub-open")})})}}};
/******/ })()
;
//# sourceMappingURL=main-menu.js.map