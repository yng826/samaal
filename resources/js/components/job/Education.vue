<template>
    <div class="education-container form-container">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>학력사항 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
                <div class="form-group">
                    <label for="school_name">학교명</label>
                    <input type="text" name="school_name" v-model="item.school_name">
                </div>
                <div class="form-group">
                    <label for="edu_major">전공</label>
                    <input type="text" name="edu_major" v-model="item.edu_major">
                </div>
                <div class="form-group">
                    <label for="edu_grade">성적</label>
                    <input type="text" name="edu_grade" v-model="item.edu_grade">
                </div>
                <div class="form-group">
                    <label for="graduation">성적</label>
                    <input type="text" name="graduation" v-model="item.graduation">
                </div>
                <div class="form-group">
                    <label for="edu_start">재학기간</label>
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="edu_start" :language="ko" v-model="item.edu_start" format="yyyy-MM-dd"></Datepicker>
                        <span>~</span>
                        <Datepicker class="inline-block" name="edu_end" :language="ko" v-model="item.edu_end" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
                <div>{{ item.status_ko }}</div>
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
    props: ['action'],
    components: {
        Datepicker
    },
    computed: {
        items () { return this.$store.state.education }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        if ( this.isAuth ) {
        } else {
            console.log('no auth');
        }
    },
    methods: {
        addItem: function() {
            this.items.push({
                school_name: "",
                edu_major: "",
                edu_grade: "",
                edu_start: "",
                edu_end: "",
                graduation: "",
            });
        },
        removeItem: function(id, index) {
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
                        url = '/api/job-detail/education/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {oa: this.$store.state.oa}
                        })
                        .then(res => {
                            Swal.fire({
                                title: '삭제되었습니다!',
                                icon: 'success',
                                confirmButtonText: '확인'
                            });
                        })
                        .catch(err => {
                            Swal.fire({
                                title: '삭제에 실패했습니다!',
                                icon: 'danger',
                                confirmButtonText: '확인'
                            });
                            console.error(err);
                        })
                    } else {
                        Swal.fire({
                            title: '삭제되었습니다!',
                            icon: 'success',
                            confirmButtonText: '확인'
                        });

                    }
                    this.items.splice(index, 1);
                } else if (result.isDenied) {
                }
            });

        },
        saveItems: function() {
            console.log(this.$store.state);
            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/education/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {oa: this.$store.state.oa}
            })
            .then(res => {
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
            })
            .catch(err => {
                Swal.fire({
                    title: '삭제에 실패했습니다!',
                    icon: 'danger',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
