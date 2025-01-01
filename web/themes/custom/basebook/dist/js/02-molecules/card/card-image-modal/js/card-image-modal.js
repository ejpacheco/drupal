/******/ (() => { // webpackBootstrap
/*!***************************************************************************!*\
  !*** ./components/02-molecules/card/card-image-modal/card-image-modal.js ***!
  \***************************************************************************/
Drupal.behaviors.cardImageModal={attach(a){const b=a.querySelectorAll(".card-image-modal");b.forEach(b=>{b.addEventListener("click",()=>{const c=b.getAttribute("data-modal"),d=a.getElementById(c);d.classList.toggle("show");const e=d.querySelector(".close-modal");e?.addEventListener("click",()=>{d?.classList.remove("show")})})})}};
/******/ })()
;
//# sourceMappingURL=card-image-modal.js.map