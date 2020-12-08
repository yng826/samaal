const { ready } = require('jquery');
import _ from 'lodash';

require('fullpage.js');

const siteIntro = () => {
    console.log('main intro');
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
                $('#fullpage').fullpage();
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
