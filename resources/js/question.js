import axios from 'axios'
import Swal from 'sweetalert2';
const question = () => {
    const init = () => {
        event_listener();
    };

    const event_listener = () => {

        $('#email-txt, #email-all-txt').val('').removeClass('show');
        $('.question-pop').on('change', '#email-select, #email-all-select', function(e) {
            console.log('직접 입력');
            if ($(this).val() == '직접 입력') {
                $('#email-' + (e.target.id=='email-all-select' ? 'all-' : '') + 'txt').addClass('show');
                $('.input-gorup__select').removeClass('show');
            } else {
                $('#email-' + (e.target.id=='email-all-select' ? 'all-' : '') + 'txt').val('').removeClass('show');
            }
        });

        // $('.save-btn').on('click', (e) => {
        //     let _form = $(this).closest('form');
        //     console.log(_form);
        //     e.preventDefault();
        //     if ( validation() ) {
        //         Swal.fire({
        //             title: '확인되었습니다!',
        //             icon: 'success',
        //             confirmButtonText: '확인'
        //         });

        //         console.log('form submit');
        //         //axios.post();
        //         // $(".layer-popup").removeClass('show');
        //         // $(".popup-mask").removeClass('show');
        //         $(".question-form").trigger('submit');
        //     }
        // });

        $('.save-btn, .save-btn-all').on('click', (e) => {
            e.preventDefault();
            let valid = $(e.target).hasClass('save-btn') ? validation() : validation_all();
            if ( valid ) {
                let _form = $(e.target).closest('form');
                let _data = {};
                _data.manager = _form.find('[name=manager]').val();
                _data.title = _form.find('[name=title]').val();
                _data.category = _form.find('[name=category]').val();
                _data.email = _form.find('[name=email]').val();
                _data.question = _form.find('[name=question]').val();
                console.log(_data);
                $('.layer-popup__close-btn').trigger('click');
                axios.post('/api/board',_data, {
                    headers: {
                        'Content-Type': 'application/json',
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }})
                .then(res => {
                    console.log(res);
                    Swal.fire({
                        title: '전송되었습니다!',
                        icon: 'success',
                        confirmButtonText: '확인'
                    });
                })
                .catch(err => {
                    console.error(err);
                })

                console.log('form submit');
                //axios.post();
                // $(".layer-popup").removeClass('show');
                // $(".popup-mask").removeClass('show');
                // $(".question-form-all").trigger('submit');
            }
        });
    }

    const validation = () => {

        var  message = "";
        var chk = true;

        if ($("#title").val() == "" || $("#title").val() == null) {
            message = "제목을 입력해주세요.";
            chk = false;

        } else if ($("#category").val() == "" || $("#category").val() == null) {
            message = "문의 분류를 선택해주세요.";
            chk = false;

        } else if ($("#email-first").val() == "" || $("#email-first").val() == null
                    || (($("#email-txt").val() == "" || $("#email-txt").val() == null) && ($("#email-select").val() == "" || $("#email-select").val() == null))) {
            message = "작성자 메일 주소를 입력 및 선택해주세요.";
            chk = false;

        } else if ($("#question").val() == "" || $("#question").val() == null) {
            message = "내용을 입력해주세요.";
            chk = false;

        } else if($("input[name=agree]:checked").length ==0) {
            message = "개인정보 이용 및 수집을 동의해주세요.";
            chk = false;
        }

        /* 이메일 체크 */
        if(chk) {
            var regexEmail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var inputEmail = $("#email-first").val() + '@' + ($("#email-select").val()=='직접 입력' ? $("#email-txt").val() : $("#email-select").val());

            if(!regexEmail.test(inputEmail)) {
                message = "이메일 형식이 올바르지 않습니다";
                chk = false;
            } else {
                $("#email").val(inputEmail);
            }
        }

        if ( !chk ) {

            Swal.fire({
                title: '필수 항목을 확인해주세요!',
                text: message,
                icon: 'error',
                confirmButtonText: '확인'
            });
            return false;
        }
        return true;
    }

    const validation_all = () => {

        var  message = "";
        var chk = true;

        if ($("#title-all").val() == "" || $("#title-all").val() == null) {
            message = "제목을 입력해주세요.";
            chk = false;

        } else if ($("#category-all").val() == "" || $("#category-all").val() == null) {
            message = "문의 분류를 선택해주세요.";
            chk = false;

        } else if ($("#email-all-first").val() == "" || $("#email-all-first").val() == null
                    || (($("#email-all-txt").val() == "" || $("#email-all-txt").val() == null) && ($("#email-all-select").val() == "" || $("#email-all-select").val() == null))) {
            message = "작성자 메일 주소를 입력 및 선택해주세요.";
            chk = false;

        } else if ($("#question-all").val() == "" || $("#question-all").val() == null) {
            message = "내용을 입력해주세요.";
            chk = false;

        } else if($("input[name=agree]:checked").length ==0) {
            message = "개인정보 이용 및 수집을 동의해주세요.";
            chk = false;
        }

        /* 이메일 체크 */
        if(chk) {
            var regexEmail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var inputEmail = $("#email-all-first").val() + '@' + ($("#email-all-select").val()=='직접 입력' ? $("#email-all-txt").val() : $("#email-all-select").val());

            if(!regexEmail.test(inputEmail)) {
                message = "이메일 형식이 올바르지 않습니다";
                chk = false;
            } else {
                $("#email-all").val(inputEmail);
            }
        }

        if ( !chk ) {

            Swal.fire({
                title: '필수 항목을 확인해주세요!',
                text: message,
                icon: 'error',
                confirmButtonText: '확인'
            });
            return false;
        }
        return true;
    }

    init();
}

$(document).ready(function () {
    question();
});
