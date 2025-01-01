/******/ (() => { // webpackBootstrap
/*!************************************************!*\
  !*** ./components/02-molecules/modal/modal.js ***!
  \************************************************/
window.addEventListener("DOMContentLoaded",()=>{const a=document.querySelectorAll(".modal-custom");a?.forEach(a=>{a.addEventListener("click",b=>{b.preventDefault();const c=a.getAttribute("data-modal"),d=document.getElementById(c);d?.classList.toggle("show");const e=d?.querySelector(".close-modal");e?.addEventListener("click",function(){d?.classList.remove("show")})})});const b=document.querySelectorAll(".modal");b?.forEach(a=>{const b=a.querySelector(".close-modal");b?.addEventListener("click",function(b){console.log("entro clicking modal"),b.preventDefault(),a?.classList.remove("show")})})});
/******/ })()
;
//# sourceMappingURL=modal.js.map