const mySwiper = new Swiper('.swip-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    loop: false,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 1,
        stretch: 1,
        depth: 100,
        modifier: 7,
        // slideShadows: false,
    },

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});