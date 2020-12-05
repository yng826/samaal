
const about = () => {

    //aboutUs - location
    // location page 슬라이드
    const locationSwiper = () => {
        const swiper = new Swiper('.about-location .swiper-container', {
            navigation: {
                nextEl: '.about-location .swiper-button-next',
                prevEl: '.about-location .swiper-button-prev',
            },
            pagination: {
                el: '.about-location .swiper-pagination',
            }
        });
    }

    // aboutUs - storyNews - News
    // 스토리뉴스 top button
    const storyTopButton = () => {
        $(window).scroll(function(){
            // top button 생김
            if ($(this).scrollTop()) {
                $(".about-storyNews__top-btn").fadeIn();
            } else {
                $(".about-storyNews__top-btn").fadeOut();
            }

            // top button position
            if($(window).scrollTop() + $(window).height() < $(document).height() - $(".footer").height()) {
                $('.about-storyNews__top-btn').css({'position':'fixed','bottom':'0','right': '5%'});
            }
            if($(window).scrollTop() + $(window).height() > $(document).height() - $(".footer").height()) {
                $('.about-storyNews__top-btn').css({'position':'absolute','bottom':'60px','right':'5%'});
            }
        });

         // top button click
         $(".about-storyNews__top-btn").click(function(){
            $('html, body').animate({
                scrollTop : 0
            }, 400);
        });
    }

    // aboutUs - heritage
    const heritageSwiper = () => {

        const swiperImg = new Swiper('.about-heritage__slide .about-heritage__slide--img', {
            loop: true,
            slidesPerView: 2,
            loopedSlides: 17,
            centeredSlides: true,
        });
        const swiperYear = new Swiper('.about-heritage__slide .about-heritage__slide--year', {
            loop: true,
            slidesPerView: 7,
            loopedSlides: 17,
            centeredSlides: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
        swiperYear.controller.control = swiperImg;
        swiperImg.controller.control = swiperYear;
    }

    const about_init = () => {
        locationSwiper();
        storyTopButton();
        heritageSwiper();
    };

    about_init();
}

export default about;

