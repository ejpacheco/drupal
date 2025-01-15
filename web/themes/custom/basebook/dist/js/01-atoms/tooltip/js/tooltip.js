/******/ (() => { // webpackBootstrap
/*!************************************************!*\
  !*** ./components/01-atoms/tooltip/tooltip.js ***!
  \************************************************/
Drupal.behaviors.tooltip={attach:function(a){function b(a,b){document.addEventListener("click",function(c){a.contains(c.target)||b.classList.remove("tooltip__content--visible")})}function c(a,c){var d=a.querySelector(".js-tooltip__content"),e=d.classList.contains("tooltip__content--visible");e?(c.setAttribute("aria-expanded","false"),d.classList.remove("tooltip__content--visible")):(c.setAttribute("aria-expanded","true"),d.classList.add("tooltip__content--visible")),b(a,d)}var d=a.querySelectorAll(".js-tooltip");d.forEach(function(a){var b=a.querySelector(".tooltip__icon");b.addEventListener("click",function(){c(a,b)}),b.addEventListener("keyup",function(d){"Escape"===d.key&&c(a,b)})})}};
/******/ })()
;
//# sourceMappingURL=tooltip.js.map