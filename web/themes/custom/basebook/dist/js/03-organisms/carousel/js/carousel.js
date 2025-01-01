/******/ (() => { // webpackBootstrap
/*!******************************************************!*\
  !*** ./components/03-organisms/carousel/carousel.js ***!
  \******************************************************/
window.addEventListener("DOMContentLoaded",()=>{const a=document.querySelectorAll(".splide");if(0<a.length)for(const b of a){const a=new Splide(b);a.on("mounted",function(){const c=b.querySelector(".splide__buttons");if(c){const c=b.querySelector(".splide__button--play"),d=b.querySelector(".splide__button--pause");c&&c.addEventListener("click",b=>{b.preventDefault(),c.classList.remove("show"),d.classList.add("show"),a?.Components?.Autoplay.play()}),d&&d.addEventListener("click",b=>{b.preventDefault(),d.classList.remove("show"),c.classList.add("show"),a?.Components?.Autoplay.pause()})}});const c="DEVELOPMENT"==window.CONFIG_TYPE?"":window.splide.Extensions;a.mount(c)}const b=document.querySelectorAll(".carousel--images .splide"),c=document.querySelectorAll(".carousel--images_thumbnails .splide");b&&c&&b.forEach((a,b)=>{const d=new Splide(a),e=new Splide(c[b],{isNavigation:!0});d.sync(e),d.mount(),e.mount()})});
/******/ })()
;
//# sourceMappingURL=carousel.js.map