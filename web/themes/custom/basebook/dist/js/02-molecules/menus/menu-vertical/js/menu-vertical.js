/******/ (() => { // webpackBootstrap
/*!**********************************************************************!*\
  !*** ./components/02-molecules/menus/menu-vertical/menu-vertical.js ***!
  \**********************************************************************/
document.addEventListener("DOMContentLoaded",()=>{const a=document.querySelectorAll(".menu-vertical__item--with-sub");a.forEach(a=>{const b=a.querySelector(".menu-vertical__item-content"),c=a.querySelector(".menu-vertical--sub");c&&(c.style.display="none"),b.addEventListener("click",b=>{b.preventDefault(),c&&(a.classList.toggle("open"),c.classList.toggle("open"),c.style.display="none"===c.style.display?"block":"none")})})});
/******/ })()
;
//# sourceMappingURL=menu-vertical.js.map