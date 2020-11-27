const business_foil = () => {

    const foilWrap = () => {

        $(window).scroll(function() {
            const height = $(window).scrollTop();
            const footerHeight = $(".footer").offset().top;
            const infoHeight = height + $(window).height();
            console.log(footerHeight);
            console.log(height);
            console.log(infoHeight);

            if (infoHeight >= footerHeight){
                // $('.business-foil__title').css('position','fixed');
                console.log('up');
            }
            else{
                // $('.business-foil__title').css('position','static');
                console.log('down');
            }
        });
    };


    const detailSwiper = new Swiper('.business-detail__contents .swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        }
    });


    const business_init = () => {
        foilWrap();
        detailSwiper();
    };

    business_init();
}

export default business_foil;

