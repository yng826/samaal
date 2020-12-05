<template>
    <div class="language-container form-container">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>외국어 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
                <div class="form-group">
                    <label for="language_type">구분</label>
                    <input type="text" name="language_type" v-model="item.language_type">
                </div>
                <div class="form-group">
                    <label for="language_name">TEST명</label>
                    <input type="text" name="language_name" v-model="item.language_name">
                </div>
                <div class="form-group">
                    <label for="language_grade">점수/등급</label>
                    <input type="text" name="language_grade" v-model="item.language_grade">
                </div>
                <div class="form-group">
                    <label for="language_level">회화수준</label>
                    <input type="text" name="language_level" v-model="item.language_level">
                </div>
                <div class="form-group">
                    <label for="language_start">재학기간</label>
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="language_start" :language="ko" v-model="item.language_start" format="yyyy-MM-dd"></Datepicker>
                        <span class="from-arrow">~</span>
                        <Datepicker class="inline-block" name="language_end" :language="ko" v-model="item.language_end" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
            </div>
        </form>
        <div class="button-group">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn-save" @click="saveItems">저장</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['job_id'],
    components: {
        Datepicker,
    },
    computed: {
        items () {
        return this.$store.state.language
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSended: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        addItem: function() {
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
            if ( this.isSended ) {
                return false;
            }
            this.isSended = true;
            Swal.fire({
                title: '삭제하시겠습니까?',
                showDenyButton: true,
                confirmButtonText: `네`,
                denyButtonText: `아니오`,
                }).then((result) => {
                if (result.isConfirmed) {

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
                            this.isSended = false;
                            Swal.fire({
                                title: '삭제되었습니다!',
                                icon: 'success',
                                confirmButtonText: '확인'
                            });
                        })
                        .catch(err => {
                            this.isSended = false;
                            Swal.fire({
                                title: '삭제에 실패했습니다!',
                                icon: 'danger',
                                confirmButtonText: '확인'
                            });
                            console.error(err);
                        })
                    } else {
                        this.isSended = false;
                        Swal.fire({
                            title: '삭제되었습니다!',
                            icon: 'success',
                            confirmButtonText: '확인'
                        });

                    }
                    this.items.splice(index, 1);
                } else if (result.isDenied) {
                    this.isSended = true;
                }
            });

        },
        saveItems: function() {
            if ( this.isSended ) {
                return false;
            }
            this.isSended = true;
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
                this.isSended = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
            })
            .catch(err => {
                this.isSended = false;
                Swal.fire({
                    title: '저장에 실패했습니다!',
                    icon: 'danger',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
