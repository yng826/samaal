<template>
    <div class="job-container form-container" v-if="this.$store.state.step == 3">
        <form>
            <div class="form-wrap">
                <h3>자기소개서</h3>
                <input type="hidden" name="id" v-model="this.job_id">
                <div class="form-group">
                    <label class="full-width">본인에대한 소개를 자유롭게 작성해주시기 바랍니다. </label>
                    <span>({{ this.item.cover_letter ? this.item.cover_letter.length : 0 }}/7000)</span>
                    <textarea class="" name="cover_letter" id="cover_letter" rows="15" v-model="item.cover_letter" @change="setChanged"></textarea>
                </div>
            </div>
        </form>
        <div class="button-group" v-if="isOpen">
            <button class="btn-save" @click="saveItem">저장</button>
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
import { FormField } from '../../mixins/FormFields'
import { SendValidation } from '../../mixins/SendValidation'
import VSpinner from 'vue-simple-spinner'
export default {
    props: [],
    mixins: [
        FormField,
        SendValidation
    ],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        isOpen() { return this.$store.state.recruit_status == 'open' },
        cover_letter() {
            return this.$store.state.job.cover_letter;
        },
        job_id() { return this.$store.state.job.id; },
        item () {
            return this.$store.state.job;
        },
        status() {
            return this.$store.state.job.status
        },
        isChanged() {
            return this.$store.state.isChanged
        },
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
        setChanged: function() {
            this.$store.state.isChanged = true;
        },
        validation: function() {
            if ( this.cover_letter == '' || typeof this.cover_letter == 'undefined' ) {
                return {
                    result: false,
                    msg: '자기소개서를 작성해주세요',
                };
            }
            if ( this.item.cover_letter.length > 7000 ) {
                return {
                    result: false,
                    msg: '7000자 이상 작성할 수 없습니다.'
                }
            }
            return {
                result: true,
                msg: '',
            }
        },
        saveItem: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
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
                    cover_letter: this.cover_letter
                }
            })
            .then(res => {
                this.isSubmit = false;
                this.$store.state.isChanged = false;
                console.log(this.$store.state.job);
                console.log(res);
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.job.is_cover_letter = res.data.job.is_cover_letter;
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
