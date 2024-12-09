document.addEventListener('DOMContentLoaded', function () {
    new Splide('#image-carousel', {
        type: 'loop', // Hace que el carrusel sea circular
        perPage: 1,      // Muestra una imagen por página
        gap: '1rem', // Espacio entre imágenes
        autoplay: true,  // Auto deslizamiento
        interval: 3000   // Intervalo de 3 segundos
    }).mount();
});