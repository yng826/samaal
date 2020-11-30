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
            console.log('form submit');
            /*
            axios.post();
            */
        });
    }

    init();
}

$(document).ready(function () {
    business();
});
