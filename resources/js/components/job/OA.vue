<template>
    <div class="oa-container form-container">
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>PC사용능력 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
                <div class="form-group">
                    <label for="oa_name">사용가능OA</label>
                    <input type="text" name="oa_name" v-model="item.oa_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="oa_level">OA수준</label>
                    <input type="text" name="oa_level" v-model="item.oa_level" placeholder="입력해주세요">
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
import {getHeader, getAuth, getUser} from '../../config'
import VSpinner from 'vue-spinner/src/BeatLoader'
export default {
    props: ['job_id'],
    components: {
        VSpinner,
    },
    computed: {
        items () {
        return this.$store.state.oa
        }
    },
    data: function() {
        return {
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
                oa_name: "",
                oa_level: "",
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
            this.isSubmit = true;
            Swal.fire({
                title: '삭제하시겠습니까?',
                showDenyButton: true,
                allowOutsideClick: false,ideClick: false,
                allowOutsideClick: false,ideClick: false,
                confirmButtonText: `네`,
                denyButtonText: `아니오`,
                }).then((result) => {
                if (result.isConfirmed) {

                    if ( id ) {
                        let headers = getHeader();
                        let url, method;
                        url = '/api/job-detail/oa/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {oa: this.$store.state.oa}
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
        saveItems: function() {
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;
            console.log(this.$store.state);
            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/oa/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {oa: this.$store.state.oa}
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
