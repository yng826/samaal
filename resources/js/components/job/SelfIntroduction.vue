<template>
    <div class="job-container form-container" v-if="this.$store.state.step == 3">
        <form>
            <div class="form-wrap">
                <h3>자기소개서</h3>
                <input type="hidden" name="id" v-model="this.job_id">
                <div class="form-group">
                    <label for="cover_letter" class="full-width">본인에대한 소개를 자유롭게 작성해주시기 바랍니다.</label>
                    <textarea class="form-control" name="cover_letter" id="cover_letter" rows="15" v-model="item.cover_letter"></textarea>
                </div>

            </div>
        </form>
        <div class="button-group">
            <button class="btn-save" @click="saveItem">저장</button>
        </div>
        <VSpinner v-if="isSubmit"></VSpinner>
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
    props: ['job_id'],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        item () {
            return this.$store.state.job;
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
