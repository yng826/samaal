<template>
    <div class="button-groups">
        <p class="mb-20 text-red" v-if="isEdit && step==2 && !isCaution">개별 항목별로 저장하지 않은 정보는 유실될 수 있으니<br>꼭 저장버튼을 눌러주세요</p>
        <button class="btn-caution" v-if="isEdit && step==2 && !isCaution" @click="cautionCheck">확인</button>
        <button v-if="isEdit && step==2 && isCaution" @click="changeStep(3)">자기소개서 {{isOpen ?'작성' : ''}} &gt;&gt;</button>
        <button v-if="isEdit && step==3" @click="changeStep(2)">&lt;&lt; 이력서 {{isOpen ? '수정' : ''}}</button>
        <button v-if="isEdit && step==3 && isOpen" @click="changeStep(4)">제출전 확인 &gt;&gt;</button>
        <button v-if="isEdit && step==4" @click="changeStep(3)">&lt;&lt; 자기소개서 수정</button>
        <button v-if="isEdit && step==4 && isOpen" @click="checkApplicant">제출</button>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import {getAuth, getHeader} from '../../config'
import VSpinner from 'vue-simple-spinner'
import Swal from 'sweetalert2'
export default {
    props: ['mode'],
    components: {
        VSpinner,
    },
    computed: {
        isCreate() {
            return this.mode == 'create'
        },
        isOpen() {
            return this.$store.state.recruit_status
        },
        isEdit() {
            return this.mode == 'edit' && getAuth()
        },
        isCaution(){
            return this.$store.state.caution;
        },
        step() {
            return this.$store.state.step
        },
        id() {
            return this.$store.state.job.id
        },
        photo() {
            return this.$store.state.job.file_path
        },
        highschool() {
            return this.$store.state.highschool
        },
        education() {
            return this.$store.state.education[0]
        },
        status() {
            return this.$store.state.job.status
        },
        isSubmitReady() {
            let userInfo = this.$store.state.user_info.id;
            let career = this.$store.state.career.length;
            let coverLetter = this.$store.state.job.is_cover_letter;
            if ( !userInfo || !career || !coverLetter ) {
                return false;
            } else {
                return true;
            }
        },
        isAgree() {
            return this.$store.state.agree;
        }
    },
    data: function() {
        return {
            isSubmit: false,
        }
    },
    mounted: function() {
        console.log(this.mode);
        // this.isAuth = getAuth();
    },
    methods: {
        cautionCheck: function() {
            this.$store.state.caution = true
        },
        changeStep: function(step) {
            if ( step == 3 && this.step == 2) {
                if ( !this.photo ) {
                    Swal.fire({
                        title: '사진을 등록해주세요!',
                        icon: 'error',
                        confirmButtonText: '확인',
                    });
                } else if ( !this.highschool.id ) {
                    Swal.fire({
                        title: '학력사항을 입력해주세요!',
                        icon: 'error',
                        confirmButtonText: '확인',
                    });
                } else {
                    this.$store.state.step = step;
                }
                // console.log( 'check photo', this.photo );
            } else if ( step == 4 ) {
                if ( this.$store.state.isChanged ) {
                    Swal.fire({
                        // title: '저장하지 않았습니다.',
                        title: '저장하지 않았습니다',
                        text: '저장하지 않고 진행하시겠습니까?',
                        icon: 'error',
                        showDenyButton: true,
                        confirmButtonText: '확인',
                        denyButtonText: `아니오`,
                    }).then(result => {
                        if (result.isConfirmed) {
                            this.$store.state.step = step;
                        }
                        if (result.isDenied) {
                            this.isSubmit = false;
                            return false;
                        }
                    });
                } else {
                    this.$store.state.step = step;
                }
            } else {
                this.$store.state.step = step;
            }
        },
        checkApplicant: function() {
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
            if ( !this.isSubmitReady ) {
                Swal.fire({
                    title: '작성을 마저 해주십시오',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            if ( !this.isAgree ) {
                Swal.fire({
                    title: '정보이용에 동의 해주십시오',
                    icon: 'error',
                    confirmButtonText: '확인',
                    // allowOutsideClick: false,
                });
                return false;
            }
            Swal.fire({
                title: '제출하시겠습니까?',
                icon: 'success',
                showDenyButton: true,
                confirmButtonText: '확인',
                denyButtonText: `아니오`,
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.isSubmit = true;
                    this.sendApplicant();
                } else if (result.isDenied) {
                    this.isSubmit = false;
                }
            });
        },
        sendApplicant: function() {
            let headers = getHeader();
            let url, method;
            url = '/kor/api/work-with-us/job/submit/' + this.id + '?_method=PUT';
            method = 'post';
            axios({
                method: method,
                url: url,
                headers: headers,
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '제출되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/kor/work-with-us/job/';
                    }
                })
            })
            .catch(err => {
                this.isSubmit = false;
                Swal.fire({
                    title: '제출에 실패했습니다!',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
