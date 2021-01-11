<template>
    <div class="military-container form-container" v-if="isShow">
        <form>
            <div class="form-wrap">
                <h3>병역사항</h3>
                <input type="hidden" name="id" v-model="item.id">
                <div class="form-group">
                    <label for="military_discharge">제대구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="military_discharge" v-model="item.military_discharge">
                                <option v-for="discharge in discharges" :value="discharge.value" :key="discharge.value">{{discharge.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="military_type">군별</label>
                    <input type="text" name="military_type" v-model="item.military_type" placeholder="(예) 육군/해군/공군/해병대 등">
                </div>
                <div class="form-group">
                    <label for="military_class">병과</label>
                    <input type="text" name="military_class" v-model="item.military_class" placeholder="(예) 보병/포병 등">
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
                    <label for="military_veterans_affair">보훈대상여부</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="military_veterans_affair" v-model="item.military_veterans_affair">
                                <option v-for="affair in affairs" :value="affair.value" :key="affair.value">{{affair.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="military_duration_start">군복무기간</label>
                    <div class="input_date-group input-group">
                        <InputMask class="inline-block" name="military_duration_start" v-model="item.military_duration_start" mask="9999-99" />
                        <span class="from-arrow">~</span>
                        <InputMask class="inline-block" name="military_duration_end" v-model="item.military_duration_end" mask="9999-99" />
                    </div>
                </div>
            </div>
        </form>
        <div class="button-group" v-if="isOpen">
            <button class="btn btn-success btn-save" @click="saveItem">저장</button>
        </div>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
import { FormField } from '../../mixins/FormFields'
import { SendValidation } from '../../mixins/SendValidation'
import VSpinner from 'vue-simple-spinner'
import InputMask from 'vue-input-mask';
export default {
    props: [],
    mixins: [
        FormField,
        SendValidation
    ],
    components: {
        VSpinner,
        InputMask,
    },
    computed: {
        isOpen() { return this.$store.state.recruit_status == 'open' },
        isShow() {
            let step2 = this.$store.state.step == 2;
            let job_id = this.$store.state.job.id;
            const editMode = this.$store.state.mode == 'edit';
            if ( step2 && job_id && editMode ) {
                return true;
            } else {
                return false;
            }
        },
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
            discharges: [
                {value: 'discharge', name:'필'},
                {value: 'unfinished', name:'미필'},
                {value: 'exemption', name:'면제'},
                {value: 'etc', name:'기타'},
            ],
            affairs: [
                {value: 'target', name:'대상'},
                {value: 'non_target', name:'비대상'},
            ],
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
