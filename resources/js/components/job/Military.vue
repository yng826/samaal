<template>
    <div class="military-container form-container" v-if="isShow">
        <form>
            <div class="form-wrap">
                <h3>병역사항</h3>
                <input type="hidden" name="id" v-model="item.id">
                <div class="form-group">
                    <label for="military_type">구분/구별</label>
                    <input type="text" name="military_type" v-model="item.military_type" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="military_discharge">제대구분</label>
                    <input type="text" name="military_discharge" v-model="item.military_discharge" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="military_rank">계급</label>
                    <input type="text" name="military_rank" v-model="item.military_rank" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="military_exemption">군면제사유</label>
                    <input type="text" name="military_exemption" v-model="item.military_exemption" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="military_duration_start">군복무기간</label>
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="military_duration_start" :language="ko" v-model="item.military_duration_start" format="yyyy-MM-dd"></Datepicker>
                        <span class="from-arrow">~</span>
                        <Datepicker class="inline-block" name="military_duration_end" :language="ko" v-model="item.military_duration_end" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
            </div>
        </form>
        <div class="button-group">
            <button class="btn btn-success btn-save" @click="saveItem">저장</button>
        </div>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
import VSpinner from 'vue-simple-spinner'
export default {
    props: [],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        isShow() { return this.$store.job },
        job_id() { return this.$store.state.job.id; },
        item () {
            return this.$store.state.military;
        },
        status() {
            return this.$store.state.job.status
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
        // this.isAuth = getAuth();
    },
    methods: {
        saveItem: function() {
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
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;
            console.log(this.$store.state);
            this.$store.state.military.job_id = this.job_id;

            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/military/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {military: this.$store.state.military}
            })
            .then(res => {
                this.$store.state.military.id = res.data.id;
                this.isSubmit = false;
                console.log(this.$store.state.military);
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.military = res.data;
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
