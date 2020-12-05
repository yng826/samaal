<template>
    <div class="career-container form-container">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>경력사항 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
                <div class="form-group">
                    <label for="career_start">근무기간</label>
                    <Datepicker class="inline-block" name="career_start" :language="ko" v-model="item.career_start" format="yyyy-MM-dd"></Datepicker>
                    <Datepicker class="inline-block" name="career_end" :language="ko" v-model="item.career_end" format="yyyy-MM-dd"></Datepicker>
                </div>
                <div class="form-group">
                    <label for="career_name">직장명</label>
                    <input type="text" name="career_name" v-model="item.career_name">
                </div>
                <div class="form-group">
                    <label for="career_position">직위/근무부서</label>
                    <input type="text" name="career_position" v-model="item.career_position">
                </div>
                <div class="form-group">
                    <label for="career_role">담당업무</label>
                    <input type="text" name="career_role" v-model="item.career_role">
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
        return this.$store.state.career
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        addItem: function() {
            this.items.push({
                job_id: this.job_id,
                career_start: "",
                career_end: "",
                career_name: "",
                career_position: "",
                career_role: "",
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
                        url = '/api/job-detail/career/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {career: this.$store.state.career}
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
            url = '/api/job-detail/career/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {career: this.$store.state.career}
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
