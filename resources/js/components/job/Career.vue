<template>
    <div class="career-container form-container" v-if="isShow">
        <!-- <p>최대 2개</p> -->
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>경력사항</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)" v-if="isOpen">삭제</button>
                <div class="form-group">
                    <label for="career_start">근무기간</label>
                    <div class="input_date-group input-group">
                        <InputMask class="inline-block" name="career_start" v-model="item.career_start" mask="9999-99"/>
                        <span class="from-arrow">~</span>
                        <InputMask class="inline-block" name="career_end" v-model="item.career_end" mask="9999-99"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="career_name">직장명</label>
                    <input type="text" name="career_name" :class="maxLength(item.career_name, 30)" v-model="item.career_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="career_position">직위</label>
                    <input type="text" name="career_position" :class="maxLength(item.career_position, 15)" v-model="item.career_position" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="career_department">근무부서</label>
                    <input type="text" name="career_department" :class="maxLength(item.career_department, 15)" v-model="item.career_department" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="career_role">담당업무</label>
                    <input type="text" name="career_role" :class="maxLength(item.career_role, 43)" v-model="item.career_role" placeholder="입력해주세요">
                </div>
            </div>
        </form>
        <div class="button-group" v-if="isOpen">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn btn-success btn-save" @click="saveItems">저장</button>
        </div>
        <VSpinner v-if="isSubmit || !this.items" class="v-spinner"></VSpinner>
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
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.items.length >= 2 ) {
                Swal.fire({
                    title: '추가할 수 없습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                });
                return false;
            }
            this.items.push({
                id: '',
                career_start: "",
                career_end: "",
                career_name: "",
                career_position: "",
                career_department: "",
                career_role: "",
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
                allowOutsideClick: false,
                }).then((result) => {
                if (result.isConfirmed) {
                    this.isSubmit = true;
                    if ( id ) {
                        let headers = getHeader();
                        let url, method;
                        url = '/kor/api/job-detail/career/' + id;
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
        validation: function() {
            let temp = null;
            let valid = this.items.some(element => {
                if ( element.career_role == '' || element.career_role == undefined) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '담당업무를 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else if ( element.career_role && element.career_role.length > 43) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '담당업무는 43자 이내로 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else {
                    if ( !temp ) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            return valid;
        },
        saveItems: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            const validate = this.validation();
            if ( !validate ) {
                return false;
            }
            this.isSubmit = true;
            console.log(this.$store.state);
            let headers = getHeader();
            let url, method;
            url = '/kor/api/job-detail/career/' + this.job_id;
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
