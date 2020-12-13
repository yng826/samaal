<template>
    <div class="work-apply__progress ">
        <ul>
            <li :class="overStep(1)">인적사항<br>입력</li>
            <li :class="overStep(2)">이력서 작성</li>
            <li :class="overStep(3)">자기소개서<br>작성</li>
            <li :class="overStep(4)">제출하기</li>
        </ul>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
import VSpinner from 'vue-spinner/src/BeatLoader'
export default {
    props: ['job_id', 'init_step'],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        step () {
            return this.$store.state.step;
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSubmit: false,
        }
    },
    mounted: function() {
        if ( this.init_step ) {
            this.$store.state.step = this.init_step;
        }
        // this.isAuth = getAuth();
    },
    methods: {
        overStep: function(n) {
            return n > this.step ? '' : 'on';
        },
        saveItem: function() {
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;

            let headers = getHeader();
            let url, method;
            url = '/api/work-with-us/job/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {
                    cover_letter: this.$store.state.job.cover_letter
                }
            })
            .then(res => {
                this.isSubmit = false;
                console.log(this.$store.state.job);
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
            })
            .catch(err => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장에 실패했습니다!',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
