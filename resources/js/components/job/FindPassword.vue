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
                        <label for="phone">핸드폰번호</label>
                        <input type="text" name="phone" id="phone" v-model="phone" ref="phone">
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
                phone: this.phone,
            });

            console.log(finded);
            finded.then( res => {
                console.log( res );
                this.isSubmit = false;

                if ( res.data.result == 'success' ) {
                    Swal.fire({
                        title: '확인되었습니다',
                        icon: 'success',
                        text: res.data.msg,
                        allowOutsideClick: false,
                        confirmButtonText: `확인`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // this.isSubmit = true;
                        }
                    });
                } else {
                    Swal.fire({
                        title: '확인되지 않았습니다',
                        icon: 'error',
                        text: res.data.msg,
                        allowOutsideClick: false,
                        confirmButtonText: `확인`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // this.isSubmit = true;
                        }
                    });
                }

            }).catch( err => {
                console.error(err);
                this.isSubmit = false;
            })
        }
    }
}
</script>
