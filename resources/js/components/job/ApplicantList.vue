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
                        <a :href="'/work-with-us/job/'+ item.id" class="btn btn-primary">수정/삭제</a>
                    </td>
                    <td>{{ item.status_ko }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios'
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['action'],
    data: function() {
        return {
            isAuth: false,
            items: [],
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        if ( this.isAuth ) {
            const user = getUser();
            axios.get('/api/work-with-us/job/', {
                'headers': getHeader()
            })
            .then((res)=> {
                this.items = res.data.data
            });
        } else {
            console.log('no auth');
        }
    },
    methods: {
    }
}
</script>
