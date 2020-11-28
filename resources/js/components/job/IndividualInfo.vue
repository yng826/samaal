<template>
    <div class="form-container" title="기본정보">
        <form :action="'/api/job/'+item.id" method="post" id="individualInfoForm">
            <div class="form-wrap">
                <h3>인적사항</h3>
                <div class="form-group">
                    <label for="">성명(한글)</label>
                    <input type="text" v-model="item.name">
                </div>
                <div class="form-group">
                    <label for="">성명(영문)</label>
                    <input type="text" v-model="item.name_en">
                </div>
                <div class="form-group">
                    <label for="">생년월일</label>
                    <input type="text" v-model="item.birth_day">
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <input type="text" v-model="item.phone_decrypt">
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <input type="text" v-model="item.email">
                </div>
                <div class="form-group">
                    <label for="">현거주지</label>
                    <input type="text" v-model="item.address_1">
                    <input type="text" v-model="item.address_2">
                </div>
            </div>
            <div class="form-wrap">
                <h3>사진업로드</h3>
                <div class="form-group">
                    <figure class="picture">
                        <img src="https://dummyimage.com/200x300/000/fff" alt="">
                    </figure>
                    <button class="picture-upload">이미지 업로드</button>
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
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['index'],
    data: function() {
        return {
            isAuth: false,
            item: {}
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
                console.log(res.data);
                this.item = res.data;
            })
            .catch(err => {
                console.error(err);
            })
        },
        setInfo: function() {
            let individualInfoForm = document.getElementById('individualInfoForm');
            formData = new FormData(individualInfoForm);
            let headers = getHeader();
            // headers['content-type'] = 'multipart/form-data';
            axios({
                method: 'POST',
                url: '/api/work-with-us/job/'+ this.index,
                headers: getHeader(),
                data: formData
            })
            .then(res => {
                console.log(res)
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
