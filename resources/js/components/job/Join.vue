<template>
    <div class="form-container">
        <div class="form-wrap">
            <form id="login-form" :action="action" method="POST" @submit.prevent="sendPost">
                <div class="form-group">
                    <label for="name">성명</label>
                    <input type="text" name="name" id="name" v-model="name" ref="name">
                </div>
                <div class="form-group">
                    <label for="birth_day">생년월일</label>
                    <div class="input_date-group full-width-date">
                        <Datepicker class="inline-block" name="birth_day" v-model="birth_day" format="yyyy-MM-dd" :language="ko"></Datepicker>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="text" name="email" id="email" v-model="email" ref="email">
                </div>
                <div class="form-group">
                    <label for="phone">핸드폰번호</label>
                    <input type="text" name="phone" id="phone" v-model="phone" ref="phone">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" name="password" id="password" v-model="password" ref="password">
                </div>
                <div class="form-group">
                    <label for="password_confirm">비밀번호재입력</label>
                    <input type="password" name="password_confirm" id="password_confirm" v-model="password_confirm" ref="password_confirm">
                </div>
                <button type="submit">저장</button>
            </form>
        </div>
        <VSpinner v-if="isSubmit"></VSpinner>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import User from '../../job/User'
import {getHeader, getAuth, getUser} from '../../config'
import Swal from 'sweetalert2'
import VSpinner from 'vue-spinner/src/BeatLoader'
export default {
    props: ['action'],
    components: {
        Datepicker,
        VSpinner
    },
    data: function() {
        return {
            name: '',
            birth_day: '',
            email: '',
            phone: '',
            password: '',
            password_confirm: '',
            isAuth: false,
            isSubmit: false,
            ko: ko,
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        // require('../../job/User')
    },
    methods: {


        validation: function() {
            if ( this.name == '' ) {
                return {
                    result: false,
                    msg: '이름을 입력해주세요',
                };
            }
            if ( this.birth_day == '' ) {
                return {
                    result: false,
                    msg: '생일을 입력해주세요',
                };
            }
            if ( this.email == '' ) {
                return {
                    result: false,
                    msg: '이메일을 입력해주세요',
                };
            }
            if ( !User.validateEmail (this.email)) {
                return {
                    result: false,
                    msg: '이메일형식이 맞지 않습니다',
                };
            }
            if ( this.phone == '' ) {
                return {
                    result: false,
                    msg: '핸드폰번호를 입력해주세요',
                };
            }
            if ( this.password == '' ) {
                return {
                    result: false,
                    msg: '비밀번호를 입력해주세요',
                };
            }
            console.log(this.password.length);
            if ( this.password.length >= 16 ) {
                return {
                    result: false,
                    msg: '비밀번호가 너무 깁니다',
                };
            }
            if ( this.password !== this.password_confirm ) {
                return {
                    result: false,
                    msg: '비밀번호가 일치하지 않습니다',
                };
            }
            return {
                result: true,
                msg: '',
            }
        },
        sendPost: function () {
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;
            const validate = this.validation();
            if ( !validate.result ) {
                Swal.fire({
                    title: validate.msg,
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                this.isSubmit = false;
                return false;
            }
            let logged = User.join({
                name: this.name,
                birth_day: this.birth_day,
                email: this.email,
                phone: this.phone,
                password: this.password,
            });

            console.log(logged);
            logged.then( res => {
                console.log( res );
                this.isSubmit = false;
            }).catch( err => {
                console.error(err);
                this.isSubmit = false;
            })
        }
    }
}
</script>
