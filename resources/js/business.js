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
            $(".q-pop").show();
            $(".popup-mask").show();
        });

        $(".btn-manager").on("click",function(){
            $(".manager-pop").show();
            $(".popup-mask").show();
        });


        $(".popup-mask , .layer-popup__close-btn").on("click",function(){
            $(".layer-popup").hide();
            $(".popup-mask").hide();
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

    // 공정과정 tab
    const processTab = () => {
        $(".speciality-process__tab--item").click(function(){
            $(".speciality-process__tab--item").removeClass('on');
            $(".speciality-process__tab-content").removeClass('on');
            $(this).addClass('on');
            $("."+$(this).data('id')).addClass('on');
        });
    };

    // 공정과정 라이트박스
    const processLightbox = () => {
        var SimpleLightbox = require('simple-lightbox');
        require('simple-lightbox/dist/simpleLightbox.min.css');
        require('fullpage.js');

        new SimpleLightbox({elements: '.speciality-process .process-layout__list--item a.popup-btn'});
    };

    // R&D swiper
    const rndSwiper = () => {
        var detailSlide  = new Swiper('.innovation-rnd-swiper', {
            navigation: {
                nextEl: '.innovation-rnd-swiper .swiper-button-next',
                prevEl: '.innovation-rnd-swiper .swiper-button-prev',
            },
            pagination: {
                el: '.innovation-rnd-swiper .swiper-pagination',
            }
        });
    };

    // 알루미늄 인트로 innovation 더알아보기 click
    const innovation_submenu = () => {
        $(".innovation-btn").on('click', function(){
            $(this).toggleClass("on");
            $(this).next().toggleClass("on");
        });
    }

    // ISO 인증 라이트박스
    const isoCertificationLightbox = () => {
        var SimpleLightbox = require('simple-lightbox');
        require('simple-lightbox/dist/simpleLightbox.min.css');
        require('fullpage.js');

        new SimpleLightbox({elements: '.speciality-iso .file-box a.btn-preview'});
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
        processTab();
        processLightbox();
        rndSwiper();
        isoCertificationLightbox();
        innovation_submenu();
    };

    business_init();
}

export default business;
