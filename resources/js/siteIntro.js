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
    let init = false;
    let vieMode = 'mobile';
    const setFullPage = function() {
        let ww = $(window).width();
        console.log(ww);
        if ( ww > 767 ) {
            console.log('desktop');
            vieMode = 'desktop';
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
            if ( !init ) {
                init = true;
                moveHash();
            }
            // console.log(rellax);
        } else {
            console.log('mobile');
            vieMode = 'mobile';
            if ( !$('#fullpage').hasClass('fullpage-wrapper') || $('#fullpage').hasClass('fp-destroyed')) {
                $('#fullpage').fullpage({
                    anchors: ['intro', '','about-us', '', 'for-business-partners', '', 'work-with-us'],
                    // anchors: ['intro-section', 'about-us-section', 'for-business-partners-section', 'work-with-us-section'],
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
        $(window).on('resize', _.debounce(setFullPage, 400));


        $(window).on('hashchange', function(e) {
            if( vieMode == 'desktop' ) moveHash();
        });
    }

    const moveHash = function() {
        if ( location.hash ) {
            let hash = location.hash.substr(1);
            $('html,body').animate({scrollTop:$('#fullpage .' + hash).offset().top}, 500);
        }
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
