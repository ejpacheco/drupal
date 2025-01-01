/******/ (() => { // webpackBootstrap
/*!************************************************!*\
  !*** ./components/00-base/01-colors/colors.js ***!
  \************************************************/
Drupal.behaviors.displayColorDefinitions={attach:function(){function a(a){return"0".concat(parseInt(a,10).toString(16)).slice(-2)}function b(b){var c=b.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);return"#".concat(a(c[1])).concat(a(c[2])).concat(a(c[3]))}var c=document.querySelectorAll(".cl-colors__item");c&&c.forEach(function(a){var c=window.getComputedStyle(a.querySelector(".cl-colors__swatch"),null).getPropertyValue("background-color"),d=a.querySelector(".cl-colors__definition");d.textContent=b(c)})}};
/******/ })()
;
//# sourceMappingURL=colors.js.map