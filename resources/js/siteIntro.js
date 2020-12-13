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
        if ( ww > 1000 ) {
            console.log('desktop');
            if ( $('#fullpage').hasClass('fullpage-wrapper') ) {
                $.fn.fullpage.destroy('all');
            }
        } else {
            console.log('mobile');
            if ( !$('#fullpage').hasClass('fullpage-wrapper') || $('#fullpage').hasClass('fp-destroyed')) {
                $('#fullpage').fullpage({
                    sectionsColor: ['yellow', 'orange', '#C0C0C0', '#ADD8E6'],
                    navigation: true
                });
            }
        }
    }

    const eventListener = function() {
        $(window).on('resize', _.debounce(setFullPage, 400))
    }

    const siteIntroInit = () => {
        eventListener();
        setFullPage();
        // questionPop();
        // siteIntroSwiper();
        // processTab();
    };

    siteIntroInit();
}

export default siteIntro;
