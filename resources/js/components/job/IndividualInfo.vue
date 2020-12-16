<template>
    <div class="form-container" title="기본정보" v-if="this.$store.state.step == 2">
        <form :action="'/api/job/'+job.id" method="post" id="individualInfoForm" @submit.prevent="setInfo(job)">
            <input type="hidden" name="user_id" v-model="user.id"/>
            <input type="hidden" name="recruit_id" v-model="this.recruit_id"/>
            <input type="hidden" name="job_id" v-model="job.id"/>
            <div class="form-wrap">
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <label for="">
                    <input type="checkbox" name="" id="">
                    동의
                </label>
                <label for="">
                    <input type="checkbox" name="" id="">
                    동의
                </label>
            </div>
            <div class="form-wrap form-img" v-if="this.job.id">
                <h3>사진업로드<em>(최근 3개월내)</em></h3>
                <div class="form-group">
                    <input type="hidden" name="file_path" v-model="job.file_path">
                    <div class="picture" v-bind:style="pic">
                        <span class="picture-text" v-if="!job.file_path">사진을<br> 등록해주세요.</span>
                    </div>
                    <label for="pic" class="input-file-trigger">
                        이미지 업로드
                        <input type="file" name="pic" id="pic">
                    </label>
                </div>
            </div>
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
                    <div class="input_date-group">
                        <Datepicker class="inline-block" name="birth_day" :language="ko" v-model="user_info.birth_day" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <input type="text" name="phone_decrypt" v-model="job.phone_decrypt" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <input type="text" name="email" :disabled="job.id || isAuth" v-model="user.email" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" name="password" id="password" v-model="password" ref="password">
                </div>
                <div class="form-group">
                    <label for="password_confirm">비밀번호재입력</label>
                    <input type="password" name="password_confirm" id="password_confirm" v-model="password_confirm" ref="password_confirm">
                </div>
                <div class="form-group">
                    <label for="">현거주지</label>
                    <div class="input-gorup">
                        <input type="text" name="address_1" v-model="job.address_1" placeholder="입력해주세요.">
                        <input type="text" name="address_2" v-model="job.address_2" placeholder="입력해주세요.">
                    </div>
                </div>
            </div>
            <div class="button-group">
                <button>저장</button>
            </div>
        </form>
        <VSpinner v-if="isSubmit"></VSpinner>
    </div>
</template>
<style>
.picture {
    background-size: cover;
    background-position: center;
}
</style>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser, apiDomain} from '../../config'
import User from '../../job/User'
import VSpinner from 'vue-spinner/src/BeatLoader'
import Language from './Language.vue'
export default {
  components: { Language },
    props: ['mode', 'recruit_id'],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        job_id() { return this.$store.state.job.id; },
        job () { return this.$store.state.job },
        user () { return this.$store.state.user },
        user_info () { return this.$store.state.user_info },
        oversea () { return this.$store.state.oversea },
        pic() {
            if ( this.$store.state.job ) {
                if ( this.$store.state.job.file_path ) {
                    return {
                        'background-image': 'url(/storage/'+ this.$store.state.job.file_path +')',
                    };
                } else {
                return {
                    'background-image': 'none',
                };
            }
            } else {
                return {
                    'background-image': 'none',
                };
            }
        },
        status() {
            return this.$store.state.job.status
        }
    },
    data: function() {
        return {
            isAuth: false,
            isSubmit: true,
            ko: ko,
            password: '',
            password_confirm: '',
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
        console.log(this.isAuth);
        if (this.isAuth) {
            if (this.mode == 'create') {
                window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/edit';
            } else {
                let user = getUser();
                this.$store.state.user = user;
                console.log(this.isAuth);
                this.getInfo();
                this.$store.state.job.recruit_id = this.recruit_id;
                // this.$store.state.user.email = user.user.email;
            }
            this.isSubmit = false;
        } else {
            // this.$root.$emit('openPopup', 'login');
            if ( this.recruit_id ) {

            } else {
                Swal.fire({
                    title: '로그인해주세요!',
                    icon: 'info',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$root.$emit('openPopup', 'login');
                    // alert();
                });
            }
            this.isSubmit = false;
        }
    },
    methods: {
        getInfo: function() {
            axios.get('/api/work-with-us/recruit/'+ this.recruit_id,{
                'headers': getHeader()
            })
            .then(res => {

                if ( res.data ) {
                    console.log(res.data);
                    this.$store.state.job = {
                        address_1: res.data.address_1,
                        address_2: res.data.address_2,
                        cover_letter: res.data.cover_letter,
                        is_cover_letter: res.data.is_cover_letter,
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
                    this.$store.state.user_info = res.data.user_info ? res.data.user_info : this.$store.getters.getDefaultUserInfo;
                    this.$store.state.award = res.data.awards.length ? res.data.awards : this.$store.getters.getDefaultAwards;
                    this.$store.state.career = res.data.careers.length ? res.data.careers : this.$store.getters.getDefaultCareers;
                    this.$store.state.certificate = res.data.certificates.length ? res.data.certificates : this.$store.getters.getDefaultCertificates;
                    this.$store.state.education = res.data.educations.length ? res.data.educations : this.$store.getters.getDefaultEducations;
                    this.$store.state.language = res.data.languages.length ? res.data.languages : this.$store.getters.getDefaultLanguages;
                    this.$store.state.military = res.data.military ? res.data.military : this.$store.getters.getDefaultMilitary;
                    this.$store.state.oa = res.data.oas.length ? res.data.oas : this.$store.getters.getDefaultOas;
                    this.$store.state.oversea = res.data.overseas_studys.length ? res.data.overseas_studys : this.$store.getters.getDefaultOverseasStudys;
                    this.isSubmit = false;
                } else {

                    Swal.fire({
                        title: '권한이 없습니다',
                        icon: 'error',
                        confirmButtonText: '확인',
                        allowOutsideClick: false
                    }).then(result => {
                        if (result.isConfirmed) {
                            this.$root.$emit('closePopup');
                            if ( this.isAuth) {
                                window.location.href = '/work-with-us/job/';
                            } else {
                                window.location.href = '/work-with-us/recruit/';
                            }
                        }
                    });
                }
            })
            .catch(err => {
                console.error(err);
                this.isSubmit = false;
            })
        },
        validation: function() {
            console.log(this.user);
            console.log(this.user_info);
            if ( this.user.name == '' || typeof this.user.name == 'undefined' ) {
                return {
                    result: false,
                    msg: '이름을 입력해주세요',
                };
            }
            if ( this.user_info.birth_day == '' || typeof this.user_info.birth_day == 'undefined' ) {
                return {
                    result: false,
                    msg: '생일을 입력해주세요',
                };
            }
            if ( this.job.phone_decrypt == '' || typeof this.job.phone_decrypt == 'undefined' ) {
                return {
                    result: false,
                    msg: '휴대폰번호를 입력해주세요',
                };
            }
            if ( this.user.email == '' ) {
                return {
                    result: false,
                    msg: '이메일을 입력해주세요',
                };
            }
            if ( !User.validateEmail (this.user.email)) {
                return {
                    result: false,
                    msg: '이메일형식이 맞지 않습니다',
                };
            }
            if ( this.password.length >= 16 ) {
                return {
                    result: false,
                    msg: '비밀번호가 너무 깁니다',
                };
            }
            if ( !this.job_id ) {
                if ( this.password == '' || typeof this.password == 'undefined' ) {
                    return {
                        result: false,
                        msg: '비밀번호를 입력해주세요',
                    };
                }
                if ( this.password.length < 8 ) {
                    return {
                        result: false,
                        msg: '비밀번호는 8자 이상으로 해주세요',
                    };
                }
                if ( this.password !== this.password_confirm || typeof this.password_confirm == 'undefined' ) {
                    return {
                        result: false,
                        msg: '비밀번호가 일치하지 않습니다',
                    };
                }
            } else {
                if ( this.password != '' ) {
                    if ( this.password.length < 8 ) {
                        return {
                            result: false,
                            msg: '비밀번호는 8자 이상으로 해주세요',
                        };
                    }
                    if ( this.password !== this.password_confirm || typeof this.password_confirm == 'undefined' ) {
                        return {
                            result: false,
                            msg: '비밀번호가 일치하지 않습니다',
                        };
                    }
                }
            }
            return {
                result: true,
                msg: '',
            }
        },
        setInfo: function(item) {
            if ( this.status == 'submit' ) {
                Swal.fire({
                    title: '이미 제출되었습니다!',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            if ( this.status == 'expired' ) {
                Swal.fire({
                    title: '제출기한이 지났습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            const validate = this.validation();
            if ( !validate.result ) {
                Swal.fire({
                    text: validate.msg,
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                this.isSubmit = false;
                return false;
            }
            this.isSubmit = true;
            let url;
            let headers = getHeader();
            headers['content-type'] = 'multipart/form-data';

            var form = document.querySelector('#individualInfoForm');
            var formData = new FormData(form);
            console.log('JOBID::', this.job_id);
            console.log('RECRUIT ID::', this.recruit_id);
            console.log('RECRUIT ID::', this.$store.state.job.recruit_id);

            if ( typeof this.job_id == 'undefined' || typeof this.job.id == 'undefined' || this.job.id == '') {
                formData._method = 'POST';
                if ( !this.isAuth ) {
                    url = '/api/join/';
                } else {
                    url = '/api/work-with-us/job'
                }
            } else {
                formData._method = 'PUT';
                url = '/api/work-with-us/job/'+ this.job_id + '?_method=PUT';
            }

            axios({
                method: 'POST',
                url: url,
                data: formData,
                headers: headers,
            })
            .then(res => {
                console.log(res);
                this.isSubmit = false;
                if (res.data.result == 'success') {
                    this.job.file_path = res.data.file_path;

                    Swal.fire({
                        title: '저장되었습니다!',
                        text: res.data.msg,
                        icon: 'success',
                        confirmButtonText: '확인',
                        allowOutsideClick: false
                    }).then(result => {
                        console.log(res.data.type == 'join');
                        if (result.isConfirmed ) {
                            if ( res.data.job_id ) {
                                window.location.href = '/work-with-us/job/' + res.data.job_id
                            } else if ( res.data.job.id) {
                                window.location.href = '/work-with-us/job/' + res.data.job.id
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        title: '저장되지 않았습니다!',
                        text: res.data.msg,
                        icon: 'error',
                        confirmButtonText: '확인',
                        allowOutsideClick: false
                    }).then(result => {
                        if (result.isConfirmed) {
                            if ( !isAuth ) {

                            }
                            // this.$root.$emit('openPopup', 'login', this.recruit_id);
                            // window.location.href = '/work-with-us/job/' + res.data.job.id
                        }
                    });
                }
            })
            .catch(err => {
                console.error(err);
                this.isSubmit = false;
            })
        }
    }
}
</script>
