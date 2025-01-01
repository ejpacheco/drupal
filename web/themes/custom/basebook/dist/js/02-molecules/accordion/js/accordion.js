/******/ (() => { // webpackBootstrap
/*!********************************************************!*\
  !*** ./components/02-molecules/accordion/accordion.js ***!
  \********************************************************/
Drupal.behaviors.accordion={attach(){const a=document.querySelectorAll(".accordion__header"),b=document.querySelectorAll(".accordion");Array.from(a).forEach(a=>{a.addEventListener("click",a=>{const c=a.currentTarget,d=c.closest(".accordion");d.classList.contains("is-open")?d.classList.remove("is-open"):(Array.from(b).forEach(a=>{a.classList.remove("is-open")}),d.classList.add("is-open"))})})}};
/******/ })()
;
//# sourceMappingURL=accordion.js.map