const { ready } = require('jquery');
import _ from 'lodash';
var SimpleLightbox = require('simple-lightbox');
require('simple-lightbox/dist/simpleLightbox.min.css');
import Rellax from 'rellax';

require('fullpage.js');

const siteIntro = () => {
    new SimpleLightbox({elements: '.gallery a'});
    let fp;
    var rellax;
    const setFullPage = function() {
        let ww = $(window).width();
        console.log(ww);
        if ( ww > 767 ) {
            console.log('desktop');
            if ( $('#fullpage').hasClass('fullpage-wrapper') ) {
                $.fn.fullpage.destroy('all');
            }
            if ( rellax ) {
                rellax.refresh();
            } else {
                rellax = new Rellax('.rellax',{
                    center:true
                });
            }
            // console.log(rellax);
        } else {
            console.log('mobile');
            if ( !$('#fullpage').hasClass('fullpage-wrapper') || $('#fullpage').hasClass('fp-destroyed')) {
                $('#fullpage').fullpage({
                    anchors: ['intro-section', 'about-us-section', 'for-business-partners-section', 'work-with-us-section'],
                    paddingTop: '-100vw',
                    navigation: true
                });
            }
        }
    }

    // 메인 서브메뉴 클릭시
    const main_submenu = () => {
        $(".sub-menu__button").on('click', function(){
            $(this).toggleClass("on");
            $(this).next().toggleClass("on");
            $('.mobile-mask').toggleClass("on");
        });
    }

    const eventListener = function() {
        $(window).on('resize', _.debounce(setFullPage, 400))
    }

    const siteIntroInit = () => {
        eventListener();
        setFullPage();
        main_submenu();
        // questionPop();
        // siteIntroSwiper();
        // processTab();
    };

    siteIntroInit();
}

export default siteIntro;
