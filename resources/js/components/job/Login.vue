<template>
    <div class="form-container" v-if="!isAuth">
        <div class="form-wrap">
            <form id="login-form" :action="action" method="POST" @submit.prevent="sendPost">
                <div class="form-group">
                    <label for="name">성명</label>
                    <input type="text" name="name" id="name" v-model="name" ref="name">
                </div>
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="text" name="email" id="email" v-model="email" ref="email">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" name="password" id="password" v-model="password" ref="password">
                </div>
                <div class="form-group">
                    <a href="">비밀번호를 잊으셨나요?</a>
                </div>
                <button type="submit">확인하기</button>
            </form>
        </div>
        <VSpinner v-if="isSubmit"></VSpinner>
    </div>
</template>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getUser} from '../../config'
import Swal from 'sweetalert2'
import VSpinner from 'vue-spinner/src/BeatLoader'
export default {
    props: ['action'],
    components: {
        VSpinner
    },
    data: function() {
        return {
            name: '',
            email: '',
            password: '',
            isAuth: false,
            isSubmit: false,
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
            if ( this.email == '' ) {
                return {
                    result: false,
                    msg: '이메일을 입력해주세요',
                };
            }
            if ( this.password == '' ) {
                return {
                    result: false,
                    msg: '비밀번호를 입력해주세요',
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
            let logged = User.login({
                email: this.email,
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
