import axios from 'axios'
import { indexOf } from 'lodash';
import Swal from 'sweetalert2'


class User {
    constructor () {
        this.name = 'user';
    }

    getName() {
        return this.name;
    }

    validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    getAuth() {
        return window.localStorage.getItem('authUser');
    }

    setAuth(data) {
        let authUser = {};
        authUser.access_token = data.token.accessToken;
        authUser.user = data.user;
        // console.log('setAuth:::', authUser);
        window.localStorage.setItem('authUser', JSON.stringify(authUser));
    }

    join(data) {
        return axios.post('/kor/api/join', {
            'email': data.email,
            'password': data.password,
            'name': data.name,
            'phone': data.phone,
            'birth_day': data.birth_day,
            'recruit_id': data.recruit_id,
        }).then( (res) => {
            if (res.data.result == 'success') {
                console.log("setAuth:::", res.data);
                this.setAuth(res.data);
            } else {
                console.error(res);
            }
            return res.data;
        }).catch( res => {
            console.error(res);
            return res;
        })
    }

    login (data) {
        return axios.post('/kor/api/login', {
            'email': data.email,
            'password': data.password
        })
        .then((res)=> {
            if ( res.data.logged ) {
                this.setAuth(res.data);
                Swal.fire({
                    title: '확인되었습니다!',
                    text: '계속 이용하시기 바랍니다.',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {

                    return result;
                    // this.$root.$emit('getJob');
                    if (result.isConfirmed) {
                        // this.$root.$emit('closePopup');
                    }
                });
            } else {
                Swal.fire({
                    title: '로그인에 실패했습니다!',
                    text: '이메일, 비밀번호를 확인해주세요',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
            }
            return res;
        }).catch( err => {
            console.error(err);
            Swal.fire({
                title: '문제가 생겼습니다!',
                text: '잠시후에 다시 시도해주세요',
                icon: 'error',
                confirmButtonText: '확인'
            });
        })
    }

    find (data) {
        return axios.post('/kor/api/find', {
            'name': data.name,
            'email': data.email,
            'phone': data.phone,
        })
        .then((res)=> {
            if ( res.data ) {
                Swal.fire({
                    text: '입력하신메일로 임시비밀번호가 발송되었습니다',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {

                    return result;
                    // this.$root.$emit('getJob');
                    if (result.isConfirmed) {
                        // this.$root.$emit('closePopup');
                    }
                });
            }
            return res;
        }).catch( err => {
            console.error(err);
            Swal.fire({
                title: '문제가 생겼습니다!',
                text: '잠시후에 다시 시도해주세요',
                icon: 'error',
                confirmButtonText: '확인'
            });
        })

    }
}

export default new User();
