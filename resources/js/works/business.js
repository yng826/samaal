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

    // business 상세 swiper
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

    // business intro
    const intoSwiper  = () => {
        var galleryTop = new Swiper('.business-intro__slide-img', {
            slidesPerView: 4,
            spaceBetween: 30,
            centeredSlides: false,
            // slidesPerGroup: 4,
            // initialSlide: 1,
            loop: true,

            // effect: 'coverflow',
            // grabCursor: true,
            // slidesPerView: 1,
            // loop: true,
            // coverflow: {
            //   rotate: 40,
            //   stretch: 0,
            //   depth: 50,
            //   modifier: 1,
            //   slideShadows : false
            // },


            pagination: {
                el: '.swiper-pagination',
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
          });

          var galleryThumbs = new Swiper('.business-intro__slide-info', {
            slidesPerView: 1,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },

          });


        galleryTop[0].controller.control = galleryThumbs;
        galleryThumbs[0].controller.control =galleryTop;
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
        intoSwiper();
    };

    business_init();
}

$(document).ready(function () {
    business();
});
