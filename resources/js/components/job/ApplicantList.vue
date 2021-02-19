<template>
    <div class="form-container" v-if="isAuth">
        <table class="table">
            <thead>
                <tr>
                    <th>공고명</th>
                    <th>접수기한</th>
                    <th>지원정보</th>
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
    }
}
</script>
