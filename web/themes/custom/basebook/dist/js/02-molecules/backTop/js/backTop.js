/******/ (() => { // webpackBootstrap
/*!****************************************************!*\
  !*** ./components/02-molecules/backTop/backTop.js ***!
  \****************************************************/
window.addEventListener("DOMContentLoaded",()=>{const a=document.querySelector(".backTopPage");if(a){a.style.display="none",a.addEventListener("click",()=>{window.scrollTo({top:0,behavior:"smooth"})});const b=document.documentElement.scrollHeight,c=window.innerHeight;b>c?window.addEventListener("scroll",()=>{const d=window.scrollY+c;a.style.display=d>=b-400?"flex":"none"}):a.style.display="flex"}});
/******/ })()
;
//# sourceMappingURL=backTop.js.map