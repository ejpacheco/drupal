/******/ (() => { // webpackBootstrap
/*!*************************************************************!*\
  !*** ./components/02-molecules/hero-animation/animation.js ***!
  \*************************************************************/
document.addEventListener("DOMContentLoaded",()=>{const a=document.querySelectorAll(".hero-animation");a.forEach(a=>{const b=a.querySelector(".hero-animation__anima-layer-1"),c=a.querySelector(".hero-animation__anima-layer-2");if(!b||!c)return;let d=0,e=0;setInterval(()=>{d-=.2,e-=.5,b.style.backgroundPosition=`${d}px 30px`,c.style.backgroundPosition=`${e}px 0px`},12)})});
/******/ })()
;
//# sourceMappingURL=animation.js.map