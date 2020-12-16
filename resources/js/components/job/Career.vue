<template>
    <div class="career-container form-container" v-if="this.$store.state.step == 2">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>경력사항</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)">삭제</button>
                <div class="form-group">
                    <label for="career_start">근무기간</label>
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="career_start" :language="ko" v-model="item.career_start" format="yyyy-MM-dd"></Datepicker>
                        <span class="from-arrow">~</span>
                        <Datepicker class="inline-block" name="career_end" :language="ko" v-model="item.career_end" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
                <div class="form-group">
                    <label for="career_name">직장명</label>
                    <input type="text" name="career_name" v-model="item.career_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="career_position">직위/근무부서</label>
                    <input type="text" name="career_position" v-model="item.career_position" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="career_role">담당업무</label>
                    <input type="text" name="career_role" v-model="item.career_role" placeholder="입력해주세요">
                </div>
            </div>
        </form>
        <div class="button-group">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn btn-success btn-save" @click="saveItems">저장</button>
        </div>
        <VSpinner v-if="isSubmit || !this.items"></VSpinner>
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
    props: [],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        job_id() { return this.$store.state.job.id; },
        items () {
            return this.$store.state.career
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
        addItem: function() {
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
            this.items.push({
                id: '',
                career_start: "",
                career_end: "",
                career_name: "",
                career_position: "",
                career_role: "",
            });
        },
        removeItem: function(id, index) {
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
            if ( this.items.length == 1 ) {
                Swal.fire({
                    title: '삭제할 수 없습니다',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            Swal.fire({
                title: '삭제하시겠습니까?',
                showDenyButton: true,
                allowOutsideClick: false,
                confirmButtonText: `네`,
                denyButtonText: `아니오`,
                allowOutsideClick: false,
                }).then((result) => {
                if (result.isConfirmed) {
                    this.isSubmit = true;
                    if ( id ) {
                        let headers = getHeader();
                        let url, method;
                        url = '/api/job-detail/career/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {career: this.$store.state.career}
                        })
                        .then(res => {
                            this.isSubmit = false;
                            Swal.fire({
                                title: '삭제되었습니다!',
                                icon: 'success',
                                confirmButtonText: '확인'
                            });
                        })
                        .catch(err => {
                            this.isSubmit = false;
                            Swal.fire({
                                title: '삭제에 실패했습니다!',
                                icon: 'error',
                                confirmButtonText: '확인'
                            });
                            console.error(err);
                        })
                    } else {
                        this.isSubmit = false;
                        Swal.fire({
                            title: '삭제되었습니다!',
                            icon: 'success',
                            confirmButtonText: '확인'
                        });

                    }
                    this.items.splice(index, 1);
                } else if (result.isDenied) {
                    this.isSubmit = false;
                }
            });

        },
        saveItems: function() {
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
            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/career/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {career: this.$store.state.career}
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.career = res.data;
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
