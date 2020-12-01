import axios from 'axios'
import Swal from 'sweetalert2';
import Swiper from 'swiper';
const business = () => {

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

    const businessSwiper = () => {
        const swiper  = new Swiper('.business-detail__contents .swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
            }
        });
    };

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
        console.log('business init');
        eventListener();
        businessSwiper();
        foilWrap();
        questionPop();
    };

    business_init();
}

$(document).ready(function () {
    business();
});
