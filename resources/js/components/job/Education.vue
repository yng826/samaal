<template>
    <div class="education-container form-container" v-if="isShow">
        <p class="notice">최근 졸업일자 순으로 작성해주시기 바랍니다</p>
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>학력사항</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)">삭제</button>
                <div class="form-group">
                    <label for="school_name">학교명</label>
                    <input type="text" name="school_name" v-model="item.school_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="edu_major">전공</label>
                    <input type="text" name="edu_major" v-model="item.edu_major" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="edu_grade">성적</label>
                    <div class="input-group">
                        <input type="text" name="edu_grade" v-model="item.edu_grade" placeholder="총 평점 입력 (예) 4.3">
                        <input type="text" name="edu_grade_full" v-model="item.edu_grade_full" placeholder="만점 입력 (예) 4.5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="graduation">졸업구분</label>
                    <input type="text" name="graduation" v-model="item.graduation" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="edu_start">재학기간</label>
                    <div class="input_date-group input-group">
                        <Datepicker class="inline-block" name="edu_start" :language="ko" v-model="item.edu_start" format="yyyy-MM-dd"></Datepicker>
                        <span class="from-arrow">~</span>
                        <Datepicker class="inline-block" name="edu_end" :language="ko" v-model="item.edu_end" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
                <div>{{ item.status_ko }}</div>
            </div>
        </form>
        <div class="button-group">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn btn-success btn-save" @click="saveItems">저장</button>
        </div>
        <VSpinner v-if="isSubmit || !this.items" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
import VSpinner from 'vue-simple-spinner'
import { FormField } from '../../mixins/FormFields'
import { SendValidation } from '../../mixins/SendValidation'
export default {
    props: [],
    mixins: [
        FormField,
        SendValidation
    ],
    components: {
        VSpinner,
        Datepicker
    },
    computed: {
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
        items () { return this.$store.state.education },
        status() {
            return this.$store.state.job.status
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
        // if ( this.isAuth ) {
        // } else {
        //     console.log('no auth');
        // }
    },
    methods: {
        addItem: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.items.length >= 4 ) {
                Swal.fire({
                    title: '추가할 수 없습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                });
                return false;
            }
            this.items.push({
                id: "",
                school_name: "",
                edu_major: "",
                edu_grade: "",
                edu_start: "",
                edu_end: "",
                graduation: "",
            });
        },
        removeItem: function(id, index) {
            if ( !this.isSubmitable ) {
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
                allowOutsideClick: false
                }).then((result) => {
                if (result.isConfirmed) {
                    this.isSubmit = true;
                    if ( id ) {
                        let headers = getHeader();
                        let url, method;
                        url = '/api/job-detail/education/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {education: this.$store.state.education}
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
            if ( !this.isSubmitable ) {
                return false;
            }
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
            url = '/api/job-detail/education/' + this.$store.state.job.id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {education: this.$store.state.education}
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.education = res.data;
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
