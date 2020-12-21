<template>
    <div class="popup-container" v-if="isOpen">
        <button class="layer-popup__close-btn" @click="closePopup" type="button">닫기</button>
        <div class="form-container login-form">
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
                    <div class="form-group password-group">
                        <a href="" @click.prevent="openFindPassword" class="password-link">비밀번호를 잊으셨나요?</a>
                    </div>
                    <button type="submit" class="submit-btn">확인하기</button>
                </form>
            </div>
            <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
        </div>
    </div>
</template>
<style>
</style>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getUser} from '../../config'
import Swal from 'sweetalert2'
import VSpinner from 'vue-simple-spinner'
export default {
    props: ['action','is_check_auth','job_id'],
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
            isOpen: false,
            recruit_id: null,
            // isRedirect: false,
        }
    },
    mounted: function() {
        this.$root.$on('openPopup', (args1, args2) => {
            if (args1 == 'login') {
                console.log('open Login');
                this.isOpen = true;
            }
            if (args2) {
                this.recruit_id = args2;
            }
        });
        this.$root.$on('closePopup', (args1) => {
            this.isOpen = false;
        });
        console.log(this.is_check_auth);
        this.isAuth = getAuth();
        if ( this.is_check_auth ) {
            if (this.isAuth) {

            } else {
                this.$root.$emit('openPopup', 'login');
            }
        }
    },
    methods: {
        closePopup: function() {
            this.$root.$emit('closePopup');
        },
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
                console.log(this.recruit_id);
                console.log( res );
                this.isSubmit = false;
                if ( res.data.logged == true) {
                    console.log(res.data.job , this.recruit_id);
                    if ( res.data.job && this.recruit_id ) {
                        if ( res.data.job[this.recruit_id]) {
                            window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/edit';
                        } else {
                            window.location.href = '/work-with-us/recruit/';
                        }
                    } else {
                        window.location.href = window.location.href;
                    }
                }
            }).catch( err => {
                console.error(err);
                this.isSubmit = false;
            });
        },
        openFindPassword: function() {
            this.$root.$emit('closePopup');
            this.$root.$emit('openPopup', 'password');
        }
    }
}
</script>
