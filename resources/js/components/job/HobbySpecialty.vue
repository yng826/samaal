<template>
    <div class="hobby-container form-container" v-if="isShow">
        <form>
            <div class="form-wrap">
                <h3>취미/특기</h3>
                <input type="hidden" name="id" v-model="item.id">
                <div class="form-group">
                    <label for="hobby">취미</label>
                    <input type="text" name="hobby" v-model="item.hobby" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="specialty">특기</label>
                    <input type="text" name="specialty" v-model="item.specialty" placeholder="입력해주세요">
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
            return this.$store.state.hobby_specialty;
        },
        status() {
            return this.$store.state.job.status
        }
    },
    data: function() {
        return {
            isAuth: false,
            isSubmit: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        saveItem: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;
            console.log(this.$store.state);
            this.$store.state.hobby_specialty.job_id = this.job_id;

            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/hobby_specialty/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {specialty: this.$store.state.hobby_specialty}
            })
            .then(res => {
                this.$store.state.hobby_specialty.id = res.data.id;
                this.isSubmit = false;
                console.log(this.$store.state.hobby_specialty);
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.hobby_specialty = res.data;
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
