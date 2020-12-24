

require('../bootstrap');

// axios.defaults.headers = getHeader();


// window.Vue = require('vue');

document.addEventListener('DOMContentLoaded', () => {

    // if ( typeof vueApp == 'undefined' ) {
    //     const vueApp = new Vue({
    //         el: '#app',
    //         store: JobStore
    //     });
    //     console.log('init job');
    // }

    // 여기 작성해주세요
    function eventListener() {
        $('#search-btn, .search-wrap__content [id^="category-"]').on('click', function() {
            search($(this).attr('id').toString());
        });
        $('input[name=keyword]').on('keypress', function(e) {
            if(e.which == 13) {
                search('search-btn');
            }
        });
    }

    function search(id, keyword) {
        const category = id == 'search-btn' ? 0 : id.split('-')[1];
        let keywordString = encodeURI($('.search_keyword').val());
        $(location).attr('href','/other/search?keyword=' + keywordString + '&category=' + category);
    }

    eventListener();
});
