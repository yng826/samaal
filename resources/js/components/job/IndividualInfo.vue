<template>
    <div class="form-container" title="기본정보">
        <form :action="'/api/job/'+job.id" method="post" id="individualInfoForm" @submit.prevent="setInfo(job)">
            <input type="hidden" name="user_id" v-model="user.id"/>
            <input type="hidden" name="job_id" v-model="job.id"/>
            <div class="form-wrap">
                <h3>인적사항</h3>
                <div class="form-group">
                    <label for="">성명(한글)</label>
                    <input type="text" name="name" v-model="user.name">
                </div>
                <div class="form-group">
                    <label for="">성명(영문)</label>
                    <input type="text" name="name_en" v-model="user_info.name_en">
                </div>
                <div class="form-group">
                    <label for="">생년월일</label>
                    <input type="text" name="birth_day" v-model="user_info.birth_day">
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <input type="text" name="phone_decrypt" v-model="job.phone_decrypt">
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <input type="text" name="email" v-model="user.email" disabled>
                </div>
                <div class="form-group">
                    <label for="">현거주지</label>
                    <input type="text" name="address_1" v-model="job.address_1">
                    <input type="text" name="address_2" v-model="job.address_2">
                </div>
            </div>
            <div class="form-wrap">
                <h3>사진업로드</h3>
                <div class="form-group">
                    <figure class="picture">
                        <img :src="'/'+job.file_path" alt="" style="height: 300px;" v-if="job.file_path">
                    </figure>
                    <input type="file" name="pic" id="pic">
                </div>
            </div>
            <div class="button-group">
                <button>저장</button>
            </div>
        </form>
        <hr>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import {getHeader, getAuth, getUser, apiDomain} from '../../config'
export default {
    props: ['index'],
    computed: {
        job () { return this.$store.state.job },
        user () { return this.$store.state.user },
        user_info () { return this.$store.state.user_info },
    },
    data: function() {
        return {
            isAuth: false,
            // item: {
            //     user: { name: '' },
            //     user_info: {},
            // }
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        if (this.isAuth) {
            this.getInfo();
        }
    },
    methods: {
        getInfo: function() {
            axios.get('/api/work-with-us/job/'+ this.index,{
                'headers': getHeader()
            })
            .then(res => {
                // console.log(res.data);
                this.item = res.data;
            })
            .catch(err => {
                console.error(err);
            })
        },
        setInfo: function(item) {
            var form = document.querySelector('#individualInfoForm');
            var formData = new FormData(form);
            formData._method = this.job.id ? 'PUT': 'POST';

            let headers = getHeader();
            headers['content-type'] = 'multipart/form-data';

            let url = '/api/work-with-us/job/'+ this.index;
            if (this.job.id) {
                url += '?_method=PUT';
            }
            axios({
                method: 'POST',
                url: url,
                data: formData,
                headers: headers,
            })
            .then(res => {
                console.log(res);
                this.job.file_path = res.data.file_path;

                Swal.fire({
                    title: '저장되었습니다!',
                    // text: '계속 이용하시기 바랍니다.',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
            })
            .catch(err => {
                console.error(err);
            })
        }
        // sendPost: function () {
        //     User.login({
        //         email: this.email,
        //         password: this.password,
        //     });
        // }
    }
}
</script>
