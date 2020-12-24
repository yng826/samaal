import Swal from "sweetalert2";

export const SendValidation = {
    methods: {
        isSubmitable() {
            console.log(this.status);
            if ( this.status == 'submit' ) {
                Swal.fire({
                    title: '이미 제출되었습니다!',
                    icon: 'error',
                    confirmButtonText: '확인',
                });
                return false;
            }
            if ( this.status == 'expired' ) {
                Swal.fire({
                    title: '제출기한이 지났습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                });
                return false;
            }
        }
    },
}
