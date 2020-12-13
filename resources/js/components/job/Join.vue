<template>
    <div class="popup-container" v-if="isOpen">
        <div class="form-container">
            <a href="#" @click="closePopup">X</a>
            <div class="form-wrap">
                <form id="login-form" method="POST" @submit.prevent="sendPost">
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
    props: ['recruit_id', 'isCheckAuth'],
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
            isOpen: false,
            ko: ko,
        }
    },
    mounted: function() {
        this.$root.$on('openPopup', (args1) => {
            console.log('open Join', args1);
            if (args1 == 'join') {
                this.isOpen = true;
            }
        });
        this.$root.$on('closePopup', (args1) => {
            this.isOpen = false;
        });
        this.isAuth = getAuth();
        if ( this.isCheckAuth ) {
            console.log('is check auth');
            if ( this.isAuth ) {
                // this.gotoJob();
            }
        }
        // require('../../job/User')
    },
    methods: {
        closePopup: function() {
        this.$root.$emit('closePopup');
        },
        gotoJob: function() {
            window.location.href = '/work-with-us/job/';
        },

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
            if ( User.getAuth() ) {
                Swal.fire({
                    title: '지원내역이 존재합니다!',
                    text: '입사지원내역 확인을 해주세요',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;
            const validate = this.validation();
            if ( !validate.result ) {
                Swal.fire({
                    text: validate.msg,
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
                recruit_id: this.recruit_id,
            });

            console.log(logged);
            logged.then( res => {
                console.log( res );
                this.isSubmit = false;
                if ( res.result == 'success' ) {
                    Swal.fire({
                        title: '저장에 성공했습니다',
                        icon: 'success',
                        text: res.msg,
                        confirmButtonText: '확인'
                    }).then(result => {
                        if (result.isConfirmed) {
                            this.gotoJob();
                        }}
                    );
                } else {
                    Swal.fire({
                        title: '저장에 실패했습니다',
                        icon: 'error',
                        text: res.msg,
                        confirmButtonText: '확인',
                        allowOutsideClick: false
                    }).then(result => {
                        if (result.isConfirmed) {
                            this.$root.$emit('closePopup');
                        }
                    })
                }
            }).catch( err => {
                console.error(err);
                this.isSubmit = false;
            })
        }
    }
}
</script>
