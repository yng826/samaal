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

const recruit_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //저장 버튼 클릭시
        $('.add-btn').on('click', function() {
            if (validation()) {
                $('#recruit-form').submit();
            }
        });

        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 채용 공고를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('#recruit-form').submit();
            }
        });

        //키워드 추가 버튼 클릭시
        $('.keyword-add-btn').on('click', function() {
            const val = $('#keyword').val();
            let html = '<div class="form-inline">';
            html += '<input type="text" class="form-control w-50" name="keyword[]" value="'+val+'">';
            html += '<button type="button" class="btn btn-danger text-white keyword-del-btn">삭제</button>';
            html += '</div>';
            $('#keyword-div').append(html);
            $('#keyword').val('');
        });

        //키워드 삭제 버튼 클릭시
        $(document).on('click', '.keyword-del-btn', function() {
            $(this).parent().remove();
        });
    }

    const validation = () => {
        if ($('input[name=start_date]').val() == '' || $('input[name=start_date]').val() == null) {
            alert('채용기간 시작일을 선택해주세요.');
            return false;

        } else if ($('input[name=end_date]').val() == '' || $('input[name=end_date]').val() == null) {
            alert('채용기간 종료일을 선택해주세요.');
            return false;

        } else if ($('input[name=title]').val() == '' || $('input[name=title]').val() == null) {
            alert('제목을 입력해주세요.');
            $('input[name=title]').focus();
            return false;

        } else if ($('input[name=career]:checked').val() == '' || $('input[name=career]:checked').val() == null) {
            alert('경력을 선택해주세요.');
            return false;

        } else if ($('select[name=job_type]').val() == '' || $('select[name=job_type]').val() == null) {
            alert('지원직군을 선택해주세요.');
            return false;

        } else if ($('textarea[name=description]').val() == '' || $('textarea[name=description]').val() == null) {
            alert('지원자격을 입력해주세요.');
            $('textarea[name=description]').focus();
            return false;
        }
        return true;
    }

    init();
}

const job_list = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //체크박스 설정
        set_checkbox();

        // 셀렉트 변경시
        $('#select_recruit_id').on('change', function(){
            $('.search-btn').trigger('click');
        });
        //검색버튼 클릭시
        $('.search-btn').on('click', function() {
            let status = $('select[name=status]').val();
            let pass = $('select[name=pass]').val();
            $(location).attr('href','/kor/admin/recruit/'+$('select[name=recruit_id]').val()+'/job?status='+ status + '&pass=' + pass);
        });
        //전체요약 클릭시
        $('.list-excel-btn').on('click', function() {
            $(location).attr('href','/kor/admin/recruit/'+$('select[name=recruit_id]').val()+'/job/list-excel-download');
        });
        //선택상세 클릭시
        $('.detail-excel-btn').on('click', function() {
            let ids = '';
            $('input[name=id-check]:checked').each(function(index, item) {
                ids += (index>0 ? ',' : '') + $(this).val();
            });
            $(location).attr('href','/kor/admin/recruit/'+$('select[name=recruit_id]').val()+'/job/'+ids+'/detail-excel-download');
        });
        //선택상세 클릭시
        $('.detail-sms-btn').on('click', function() {
            let ids = '';
            $('input[name=id-check]:checked').each(function(index, item) {
                ids += (index>0 ? ',' : '') + $(this).val();
            });
            $(location).attr('href','/kor/admin/recruit/'+$('select[name=recruit_id]').val()+'/job/'+ids+'/detail-sms');
        });
        //선택삭제 클릭시
        $('.btn-delete-selected').on('click', function() {
            let ids = '';
            $('input[name=id-check]:checked').each(function(index, item) {
                ids += (index>0 ? ',' : '') + $(this).val();
            });
            let valid = confirm('선택한 지원내역을 삭제합니다');
            if ( !valid ) {
                return false;
            }
            let recruit_id = $(this).data('recruit_id');
            $.ajax({
                type: "DELETE",
                url: "/kor/admin/job/",
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

        $('.btn-delete').on('click', function(e){
            let valid = confirm('지원내역을 전체 삭제합니다');
            if ( !valid ) {
                return false;
            }
            let recruit_id = $(this).data('recruit_id');
            $.ajax({
                type: "DELETE",
                url: "/kor/admin/recruit/" + recruit_id + '/job',
                data: "data",
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
                $('.detail-excel-btn, .detail-sms-btn').attr('disabled', true); //선택상세 버튼 비활성화
            } else {
                $('.detail-excel-btn, .detail-sms-btn').attr('disabled', false); //선택상세 버튼 활성화
                $('input[name=id-check]:checked').parents('tr').children('td').attr('style', 'background: #f3f4f6!important'); //체크박스 선택시 배경색상 추가
            }
        });
   }

    init();
}

const job_edit = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //변경 버튼 클릭시
        $('.edit-btn').on('click', function(e) {
            if (validation()) {
                $('#job-form').trigger('submit');
            }
        });
    }

    const validation = () => {
        if ($('select[name=pass]').val() == '' || $('select[name=pass]').val() == null) {
            alert('처리상태를 선택해주세요.');
            return false;
        }
        return true;
    }

    init();
}

const job_sms = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //변경 버튼 클릭시
        $('.edit-btn').on('click', function() {
            if (validation()) {
                $('#job-form').trigger('submit');
            }
        });
    }

    const validation = () => {
        if ($('select[name=status]').val() == '' || $('select[name=status]').val() == null) {
            alert('처리상태를 선택해주세요.');
            return false;
        }
        return true;
    }

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
    $('.datepicker').datepicker();
    recruit_create();

    if ( $('.container').hasClass('container-job-list')) {
        job_list();
    }
    if ( $('.container').hasClass('container-job-edit')) {
        job_edit();
    }
    if ( $('.container').hasClass('container-job-sms')) {
        job_sms();
    }
});
