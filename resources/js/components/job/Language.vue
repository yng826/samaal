<template>
    <div class="language-container form-container" v-if="isShow">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>외국어</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)" v-if="isOpen">삭제</button>
                <div class="form-group">
                    <label for="language_type_option">구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="language_type_option" v-model="item.language_type_option" @change="changeTypes($event, id)">
                                <option v-for="type in types" :value="type.value" :key="type.value">{{type.name}}</option>
                            </select>
                        </div>
                        <input type="text" v-if="item.language_type_option == 'etc'" name="language_type" v-model="item.language_type" placeholder="입력해주세요">
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_name">TEST명</label>
                    <input type="text" name="language_name" v-model="item.language_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="language_grade">점수/등급</label>
                    <input type="text" name="language_grade" v-model="item.language_grade" placeholder="점수 또는 등급을 입력해주세요">
                </div>
                <div class="form-group">
                    <label for="language_grade_full">만점</label>
                    <input type="text" name="language_grade_full" v-model="item.language_grade_full" placeholder="만점을 입력해주세요">
                </div>
                <div class="form-group">
                    <label for="language_level">회화수준</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="language_level" v-model="item.language_level">
                                <option v-for="level in levels" :value="level.value" :key="level.value">{{level.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_start">인증일</label>
                    <div class="input_date-group input-group">
                        <Datepicker class="inline-block" name="language_start" :language="ko" v-model="item.language_start" format="yyyy-MM-dd"></Datepicker>
                    </div>
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
            return this.$store.state.language
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
            types: [
                {value: 'en', name:'영어'},
                {value: 'jp', name:'일어'},
                {value: 'ch', name:'중국어'},
                {value: 'etc', name:'기타'}
            ],
            levels: [
                {value: 'high', name:'상'},
                {value: 'normal', name:'중'},
                {value: 'low', name:'하'},
            ],
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        changeTypes: function($event, id){
            let type = $event.target.value;
            switch (type) {
                case 'en':
                    this.items[id].language_type = '영어';
                    break;
                case 'jp':
                    this.items[id].language_type = '일어';
                    break;
                case 'ch':
                    this.items[id].language_type = '중국어';
                    break;
                default:
                    this.items[id].language_type = '';
                    break;
            }
        },
        addItem: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.items.length >= 7 ) {
                Swal.fire({
                    title: '추가할 수 없습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                });
                return false;
            }
            this.items.push({
                id: "",
                language_type: "",
                language_start: "",
                language_end: "",
                language_name: "",
                language_grade: "",
                language_level: "",
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
                        url = '/api/job-detail/language/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {language: this.$store.state.language}
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
            url = '/api/job-detail/language/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {language: this.$store.state.language}
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
