<template>
    <div class="form-container" title="기본정보">
        <form :action="'/api/job/'+job.id" method="post" id="individualInfoForm" @submit.prevent="setInfo(job)">
            <input type="hidden" name="user_id" v-model="user.id"/>
            <input type="hidden" name="job_id" v-model="job.id"/>
            <div class="form-wrap form-left">
                <h3>인적사항</h3>
                <div class="form-group">
                    <label for="">성명(한글)</label>
                    <input type="text" name="name" v-model="user.name">
                </div>
                <div class="form-group">
                    <label for="">성명(영문)</label>
                    <input type="text" name="name_en" v-model="user_info.name_en" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">생년월일</label>
                    <input type="text" name="birth_day" v-model="user_info.birth_day" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <input type="text" name="phone_decrypt" v-model="job.phone_decrypt" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <input type="text" name="email" v-model="user.email" disabled placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">현거주지</label>
                    <div class="input-gorup">
                        <input type="text" name="address_1" v-model="job.address_1" placeholder="입력해주세요.">
                        <input type="text" name="address_2" v-model="job.address_2" placeholder="입력해주세요.">
                    </div>
                </div>
            </div>
            <div class="form-wrap form-img">
                <h3>사진업로드<em>(최근 3개월내)</em></h3>
                <div class="form-group">
                    <div class="picture">
                        <span class="picture-text">사진을<br> 등록해주세요.</span>
                        <!-- <img :src="'/'+job.file_path" alt="" style="height: 300px;" v-if="job.file_path"> -->
                    </div>
                    <label for="pic" class="input-file-trigger">
                        이미지 업로드
                        <input type="file" name="pic" id="pic">
                    </label>
                </div>
            </div>
            <div class="button-group">
                <button>저장</button>
            </div>
        </form>
        <VSpinner v-if="isSubmit"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import {getHeader, getAuth, getUser, apiDomain} from '../../config'
import VSpinner from 'vue-spinner/src/BeatLoader'
import Language from './Language.vue'
export default {
  components: { Language },
    props: ['job_id'],
    components: {
        VSpinner
    },
    computed: {
        job () { return this.$store.state.job },
        user () { return this.$store.state.user },
        user_info () { return this.$store.state.user_info },
        oversea () { return this.$store.state.oversea },
    },
    data: function() {
        return {
            isAuth: false,
            isSubmit: true,
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        if (this.isAuth) {
            this.getInfo();
        } else {
            Swal.fire({
                title: '로그인해주세요!',
                icon: 'info',
                confirmButtonText: '<a href="/work-with-us/job/">확인</a>'
            });
            this.isSubmit = false;
        }
    },
    methods: {
        getInfo: function() {
            axios.get('/api/work-with-us/job/'+ this.job_id,{
                'headers': getHeader()
            })
            .then(res => {
                // this.$store.state.oversea = res.data.overseas_studys;
                // console.log(res.data);
                this.$store.state.job = {
                    address_1: res.data.address_1,
                    address_2: res.data.address_2,
                    cover_letter: res.data.cover_letter,
                    file_path: res.data.file_path,
                    id: res.data.id,
                    phone_decrypt: res.data.phone_decrypt,
                    recruit_id: res.data.recruit_id,
                    status: res.data.status,
                    status_ko: res.data.status_ko,
                    created_at: res.data.created_at,
                    updated_at: res.data.updated_at,
                    user_id: res.data.user_id,
                };
                this.$store.state.user = res.data.user ? {
                    id: res.data.user.id,
                    name: res.data.user.name,
                    email: res.data.user.email,
                } : this.$store.getters.getUser;
                this.$store.state.user_info = res.data.user_info.length ? res.data.user_info : this.$store.getters.getDefaultUserInfo;
                this.$store.state.award = res.data.awards.length ? res.data.awards : this.$store.getters.getDefaultAwards;
                this.$store.state.career = res.data.careers.length ? res.data.careers : this.$store.getters.getDefaultCareers;
                this.$store.state.certificate = res.data.certificates.length ? res.data.certificates : this.$store.getters.getDefaultCertificates;
                this.$store.state.education = res.data.educations.length ? res.data.educations : this.$store.getters.getDefaultEducations;
                this.$store.state.language = res.data.languages.length ? res.data.languages : this.$store.getters.getDefaultLanguages;
                this.$store.state.military = res.data.military ? res.data.military : this.$store.getters.getDefaultMilitary;
                this.$store.state.oa = res.data.oas.length ? res.data.oas : this.$store.getters.getDefaultOas;
                this.$store.state.oversea = res.data.overseas_studys.length ? res.data.overseas_studys : this.$store.getters.getDefaultOverseasStudys;
                this.isSubmit = false;
            })
            .catch(err => {
                console.error(err);
                this.isSubmit = false;
            })
        },
        setInfo: function(item) {
            this.isSubmit = true;
            var form = document.querySelector('#individualInfoForm');
            var formData = new FormData(form);
            formData._method = this.job_id ? 'PUT': 'POST';

            let headers = getHeader();
            headers['content-type'] = 'multipart/form-data';

            let url = '/api/work-with-us/job/'+ this.job_id;
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
                this.isSubmit = false;
            })
            .catch(err => {
                console.error(err);
                this.isSubmit = false;
            })
        }
    }
}
</script>
