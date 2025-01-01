/******/ (() => { // webpackBootstrap
/*!**********************************************!*\
  !*** ./components/02-molecules/tabs/tabs.js ***!
  \**********************************************/
Drupal.behaviors.tabs={attach(a){const b=a.querySelectorAll(".tabs");b.forEach(a=>{function b(a){a!==f&&0<=a&&a<d.length&&(d[f].classList.remove("is-active"),d[a].classList.add("is-active"),e[f].classList.remove("is-active"),e[a].classList.add("is-active"),f=a)}function c(a,c){a.addEventListener("click",a=>{a.preventDefault(),b(c)})}const d=a.querySelectorAll(".tabs__link"),e=a.querySelectorAll(".tabs__tab");let f=0;a.classList.remove("no-js"),d.forEach((a,b)=>{c(a,b)})})}};
/******/ })()
;
//# sourceMappingURL=tabs.js.map