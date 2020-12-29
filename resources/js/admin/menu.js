/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('../bootstrap');
// require('../common');
import 'jquery-ui/ui/widgets/datepicker';
import 'core-js/stable';
// import {datepicker} from 'jquery-ui';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('fancy-treeview', require('../components/FancyTree.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
if ( $('#app').length ) {
    window.Vue = require('vue');

    Vue.component('example-component', require('../components/ExampleComponent.vue').default);
    Vue.component('draggable-nested-tree', require('../components/DraggableNestedTree.vue').default);
    const app = new Vue({
        el: '#app',
        // vuetify: new Vuetify({
            // theme: { dark: true },
        // }),
    });
}
const menu_list = () => {
    //순서저장 버튼 클릭시
    $('.menu-order-btn').on('click', function() {
        let order_arr = new Array();
        const id =  $('#treeMenu input[name=id]').val().slice(0, -1).split(','); //자신 아이디(마지막 공백 쉼표 제거)
        const depth =  $('#treeMenu input[name=depth]').val().split(','); //자신 위치
        const parent_id =  $('#treeMenu input[name=parent_id]').val().split(','); //부모 아이디

        $.each(id, function(index, item){
            order_arr.push({'id': item, 'order_id': index+1, 'depth': depth[index], 'parent_id': parent_id[index]});
        });
        $('input[name=orders]').val(JSON.stringify(order_arr));

        $('#order-form').submit();
    });
}

const menu_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //저장 버튼 클릭시
        $('.add-btn').on('click', function() {
            if (validation()) {
                $('#menu-form').submit();
            }
        });

        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 메뉴를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('#menu-form').submit();
            }
        });
    }

    const validation = () => {
        if ($('input[name=name]').val() == '' || $('input[name=name]').val() == null) {
            alert('메뉴명을 입력해주세요.');
            $('input[name=name]').focus();
            return false;

        } else if ($('input[name=url]').val() == '' || $('input[name=url]').val() == null) {
            alert('URL을 입력해주세요.');
            $('input[name=url]').focus();
            return false;

        } else if ($('input[name=menu_type]:checked').val() == '' || $('input[name=menu_type]:checked').val() == null) {
            alert('메뉴 종류를 선택해주세요.');
            return false;

        } else if ($('input[name=is_front]:checked').val() == '' || $('input[name=is_front]:checked').val() == null) {
            alert('사이트 노출을 선택해주세요.');
            return false;
        }
        return true;
    }

    init();
}

$(document).ready(function () {
    $('.datepicker').datepicker();
    console.log('menu_create');
    menu_create();
    menu_list();
});

console.log('admin menu js');
