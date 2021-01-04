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
                    <label for="pic" class="input-file-trigger" v-if="isOpen">
                        이미지 업로드
                        <input type="file" name="pic" id="pic" @change="picSelect">
                    </label>
                </div>
            </div>
            <div class="form-wrap form-left">
                <h3>인적사항</h3>
                <div class="form-group">
                    <label for="">성명(한글)</label>
                    <input type="text" name="name" v-model="user.name" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">성명(영문)</label>
                    <input type="text" name="name_en" v-model="user_info.name_en" placeholder="입력해주세요.">
                </div>
                <div class="form-group">
                    <label for="">생년월일</label>
                    <div class="input_date-group input-group" placeholder="선택해주세요.">
                        <Datepicker class="inline-block" name="birth_day" :language="ko" v-model="user_info.birth_day" format="yyyy-MM-dd"></Datepicker>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">휴대폰번호</label>
                    <InputMask name="phone_decrypt" mask="999 9999 9999" v-model="job.phone_decrypt" placeholder="입력해주세요." />
                    <!-- <input type="text" name="phone_decrypt" v-model="job.phone_decrypt" placeholder="입력해주세요."> -->
                </div>
                <div class="form-group">
                    <label for="">E-MAIL</label>
                    <div class="input-group">
                        <input type="text" name="email" :disabled="job.id || isAuth" :value="mode == 'edit' ? this.email : this.createEmail" @input="onInputEmail" placeholder="입력해주세요.">
                        <span v-if="emailEditable">@</span>
                        <input type="text" name="email_vendor_input" :value="this.emailVendor" @input="onInputVendor" :readonly="!selectEdit" v-if="emailEditable" placeholder="입력 또는 선택해주세요.">
                        <div class="select-container" v-if="emailEditable">
                            <select name="email_vendor_select" id="" @change="onSelectEmail">
                                <option value="">이메일</option>
                                <option value="naver.com">네이버</option>
                                <option value="gmail.com">구글</option>
                                <option value="hanmail.net">한메일</option>
                                <option value="daum.net">다음</option>
                                <option value="nate.com">네이트</option>
                                <option value="hotmail.com">핫메일</option>
                                <option value="manual">직접입력</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" name="password" id="password" v-model="password" ref="password" placeholder="8자이상 영문/숫자/기호 조합">
                </div>
                <div class="form-group">
                    <label for="password_confirm">비밀번호재입력</label>
                    <input type="password" name="password_confirm" id="password_confirm" v-model="password_confirm" ref="password_confirm" placeholder="8자이상 영문/숫자/기호 조합">
                </div>
                <div class="form-group">
                    <label for="">현거주지</label>
                    <div class="input-group">
                        <input type="text" name="address_1" v-model="job.address_1" placeholder="검색해주세요." @click="onClickPost" readonly>
                        <DaumPost style="" @complete="onSearch" v-show="showPost" />
                        <input type="text" name="address_2" v-model="job.address_2" placeholder="입력해주세요.">
                    </div>
                </div>
            </div>
            <div class="form-wrap information-box" v-if="mode=='create'">
                <div class="privacy-box">
                    <p>개인정보보호를 위해서 개인정보 수집동의서에 대한 안내를 읽고 동의해 주시기 바랍니다.</p>
                    <h4>[1. 수집하는 개인정보의 항목]</h4>
                    <p>삼아는 입사지원, 합격자 통보의 서비스를 제공하기 위해 아래와 같은 개인정보를 수집하고 있습니다.</p>
                    <ul>
                        <li>• 필수항목 : 성명(한글, 영문), 생년월일, 휴대폰번호, 이메일, 주소, 사진</li>
                        <li>• 선택항목 : 학력, 경력, 병역, PC활용능력, 외국어 능력, 수상경력, 자격/면허, 취미/특기, 교내활동, 자기소개서</li>
                    </ul>
                    <p>※ 선택항목은 입력 없이 지원가능 합니다.</p>
                    <h4>[2. 개인정보 수집 목적]</h4>
                    <ul>
                        <li>• 필수항목 : 지원자 본인 식별, 채용결과 안내, 지원에 관한 법률 등 관련 사항의 채용상 참고</li>
                        <li>• 지원자 본인 식별</li>
                        <li>• 합격자 통보 및 안내사항 전달</li>
                        <li>• 서류/면접 전형 등의 근거자료</li>
                    </ul>
                    <h4>[3. 개인정보 보유기간]</h4>
                    <ul>
                        <li>• 해당 공고의 인재 채용 기간까지</li>
                        <li>• 파기 요청 시 즉시 파기 됩니다.</li>
                        <li>• 즉시 파기 방법 : 채용 담당자에게 문의하여 즉시 파기 ( 웹사이트 내 ‘문의하기’ 버튼을 통해 요청 )</li>
                        <li>• 회사는 이용자들의 개인 정보를 이용자가 지원한 공고의 채용 마감 직후에 해당 정보를 지체 없이 파기합니다.</li>
                    </ul>
                    <h4>[4. 개인정보 수집 동의 거부의 권리 및 동의 거부에 따른 불이익]</h4>
                    <ul>
                        <li>• 지원자는 본 안내에 따른 개인정보의 수집, 이용 등과 관련한 위 사항에 대하여 원하지 않는 경우, 동의를 거부할 수 있습니다. 다만, 본 안내에 따른 개인정보의 수집, 이용 등과 관련한 위 사항은 회사의 공정한 채용전형에 있어 필수적인 항목으로 이에 대하여 동의하지 않는 경우 채용 페이지의 이용 및 입사지원이 제한될 수 있습니다.</li>
                    </ul>
                    <h4>[5. 개인정보 안정성 확보 조치]</h4>
                    <p>삼아는 개인정보보호법 제29조에 따라 개인정보의 안전성 확보를 위해 다음과 같은 기술적, 관리적및 물리적 조치를 하고 있습니다.</p>
                    <ul>
                        <li>• 이용자의 개인정보와 비밀번호는 암호화되어 저장 및 관리됩니다.</li>
                        <li>• 해킹이나 컴퓨터 바이러스 등에 의한 개인정보 유출 및 훼손을 막기 위하여 보안프로그램을 설치하고 주기적인 갱신·점검을 통해 감시 및 차단을 하고 있습니다.</li>
                        <li>• 개인정보를 처리하는 DBMS 대한 접근권한을 부여하여 접근을 통제하고 있습니다. </li>
                    </ul>
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
            <div class="button-group" v-if="isOpen">
                <button v-if="isPossibleSave">저장</button>
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
import { FormField } from '../../mixins/FormFields'
import { SendValidation } from '../../mixins/SendValidation'
import User from '../../job/User';
import VSpinner from 'vue-simple-spinner';
import DaumPost from './DaumPost'
import InputMask from 'vue-input-mask';
// import DaumPost from "vue-daum-postcode/src/vue-daum-postcode";
// import Language from './Language.vue'
export default {
    // components: { Language },
    props: ['mode', 'recruit_id'],
    mixins: [
        FormField,
        SendValidation
    ],
    components: {
        VSpinner,
        Datepicker,
        DaumPost,
        InputMask,
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
        isOpen() { return this.$store.state.recruit_status == 'open' || this.mode =='create' },
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
        this.$root.$on('closePopup', (args) => {
            console.log(args);
            this.showPost = false;
            $('body').css('overflow', '');
        })
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
                    console.log(res.data.recruit.recruit_status);
                    console.log(res.data);
                    this.$store.state.recruit_status = res.data.recruit.recruit_status;
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
                    this.$store.state.school_activities = res.data.school_activities.length ? res.data.school_activities : this.$store.getters.getDefaultSchoolActivities;
                    this.$store.state.hobby_specialty = res.data.hobby_specialty ? res.data.hobby_specialty : this.$store.getters.getDefaultHobbySpecialty;
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
            if ( !this.isSubmitable ) {
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
