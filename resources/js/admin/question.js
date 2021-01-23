/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('../bootstrap');
// require('../common');
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

const board_create = () => {


    const init = () => {
        console.log('board_create');
        event_listener();
    };

    const event_listener = () => {

         //저장 버튼 클릭시
        $('.save-btn').on('click', function() {
            if (validation()) {
                 $('.news-form').submit();
            }
        });

        $('.btn-del').on('click', function(e){
            if (confirm('삭제하시겠습니까?')) {
                $('[name="_method"]').val('DELETE');
                 $('.news-form').submit();
            }
        });
    }

    const validation = () => {

        if ($('textarea[name=answer]').val() == '' || $('textarea[name=answer]').val() == null) {
            alert('답변을 입력해주세요.');
            $('textarea[name=answer]').focus();
            return false;
        }
        return true;
    }

    init();
}

const board_list = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //체크박스 설정
        set_checkbox();
        //선택상세 클릭시
        $('.btn-delete').on('click', function(e) {
            let valid = confirm('선택한 내역을 삭제합니다');
            if ( !valid ) {
                return false;
            }
            let ids = '';
            $('input[name=id-check]:checked').each(function(index, item) {
                ids += (index>0 ? ',' : '') + $(this).val();
            });
            $('#question-list-ids').val(ids);

            // $('#question-list').trigger('submit');

            $.ajax({
                type: "DELETE",
                url: "/eng/admin/question/",
                data: {
                    ids: ids
                },
                dataType: "json",
                success: function (response) {
                    if (response.result == 'success') {
                        alert('삭제되었습니다');
                        window.location.reload();
                    } else {
                        alert('문제가 발생했습니다.');
                    }
                }
            });
        });

    }

    /* 체크박스 설정 */
    const set_checkbox = () => {
        $('input[name=id-check], #all-check').on('click', function() {
            if ($(this).attr('id') == 'all-check') { //체크박스 전체 선택시
                $('input[name=id-check]').prop('checked', this.checked);
            }
            $('input[name=id-check]:not(:checked)').parents('tr').children('td').removeAttr('style'); //체크박스 미선택시 지정한 css 속성삭제

            if ($('input[name=id-check]:checked').length == 0) { //체크박스 미선택시
            } else {
                $('input[name=id-check]:checked').parents('tr').children('td').attr('style', 'background: #f3f4f6!important'); //체크박스 선택시 배경색상 추가
            }
        });
   }

    init();
}


$(document).ready(function () {
    console.log('ready');
    if ($('.question_list')[0] == undefined) {
        console.log('board_create');
        board_create();
    } else {
        board_list();
    }
});
