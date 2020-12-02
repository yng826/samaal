import axios from 'axios'
import Swal from 'sweetalert2';
import Swiper from 'swiper';
const business = () => {

    // foil main 작업하는중
    const foilWrap = () => {
        // $(window).scroll(function() {
        //     const height = $(window).scrollTop();
        //     const footerHeight = $(".footer").offset().top;
        //     const infoHeight = height + $(window).height();
        //     console.log(footerHeight);
        //     console.log(height);
        //     console.log(infoHeight);

        //     if (infoHeight >= footerHeight){
        //         // $('.business-foil__title').css('position','fixed');
        //         console.log('up');
        //     }
        //     else{
        //         // $('.business-foil__title').css('position','static');
        //         console.log('down');
        //     }
        // });


    };

    // business 문의하기 팝업
    const questionPop = () => {
        $(".btn-question").on("click",function(){
            $(".question-pop").show();
            $(".popup-marsk").show();
        });

        $(".btn-manager").on("click",function(){
            $(".manager-pop").show();
            $(".popup-marsk").show();
        });


        $(".popup-marsk , .layer-popup__close-btn").on("click",function(){
            $(".layer-popup").hide();
            $(".popup-marsk").hide();
        });
    };

    // business 상세 swiper
    const businessSwiper = () => {
        var detailSlide  = new Swiper('.business-detail-swiper', {
            navigation: {
                nextEl: '.business-detail-swiper .swiper-button-next',
                prevEl: '.business-detail-swiper .swiper-button-prev',
            },
            pagination: {
                el: '.business-detail-swiper .swiper-pagination',
            }
        });
    };

    const eventListener = () => {
        const txt = $('.question-pop__submit-btn').html();
    }

    const validation = () => {
        if ( true ) {
            return false;
        }
        return true;
    }

    const business_init = () => {
        eventListener();
        foilWrap();
        questionPop();
        businessSwiper();
    };

    business_init();
}

export default business;
