<template>
    <div class="form-container" v-if="isAuth">
        <table class="table">
            <thead>
                <tr>
                    <th>공고명</th>
                    <th>접수기한</th>
                    <th>지원정보</th>
                    <th>삭제신청</th>
                    <th>상태</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, id) in items" :key="id" >
                    <td>{{ item.recruit.title }}</td>
                    <td>{{ item.recruit.end_date }}</td>
                    <td>
                        <a :href="'/kor/work-with-us/recruit/'+ item.recruit_id + '/edit'"  class="btn btn-primary">{{buttonText}}</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger" @click="onDeleteClick(item.id)">삭제</a>
                    </td>
                    <td>{{ item.status_ko }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2';
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['action'],
    data: function() {
        return {
            isAuth: false,
            items: [],
        }
    },
    computed: {
        status() {
            return this.$store.state.job.status
        },
        buttonText: function() {
            return this.status == 'saved' ? '수정/삭제' : '확인';
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        if ( this.isAuth ) {
            const user = getUser();
            console.log( Promise);
            axios.get('/kor/api/work-with-us/job/', {
                'headers': getHeader()
            })
            .then((res)=> {
                this.items = res.data.data
            })
            .catch(err => {
                this.$root.$emit('openPopup', 'login');
            });
        } else {
            this.$root.$emit('openPopup', 'login');
        }
    },
    methods: {
        onDeleteClick: function(id) {
            if ( this.items.length == 1 ) {
                if( !confirm('지원서와 개인정보가 같이 삭제됩니다.')) {
                    return false;
                }
            }
            this.isAuth = getAuth();
            if ( this.isAuth ) {
                const user = getUser();
                console.log( Promise);
                axios.delete('/kor/api/work-with-us/job/' + id, {
                    'headers': getHeader()
                })
                .then((res)=> {
                    if (res.data.result == 'success') {
                        Swal.fire({
                            title: '삭제되었습니다!',
                            icon: 'error',
                            confirmButtonText: '확인',
                            allowOutsideClick: false,
                        });
                        this.items = res.data.list;
                        return false;
                    }
                    console.log(res.data);
                })
                .catch(err => {
                    this.$root.$emit('openPopup', 'login');
                });
            } else {
                this.$root.$emit('openPopup', 'login');
            }
        }
    }
}
</script>
