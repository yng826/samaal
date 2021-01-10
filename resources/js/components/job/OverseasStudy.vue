<template>
    <div class="overseas_study-container form-container" v-if="isShow">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>해외연수</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)" v-if="isOpen">삭제</button>
                <input type="hidden" name="id" v-model="item.id">
                <div class="form-group">
                    <label for="country_name">국가/도시</label>
                    <input type="text" name="country_name" v-model="item.country_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="school_name">학교/단체</label>
                    <input type="text" name="school_name" v-model="item.school_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="overseas_study_start">기간</label>
                    <div class="input_date-group input-group">
                        <InputMask class="inline-block" name="overseas_study_start" v-model="item.overseas_study_start" mask="9999-99"/>
                        <span class="from-arrow">~</span>
                        <InputMask class="inline-block" name="overseas_study_end" v-model="item.overseas_study_end" mask="9999-99"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="overseas_study_name">연수명</label>
                    <input type="text" name="overseas_study_name" v-model="item.overseas_study_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="overseas_study_purpose">연수목적</label>
                    <input type="text" name="overseas_study_purpose" v-model="item.overseas_study_purpose" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="overseas_study_contents">연수내용</label>
                    <input type="text" name="overseas_study_contents" v-model="item.overseas_study_contents" placeholder="입력해주세요">
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
import InputMask from 'vue-input-mask';
import VSpinner from 'vue-simple-spinner'
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
            return this.$store.state.oversea
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
                country_name: "",
                school_name: "",
                overseas_study_start: "",
                overseas_study_end: "",
                overseas_study_name: "",
                overseas_study_position: "",
                overseas_study_role: "",
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
                        url = '/api/job-detail/overseas_study/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {oversea: this.$store.state.oversea}
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
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;
            console.log(this.$store.state);
            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/overseas_study/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {oversea: this.$store.state.oversea}
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.oversea = res.data;
                });
            })
            .catch(err => {
                this.isSubmit = false;
                Swal.fire({
                    title: '에 실패했습니다!',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
