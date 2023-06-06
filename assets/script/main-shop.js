var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-paginationnn',
    effect: 'coverflow',
    grabCursor: true,
    slidesPerView: 'auto',
    coverflow:{
        rotate: 20,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slidesadows: true,
    },
    loop: true,
})