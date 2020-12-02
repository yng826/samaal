import axios from 'axios'
import Swal from 'sweetalert2';
const question = () => {
    const init = () => {
        event_listener();
    };

    const event_listener = () => {

        $('.save-btn').on('click', (e) => {
            e.preventDefault();
            if ( validation() ) {
                console.log('form submit');
                $(".question-form").submit();
                //axios.post();

                Swal.fire({
                    title: '확인되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
                $(".layer-popup").hide();
                $(".popup-marsk").hide();
            }
        });
    }

    const validation = () => {

        var  message = "";
        var chk = true;

        if ($("input[name=title]").val() == "" || $("input[name=title]").val() == null) {
            message = "제목을 선택해주세요.";
            chk = false;

        } else if ($("input[name=category]").val() == "" || $("input[name=category]").val() == null) {
            message = "문의 분류를 선택해주세요.";
            chk = false;

        } else if ($("input[name=email]").val() == "" || $("input[name=email]").val() == null) {
            message = "작성자 메일 주소를 입력해주세요.";
            chk = false;

        } else if ($("textarea[name=question]").val() == "" || $("textarea[name=question]").val() == null) {
            message = "내용을 입력해주세요.";
            chk = false;

        } else if($("input[name=agree]:checked").length ==0) {
            message = "개인정보 이용 및 수집을 동의해주세요.";
            chk = false;
        }

        /* 이메일 체크 */
        var regexEmail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var inputEmail = $("input[name=email]").val();

        if(!regexEmail.test(inputEmail)) {
            message = "이메일 형식이 올바르지 않습니다";
            chk = false;
        }

        if ( !chk ) {

            Swal.fire({
                title: '에러입니다!',
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
