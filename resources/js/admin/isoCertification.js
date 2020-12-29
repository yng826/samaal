/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('../bootstrap');
// require('../common');
import 'core-js/stable';
require('jquery-ui/ui/widgets/datepicker');
// window.Vue = require('vue');
// import VuetifyDraggableTreeview from 'vuetify-draggable-treeview'
// import "vuetify/dist/vuetify.css";
// Vue.use(VuetifyDraggableTreeview);
// import Vuetify from 'vuetify';
// Vue.use(Vuetify, {
//     component: {
//         VuetifyDraggableTreeview
//     }
// });


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//const app = new Vue({
 //   el: '#app',
    // vuetify: new Vuetify({
        // theme: { dark: true },
    // }),
//});

const iso_certification_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //저장 버튼 클릭시
        $('.add-btn').on('click', function() {
            if (validation()) {
                $('#iso-certification-form').submit();
            }
        });

        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 ISO인증서를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('#iso-certification-form').submit();
            }
        });
    }

    const validation = () => {
        if ($('input[name=first_date]').val() == '' || $('input[name=first_date]').val() == null) {
            alert('최초인증일을 선택해주세요.');
            return false;

        } else if ($('input[name=type]').val() == '' || $('input[name=type]').val() == null) {
            alert('구분을 입력해주세요.');
            $('input[name=type]').focus();
            return false;

        } else if ($('input[name=standard]').val() == '' || $('input[name=standard]').val() == null) {
            alert('인증규격을 입력해주세요.');
            $('input[name=standard]').focus();
            return false;

        } else if ($('input[name=number]').val() == '' || $('input[name=number]').val() == null) {
            alert('인증번호를 입력해주세요.');
            $('input[name=number]').focus();
            return false;

        } else if (($('input[name=img_file_path]').val() == '' || $('input[name=img_file_path]').val() == null)
                    && ($('input[name=img_file]').val() == '' || $('input[name=img_file]').val() == null)) {
            alert('이미지파일을 선택해주세요.');
            return false;

        } else if (($('input[name=pdf_file_path]').val() == '' || $('input[name=pdf_file_path]').val() == null)
                    && ($('input[name=pdf_file]').val() == '' || $('input[name=pdf_file]').val() == null)) {
            alert('PDF파일을 선택해주세요.');
            return false;
        }
        return true;
    }

    console.log('iso_certification_create');
    init();
}

$(document).ready(function () {
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년'
    });
    $('.datepicker').datepicker({
        "dateFormat": "yy-mm-dd",
        "locale" : "ko",
    });
    iso_certification_create();
});
