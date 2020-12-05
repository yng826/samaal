<template>
    <div class="military-container form-container">
        <form>
            <div class="form-wrap">
                <h3>병역사항</h3>
                <input type="hidden" name="id" v-model="item.id">
                <div class="form-group">
                    <label for="military_type">구분/구별</label>
                    <input type="text" name="military_type" v-model="item.military_type">
                </div>
                <div class="form-group">
                    <label for="military_discharge">제대구분</label>
                    <input type="text" name="military_discharge" v-model="item.military_discharge">
                </div>
                <div class="form-group">
                    <label for="military_rank">계급</label>
                    <input type="text" name="military_rank" v-model="item.military_rank">
                </div>
                <div class="form-group">
                    <label for="military_exemption">군면제사유</label>
                    <input type="text" name="military_exemption" v-model="item.military_exemption">
                </div>
                <div class="form-group">
                    <label for="military_duration_start">군복무기간</label>
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="military_duration_start" :military="ko" v-model="item.military_duration_start" format="yyyy-MM-dd"></Datepicker>
                        <span class="from-arrow">~</span>
                        <Datepicker class="inline-block" name="military_duration_end" :military="ko" v-model="item.military_duration_end" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
            </div>
        </form>
        <div class="button-group">
            <button class="btn-save" @click="saveItem">저장</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['job_id'],
    components: {
        Datepicker,
    },
    computed: {
        item () {
            return this.$store.state.military;
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSended: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        saveItem: function() {
            if ( this.isSended ) {
                return false;
            }
            this.isSended = true;
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
                this.isSended = false;
                console.log(this.$store.state.military);
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
            })
            .catch(err => {
                this.isSended = false;
                Swal.fire({
                    title: '저장에 실패했습니다!',
                    icon: 'danger',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
