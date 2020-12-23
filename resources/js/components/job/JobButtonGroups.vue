<template>
    <div class="button-groups">
        <button v-if="isEdit && step==2" @click="changeStep(3)">자기소개서 작성 &gt;&gt;</button>
        <button v-if="isEdit && step==3" @click="changeStep(2)">&lt;&lt; 이력서 수정</button>
        <button v-if="isEdit && step==3" @click="changeStep(4)">제출전 확인 &gt;&gt;</button>
        <button v-if="isEdit && step==4" @click="changeStep(3)">&lt;&lt; 자기소개서 수정</button>
        <button v-if="isEdit && step==4" @click="checkApplicant">제출</button>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import {getAuth, getHeader} from '../../config'
import VSpinner from 'vue-simple-spinner'
import Swal from 'sweetalert2'
export default {
    props: ['mode'],
    components: {
        VSpinner,
    },
    computed: {
        isCreate() {
            return this.mode == 'create'
        },
        isEdit() {
            return this.mode == 'edit' && getAuth()
        },
        step() {
            return this.$store.state.step
        },
        id() {
            return this.$store.state.job.id
        },
        status() {
            return this.$store.state.job.status
        },
        isSubmitReady() {
            let userInfo = this.$store.state.user_info.id;
            let career = this.$store.state.career.length;
            let coverLetter = this.$store.state.job.is_cover_letter;
            if ( !userInfo || !career || !coverLetter ) {
                return false;
            } else {
                return true;
            }
        }
    },
    data: function() {
        return {
            isSubmit: false,
        }
    },
    mounted: function() {
        console.log(this.mode);
        // this.isAuth = getAuth();
    },
    methods: {
        changeStep: function(step) {
            this.$store.state.step = step;
        },
        checkApplicant: function() {
            if ( this.status == 'submit' ) {
                Swal.fire({
                    title: '이미 제출되었습니다!',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            if ( this.status == 'expired' ) {
                Swal.fire({
                    title: '제출기한이 지났습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            if ( !this.isSubmitReady ) {
                Swal.fire({
                    title: '작성을 마저 해주십시오',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            Swal.fire({
                title: '제출하시겠습니까?',
                icon: 'success',
                showDenyButton: true,
                confirmButtonText: '확인',
                denyButtonText: `아니오`,
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.isSubmit = true;
                    this.sendApplicant();
                } else if (result.isDenied) {
                    this.isSubmit = false;
                }
            });
        },
        sendApplicant: function() {
            let headers = getHeader();
            let url, method;
            url = '/api/work-with-us/job/submit/' + this.id + '?_method=PUT';
            method = 'post';
            axios({
                method: method,
                url: url,
                headers: headers,
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '제출되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/work-with-us/job/';
                    }
                })
            })
            .catch(err => {
                this.isSubmit = false;
                Swal.fire({
                    title: '제출에 실패했습니다!',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
