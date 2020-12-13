<template>
    <div class="overseas_study-container form-container" v-if="this.$store.state.step == 2">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>해외연수 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
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
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="overseas_study_start" v-model="item.overseas_study_start" format="yyyy-MM-dd"></Datepicker>
                        <span class="from-arrow">~</span>
                        <Datepicker class="inline-block" name="overseas_study_end" v-model="item.overseas_study_end" format="yyyy-MM-dd"></Datepicker>
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
        <div class="button-group">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn-save" @click="saveItems">저장</button>
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
    props: ['job_id'],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        items () {
            return this.$store.state.oversea
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
                    confirmButtonText: '확인'
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
