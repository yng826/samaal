<template>
    <div class="form-container" title="기본정보">
        <form :action="'/api/job/'+item.id" method="post" id="individualInfoForm" @submit.prevent="setInfo(item)">
            <input type="hidden" name="user_id" v-model="item.user.id"/>
            <input type="hidden" name="job_id" v-model="item.id"/>
            <div class="form-wrap">
                <h3>인적사항</h3>
                <div class="form-group">
                    <label for="">성명(한글)</label>
                    <input type="text" name="name" v-model="item.user.name">
                </div>
                <div class="form-group">
                    <label for="">성명(영문)</label>
                    <input type="text" name="name_en" v-model="item.user_info.name_en">
                </div>
                <div class="form-group">
                    <label for="">생년월일</label>
                    <input type="text" name="birth_day" v-model="item.user_info.birth_day">
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <input type="text" name="phone_decrypt" v-model="item.phone_decrypt">
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <input type="text" name="email" v-model="item.user.email" disabled>
                </div>
                <div class="form-group">
                    <label for="">현거주지</label>
                    <input type="text" name="address_1" v-model="item.address_1">
                    <input type="text" name="address_2" v-model="item.address_2">
                </div>
            </div>
            <div class="form-wrap">
                <h3>사진업로드</h3>
                <div class="form-group">
                    <figure class="picture">
                        <img :src="'/'+item.file_path" alt="" style="height: 300px;">
                    </figure>
                    <input type="file" name="pic" id="pic">
                </div>
            </div>
            <div class="button-group">
                <button>저장</button>
            </div>
        </form>
        <hr>
        <!-- <form action="/api/job/{{ item->id }}/edu" method="post">
            <input type="hidden" name="hello" value="world">
            <div class="form-group">
                <label for="">학교명</label>
                <input type="text" name="school_name" value="학교1">
            </div>
            <button class="submit">전송</button>
        </form> -->
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import {getHeader, getAuth, getUser, apiDomain} from '../../config'
export default {
    props: ['index'],
    data: function() {
        return {
            isAuth: false,
            item: {
                user: { name: '' },
                user_info: {},
            }
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
            // console.log(item);

            var form = document.querySelector('#individualInfoForm');
            var formData = new FormData(form);
            formData._method = this.item.id ? 'PUT': 'POST';

            let headers = getHeader();
            headers['content-type'] = 'multipart/form-data';

            let url = '/api/work-with-us/job/'+ this.index;
            if (this.item.id) {
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
                this.item.file_path = res.data.file_path;

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
