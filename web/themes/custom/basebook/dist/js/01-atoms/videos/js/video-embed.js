/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./components/01-atoms/videos/video-embed.js ***!
  \***************************************************/
Drupal.behaviors.responsiveEmbeddedVideos={attach(a){const b=a.querySelectorAll("iframe[src*=\"youtube.com\"]","iframe[src*=\"vimeo.com\"]");b&&Array.from(b).forEach(a=>{const b=a.getAttribute("width"),c=a.getAttribute("height"),d=a.parentNode;d.style.aspectRatio=`${b} / ${c}`,a.removeAttribute("height"),a.removeAttribute("width")})}};
/******/ })()
;
//# sourceMappingURL=video-embed.js.map