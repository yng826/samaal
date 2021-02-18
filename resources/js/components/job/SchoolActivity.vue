<template>
    <div class="school-activities-container form-container" v-if="isShow">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>교내활동</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)" v-if="isOpen">삭제</button>
                <div class="form-group">
                    <label for="school_activities_start">기간</label>
                    <div class="input_date-group input-group">
                        <InputMask class="inline-block" name="school_activities_start" mask="9999-99" v-model="item.school_activities_start" format="yyyy-MM-dd" />
                        <span class="from-arrow">~</span>
                        <InputMask class="inline-block" name="school_activities_end" mask="9999-99" v-model="item.school_activities_end" format="yyyy-MM-dd" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_activities_affiliation">소속</label>
                    <input type="text" name="school_activities_affiliation" :class="maxLength(item.school_activities_affiliation, 32)" v-model="item.school_activities_affiliation" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="school_activities_role">담당역할</label>
                    <input type="text" name="school_activities_role" :class="maxLength(item.school_activities_role, 20)" v-model="item.school_activities_role" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="school_activities_contents">활동내용</label>
                    <input type="text" name="school_activities_contents" :class="maxLength(item.school_activities_contents, 30)" v-model="item.school_activities_contents" placeholder="입력해주세요">
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
import Datepicker from 'vuejs-datepicker'
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
            return this.$store.state.school_activities
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
                id: "",
                school_activities_start: "",
                school_activities_end: "",
                school_activities_affiliation: "",
                school_activities_role: "",
                school_activities_contents: "",
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
                        url = '/kor/api/job-detail/school_activities/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {activities: this.$store.state.school_activities}
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
                    this.isSubmit = false;;
                }
            });

        },
        validation: function() {
            let temp = null;
            let valid = this.items.some(element => {
                if ( element.school_activities_affiliation && element.school_activities_affiliation.length > 32) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '소속은 32자 이내로 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else if ( element.school_activities_role && element.school_activities_role.length > 20) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '담당역할은 20자 이내로 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else if ( element.school_activities_contents && element.school_activities_contents.length > 30) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '활동내용은 30자 이내로 작성해주세요',
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
            url = '/kor/api/job-detail/school_activities/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {activities: this.$store.state.school_activities}
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.school_activities = res.data;
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
