import axios from 'axios'
import Swal from 'sweetalert2';
const business = () => {
    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        const txt = $('.question-pop__submit-btn').html();
        Swal.fire({
            title: '확인되었습니다!',
            text: txt + ' !!!',
            icon: 'success',
            confirmButtonText: '확인'
        });
        // alert(); // 삭제하고 쓰세요
        console.log(axios);

        $('.question-pop__info').on('submit', (e) => {
            e.preventDefault();
            if ( !validation() ) {

            }
            console.log('form submit');
            /*
            axios.post();
            */
        });
    }

    const validation = () => {
        if ( true ) {

            Swal.fire({
                title: '에러입니다!',
                text: '필드를 확인해주세요',
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
    business();
});
