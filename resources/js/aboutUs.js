const about = () => {

    const locationSwiper = () => {
        const swiper = new Swiper('.about-location .swiper-container', {
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
            }
          });
    }

    const about_init = () => {
        locationSwiper();
    };

    about_init();
}

export default about;
