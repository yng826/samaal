<template>
    <div class="button-groups">
        <button v-if="step==2 || step==4" @click="changeStep(3)">자기소개서 작성</button>
        <button v-if="step==3" @click="changeStep(2)">이력서 작성</button>
        <button v-if="step==3" @click="changeStep(4)">제출전 확인</button>
        <button v-if="step==4" @click="sendApplicant">제출</button>
        <VSpinner v-if="isSubmit"></VSpinner>
    </div>
</template>
<script>
import {getHeader} from '../../config'
import VSpinner from 'vue-spinner/src/BeatLoader'
import Swal from 'sweetalert2'
export default {
    props: [],
    components: {
        VSpinner,
    },
    computed: {
        step() {
            return this.$store.state.step
        },
        id() {
            return this.$store.state.job.id
        },
        status() {
            return this.$store.state.job.status
        }
    },
    data: function() {
        return {
            isSubmit: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        changeStep: function(step) {
            this.$store.state.step = step;
        },
        sendApplicant: function() {
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
            this.isSubmit = true;
            console.log(this.id);
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
