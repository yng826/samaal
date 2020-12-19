<template>
    <div class="job-container form-container" v-if="this.$store.state.step == 4">
        <form>
            <div class="form-wrap">
                <h3>지원서제출</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>입력항목</th>
                            <th>인적사항입력</th>
                            <th>이력서작성</th>
                            <th>자기소개서 작성</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>작성여부</td>
                            <td>{{isUserinfo}}</td>
                            <td>{{isApplicant}}</td>
                            <td>{{isSelfIntroduction}}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="review">
                    <strong>현재까지 입력한 내용은 모두 임시저장 되어있으며, 최종 제출 시 수정할 수 없습니다.</strong>
                    지원서 상의 모든 기재 및 제출 사항은 사실과 다름이 없음을 증명합니다.<br/>
                    차후 제출 내용이 허위로 판명되어 합격 및 입사가 취소되어도 이의를 제기하지 않을 것을 맹세합니다.
                </p>
                <div>
                    <input type="checkbox" name="agree" id="apply_agree">
                    <label for="">위 내용에 동의하고 지원서를 제출합니다.</label>
                </div>
            </div>
        </form>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
import VSpinner from 'vue-simple-spinner'
export default {
    props: [],
    components: {
        VSpinner,
        Datepicker,
    },
    computed: {
        job_id() { return this.$store.state.job.id; },
        item () {
            return this.$store.state.job;
        },
        isUserinfo() {
            return this.$store.state.user_info.id ? '작성완료': '미작성';
        },
        isApplicant() {
            return this.$store.state.career.length ? '작성완료': '미작성';
        },
        isSelfIntroduction() {
            let txt;
            if (this.item.is_cover_letter) {
                txt = this.item.is_cover_letter ? '작성완료': '미작성';
            } else {
                txt = '미작성';
            }
            return txt;
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSubmit: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        saveItem: function() {
            if ( this.isSubmit ) {
                return false;
            }
            this.isSubmit = true;

            let headers = getHeader();
            let url, method;
            url = '/api/work-with-us/job/' + this.job_id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {
                    cover_letter: this.$store.state.job.cover_letter
                }
            })
            .then(res => {
                this.isSubmit = false;
                console.log(this.$store.state.job);
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인'
                });
            })
            .catch(err => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장에 실패했습니다!',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                console.error(err);
            })
        }
    }
}
</script>
