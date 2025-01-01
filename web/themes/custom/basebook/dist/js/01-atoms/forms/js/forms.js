/******/ (() => { // webpackBootstrap
/*!********************************************!*\
  !*** ./components/01-atoms/forms/forms.js ***!
  \********************************************/
Drupal.behaviors.formsCustom={attach(a){const b=a.querySelectorAll(".input-password-custom");b.forEach(a=>{const b=a.querySelector("input"),c=a.querySelector(".button-eye-icon");b&&c&&(c.classList.contains("show")?b.setAttribute("type","text"):b.setAttribute("type","password"),c.addEventListener("click",()=>{c.classList.toggle("show");const a=c.classList.contains("show");b.setAttribute("type",a?"text":"password")}))})}};
/******/ })()
;
//# sourceMappingURL=forms.js.map