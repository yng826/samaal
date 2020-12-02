<template>
    <div class="military-container">
        <form v-for="(item, id) in items" :key="id" >
            <h3>병역사항</h3>
            <input type="hidden" name="id" v-model="item.id">
            <div class="form-group">
                <label for="military_type">구분/구별</label>
                <input type="text" name="military_type" v-model="item.military_type">
            </div>
            <div class="form-group">
                <label for="military_discharge">제대구분</label>
                <input type="text" name="military_discharge" v-model="item.military_discharge">
            </div>
            <div class="form-group">
                <label for="military_rank">계급</label>
                <input type="text" name="military_rank" v-model="item.military_rank">
            </div>
            <div class="form-group">
                <label for="military_exemption">군면제사유</label>
                <input type="text" name="military_exemption" v-model="item.military_exemption">
            </div>
            <div class="form-group">
                <label for="military_duration_start">군복무기간</label>
                <Datepicker class="inline-block" name="military_duration_start" :military="ko" v-model="item.military_duration_start" format="yyyy-MM-dd"></Datepicker>
                <Datepicker class="inline-block" name="military_duration_end" :military="ko" v-model="item.military_duration_end" format="yyyy-MM-dd"></Datepicker>
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
        Datepicker,
    },
    computed: {
        items () {
        return this.$store.state.military
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
                id: '',
                military_type: '',
                military_discharge: '',
                military_rank: '',
                military_exemption: '',
                military_duration_start: '',
                military_duration_end: '',

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
                        url = '/api/job-detail/military/' + id;
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
            url = '/api/job-detail/military/' + this.job_id;
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
