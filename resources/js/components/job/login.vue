<template>
    <div>
        <form id="login-form" :action="action" method="POST" @submit.prevent="sendPost" v-if="!isAuth">
            <div class="form-group">
                <label for="name">성명</label>
                <input type="text" name="name" id="name" v-model="name">
            </div>
            <div class="form-group">
                <label for="email">이메일</label>
                <input type="text" name="email" id="email" v-model="email">
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" name="password" id="password" v-model="password">
            </div>
            <div class="form-group">
                <a href="">비밀번호를 잊으셨나요?</a>
            </div>
            <button type="submit">확인하기</button>
        </form>
    </div>
</template>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['action'],
    data: function() {
        return {
            name: '',
            email: '',
            password: '',
            isAuth: false,
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        // require('../../job/User')
    },
    methods: {
        sendPost: function () {
            User.login({
                email: this.email,
                password: this.password,
            });
        }
    }
}
</script>
