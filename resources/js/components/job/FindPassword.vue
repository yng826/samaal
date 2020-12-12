<template>
    <div class="popup-container" v-if="isOpen">
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
                        <label for="phone">핸드폰번호</label>
                        <input type="text" name="phone" id="phone" v-model="phone" ref="phone">
                    </div>
                    <button type="submit">확인하기</button>
                </form>
            </div>
            <VSpinner v-if="isSubmit"></VSpinner>
        </div>
    </div>
</template>
<style>
</style>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getUser} from '../../config'
import Swal from 'sweetalert2'
import VSpinner from 'vue-spinner/src/BeatLoader'
export default {
    props: ['action','is_check_auth','job_id'],
    components: {
        VSpinner
    },
    data: function() {
        return {
            name: '',
            email: '',
            phone: '',
            isAuth: false,
            isSubmit: false,
            isOpen: false,
            // isRedirect: false,
        }
    },
    mounted: function() {
        this.$root.$on('openPopup', (args1) => {
            console.log('FindPassword:::open popup', args1);
            if (args1 == 'password') {
                this.isOpen = true;
            }
        });
        this.$root.$on('closePopup', (args1) => {
            this.isOpen = false;
        });
        console.log(this.is_check_auth);
        if (this.isAuthProp) {
            // this.isAuth = getAuth();
        }
        console.log(this.isAuth);
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
            let finded = User.find({
                name: this.name,
                email: this.email,
            });

            console.log(finded);
            finded.then( res => {
                console.log( res );
                this.isSubmit = false;
                this.$root.$emit('closePopup');
            }).catch( err => {
                console.error(err);
                this.isSubmit = false;
            })
        }
    }
}
</script>
