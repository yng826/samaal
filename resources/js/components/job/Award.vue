<template>
    <div class="award-container form-container">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>수상경력 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
                <div class="form-group">
                    <label for="award_name">시상명</label>
                    <input type="text" name="award_name" v-model="item.award_name">
                </div>
                <div class="form-group">
                    <label for="award_group_name">단체명</label>
                    <input type="text" name="award_group_name" v-model="item.award_group_name">
                </div>
                <div class="form-group">
                    <label for="award_date">수상일</label>
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="award_date" :language="ko" v-model="item.award_date" format="yyyy-MM-dd"></Datepicker>
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
        return this.$store.state.award
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
                award_name: "",
                award_group_name: "",
                award_date: "",
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
            if ( this.isSended ) {
                return false;
            }
            this.isSended = true;
            Swal.fire({
                title: '삭제하시겠습니까?',
                showDenyButton: true,
                allowOutsideClick: false,
                confirmButtonText: `네`,
                denyButtonText: `아니오`,
                }).then((result) => {
                if (result.isConfirmed) {

                    if ( id ) {
                        let headers = getHeader();
                        let url, method;
                        url = '/api/job-detail/award/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {award: this.$store.state.award}
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
                                icon: 'error',
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
                    this.isSended = false;
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
            url = '/api/job-detail/award/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {award: this.$store.state.award}
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
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
