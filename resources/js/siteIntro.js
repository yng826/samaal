const { ready } = require('jquery');
import _ from 'lodash';
var SimpleLightbox = require('simple-lightbox');
require('simple-lightbox/dist/simpleLightbox.min.css');

require('fullpage.js');

const siteIntro = () => {
    new SimpleLightbox({elements: '.gallery a'});
    let fp;
    const setFullPage = function() {
        let ww = $(window).width();
        console.log(ww);
        if ( ww > 767 ) {
            console.log('desktop');
            if ( $('#fullpage').hasClass('fullpage-wrapper') ) {
                $.fn.fullpage.destroy('all');
            }
        } else {
            console.log('mobile');
            if ( !$('#fullpage').hasClass('fullpage-wrapper') || $('#fullpage').hasClass('fp-destroyed')) {
                $('#fullpage').fullpage({
                    navigation: true
                });
            }
        }
    }

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
