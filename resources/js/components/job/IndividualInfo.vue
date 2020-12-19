<template>
    <div class="form-container" title="기본정보" v-if="isShow">
        <form :action="'/api/job/'+job.id" method="post" id="individualInfoForm" @submit.prevent="setInfo(job)">
            <input type="hidden" name="user_id" v-model="user.id"/>
            <input type="hidden" name="recruit_id" v-model="this.recruit_id"/>
            <input type="hidden" name="job_id" v-model="job.id"/>
            <div class="form-wrap form-img" v-if="this.job.id">
                <h3>사진업로드<em>(최근 3개월내)</em></h3>
                <div class="form-group">
                    <input type="hidden" name="file_path" v-model="job.file_path">
                    <img :src="this.preview" />
                    <div class="picture" v-if="!this.preview" v-bind:style="pic">
                        <span class="picture-text" v-if="!job.file_path">사진을<br> 등록해주세요.</span>
                    </div>
                    <label for="pic" class="input-file-trigger">
                        이미지 업로드
                        <input type="file" name="pic" id="pic" @change="picSelect">
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
                    <div class="input-gorup input_date-group">
                        <Datepicker class="inline-block" name="birth_day" :language="ko" v-model="user_info.birth_day" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <input type="text" name="phone_decrypt" v-model="job.phone_decrypt" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <div class="input-gorup">
                        <input type="text" name="email" :disabled="job.id || isAuth" :value="mode == 'edit' ? this.email : this.createEmail" @input="onInputEmail" placeholder="입력해주세요.">
                        <span v-if="emailEditable">@</span>
                        <input type="text" name="email_vendor_input" :value="this.emailVendor" @input="onInputVendor" :readonly="!selectEdit" v-if="emailEditable" placeholder="입력 또는 선택해주세요.">
                        <select name="email_vendor_select" id="" @change="onSelectEmail" v-if="emailEditable">
                            <option value="">이메일</option>
                            <option value="naver.com">네이버</option>
                            <option value="daum.net">다음</option>
                            <option value="google.com">구글</option>
                            <option value="manual">직접입력</option>
                        </select>
                    </div>
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
                        <input type="text" name="address_1" v-model="job.address_1" placeholder="입력해주세요." @click="onClickPost" readonly>
                        <DaumPost style="" @complete="onSearch" v-show="showPost" />
                        <input type="text" name="address_2" v-model="job.address_2" placeholder="입력해주세요.">
                    </div>
                </div>
            </div>
            <div class="form-wrap information-box" v-if="mode=='create'">
                <div class="privacy-box">
                    회원 가입 의사의 확인, 연령 확인 및 법정대리인 동의 진행, 이용자 및 법정대리인의 본인 확인, 이용자 식별, 회원탈퇴 의사의 확인 등 회원관리를 위하여 개인정보를 이용합니다.
                    콘텐츠 등 기존 서비스 제공(광고 포함)에 더하여, 인구통계학적 분석, 서비스 방문 및 이용기록의 분석, 개인정보 및 관심에 기반한 이용자간 관계의 형성, 지인 및 관심사 등에 기반한 맞춤형 서비스 제공 등 신규 서비스 요소의 발굴 및 기존 서비스 개선 등을 위하여 개인정보를 이용합니다.
                    법령 및 네이버 이용약관을 위반하는 회원에 대한 이용 제한 조치, 부정 이용 행위를 포함하여 서비스의 원활한 운영에 지장을 주는 행위에 대한 방지 및 제재, 계정도용 및 부정거래 방지, 약관 개정 등의 고지사항 전달, 분쟁조정을 위한 기록 보존, 민원처리 등 이용자 보호 및 서비스 운영을 위하여 개인정보를 이용합니다.
                    유료 서비스 제공에 따르는 본인인증, 구매 및 요금 결제, 상품 및 서비스의 배송을 위하여 개인정보를 이용합니다.
                    이벤트 정보 및 참여기회 제공, 광고성 정보 제공 등 마케팅 및 프로모션 목적으로 개인정보를 이용합니다.
                    서비스 이용기록과 접속 빈도 분석, 서비스 이용에 대한 통계, 서비스 분석 및 통계에 따른 맞춤 서비스 제공 및 광고 게재 등에 개인정보를 이용합니다.
                    보안, 프라이버시, 안전 측면에서 이용자가 안심하고 이용할 수 있는 서비스 이용환경 구축을 위해 개인정보를 이용합니다.
                </div>
                <label for="check-1" class="information-box__label">
                    <input type="checkbox" name="" id="check-1" class="information-box__check" v-model="agree">
                    <span>개인정보 이용 및 수집에 동의 합니다.</span>
                </label>
                <!-- <label for="check-2" class="information-box__label">
                    <input type="checkbox" name="" id="check-2" class="information-box__check">
                    <span>개인정보 이용 및 수집에 동의 합니다.</span>
                </label> -->
            </div>
            <div class="button-group" v-if="isPossibleSave">
                <button>저장</button>
            </div>
        </form>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<style>
.picture {
    background-size: cover;
    background-position: center;
}
</style>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import Datepicker from 'vuejs-datepicker';
import {ko} from 'vuejs-datepicker/dist/locale';
import {getHeader, getAuth, getUser, apiDomain} from '../../config';
import User from '../../job/User';
import VSpinner from 'vue-simple-spinner';
import DaumPost from './DaumPost'
// import DaumPost from "vue-daum-postcode/src/vue-daum-postcode";
// import Language from './Language.vue'
export default {
    // components: { Language },
    props: ['mode', 'recruit_id'],
    components: {
        VSpinner,
        Datepicker,
        DaumPost,
    },
    data: function() {
        return {
            isAuth: false,
            isSubmit: true,
            ko: ko,
            preview: '',
            password: '',
            password_confirm: '',
            showPost: false,
            createEmail: '',
            emailVendor: null,
            selectEdit: false,
            agree: false,
        }
    },
    computed: {
        email() {
            if ( this.mode == 'create' ) {
                return this.createEmail + '@' + this.emailVendor;
            } else {
                return this.$store.state.user.email;
            }
        },
        emailEditable() {
            if ( this.mode == 'create') {
                return true;
            } else {
                return false;
            }
        },
        job_id() { return this.$store.state.job.id; },
        job () { return this.$store.state.job },
        user () { return this.$store.state.user },
        user_info () { return this.$store.state.user_info },
        oversea () { return this.$store.state.oversea },
        pic() {
            if ( this.$store.state.job ) {
                if ( this.preview ) {
                    return {
                        'backgroundImage': 'Base64 ' + this.preview
                    }
                }
                if ( this.$store.state.job.file_path ) {
                    return {
                        'backgroundImage': 'url(/storage/'+ this.$store.state.job.file_path +')',
                    };
                } else {
                return {
                    'backgroundImage': 'none',
                };
            }
            } else {
                return {
                    'backgroundImage': 'none',
                };
            }
        },
        isShow() {
            let step = this.$store.state.step;
            if ( this.mode == 'create' && step == 1) {
                return true;
            } else if ( this.mode == 'edit' && step == 2 ) {
                return true;
            }
            return false;
        },
        isPossibleSave() {
            let step = this.$store.state.step;
            let mode = this.mode;
            if ( mode == 'edit' && this.isAuth ) {
                return true;
            } else if ( mode == 'create' && !this.isAuth ) {
                return true;
            }
        },
        status() {
            return this.$store.state.job.status
        },
        onPostSearch() {
            this.showPost = true;
        },
    },
    mounted: function() {
        this.isAuth = getAuth();
        // console.log(this.isAuth);
        this.$store.state.mode = this.mode;
        if ( this.mode == 'create' ) {
            this.$store.state.step = 1;
        }
        if (this.isAuth) {
            if (this.mode == 'create') {
                Swal.fire({
                    title: '작성한 지원서가 있습니다.',
                    icon: 'info',
                    text: '작성하신 지원서를 불러옵니다.',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/edit';
                });
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
            if ( this.mode == 'edit' ) {
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
        onInputEmail: function(e) {
            this.createEmail = e.target.value;
            this.user.email = this.createEmail + '@' + this.emailVendor;
        },
        onInputVendor: function(e) {
            this.emailVendor = e.target.value;
            this.user.email = this.createEmail + '@' + this.emailVendor;
        },
        onSelectEmail: function(e) {
            console.log(e.target.value);
            if ( e.target.value == 'manual') {
                this.selectEdit = true;
                this.emailVendor = null;
            } else {
                this.selectEdit = false;
                this.emailVendor = e.target.value;
            }
            this.user.email = this.createEmail + '@' + this.emailVendor;
        },
        onClickPost: function(e) {
            this.showPost = true;
            $('body').css('overflow', 'hidden');
            // $(window).scrollTop($(document).height());
        },
        onSearch: function(data) {
            console.log(data);
            this.showPost = false;
            this.job.address_1 = data.address;
            $('body').css('overflow', '');
        },
        picSelect: function (e){
            console.log(e);
            const file = e.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);

            //로드 한 후
            reader.onload = () => {
                console.log(reader.result);
                this.preview = reader.result ;
            };
        },
        getInfo: function() {
            this.isSubmit = true;
            axios.get('/api/work-with-us/recruit/'+ this.recruit_id,{
                'headers': getHeader()
            })
            .then(res => {
                this.isSubmit = false;
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
            if ( this.mode == 'edit' && !this.job.id ) {
                return {
                    result: false,
                    msg: '잘못된 접근입니다',
                };
            }
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
            if ( this.email == '' ) {
                if ( this.mode == 'create' && this.emailVendor == null ) {
                return {
                    result: false,
                    msg: '이메일을 입력해주세요',
                };

            }

            }
            if ( !User.validateEmail (this.email)) {
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
                if ( !this.agree ) {
                    return {
                        result: false,
                        msg: '개인정보 이용 및 수집에 동의해주세요',
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
            if ( this.mode == 'create' ) {
                formData.set('email', this.user.email);
            }
            console.log('JOBID::', this.job_id);
            console.log('RECRUIT ID::', this.recruit_id);
            console.log('RECRUIT ID::', this.$store.state.job.recruit_id);

            if ( typeof this.job_id == 'undefined' || typeof this.job.id == 'undefined' || this.job.id == '') {
                formData._method = 'POST';
                if ( !this.isAuth ) {
                    url = '/api/join';
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
                    this.preview = null;
                    if ( res.data.job ) {
                        this.job.file_path = res.data.job.file_path;
                    } else {
                        User.setAuth(res.data);
                    }

                    Swal.fire({
                        title: '저장되었습니다!',
                        text: res.data.msg,
                        icon: 'success',
                        confirmButtonText: '확인',
                        allowOutsideClick: false
                    }).then(result => {
                        console.log(res.data.type == 'join');
                        if (result.isConfirmed ) {
                            if ( this.mode == 'create' ) {
                                window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/edit'
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
                            if ( !this.isAuth ) {

                            }
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
