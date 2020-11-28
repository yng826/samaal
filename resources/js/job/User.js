import axios from 'axios'
import Swal from 'sweetalert2'


class User {
    constructor () {
        this.name = 'user';
    }

    getName() {
        return this.name;
    }

    login (data) {
        axios.post('/api/login', {
            'email': data.email,
            'password': data.password
        })
        .then((res)=> {
            if ( res.data.logged ) {
                let authUser = {};
                authUser.access_token = res.data.token.accessToken;
                // authUser.email = data.email;
                authUser.user = res.data.user;
                console.log(authUser);
                window.localStorage.setItem('authUser', JSON.stringify(authUser));

                Swal.fire({
                    title: '확인되었습니다!',
                    text: '계속 이용하시기 바랍니다.',
                    icon: 'success',
                    confirmButtonText: '<a href="">확인</a>'
                });
            } else {
                Swal.fire({
                    title: '실패했습니다!',
                    text: '이메일, 비밀번호를 확인해주세요',
                    icon: 'error',
                    confirmButtonText: '확인'
                })
            }
        })
    }
}

export default new User();
