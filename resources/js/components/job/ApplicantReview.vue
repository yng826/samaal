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
                            <td v-html="isUserinfo"></td>
                            <td v-html="isApplicant"></td>
                            <td v-html="isSelfIntroduction"></td>
                        </tr>
                    </tbody>
                </table>
                <p class="review">
                    <strong>현재까지 입력한 내용은 모두 임시저장 되어있으며,<br/>최종 제출 시 수정할 수 없습니다.</strong>
                </p>
                <p class="review">
                    지원서 상의 모든 기재 및 제출 사항은<br/>사실과 다름이 없음을 증명합니다.
                </p>
                <p class="review">
                    차후 제출 내용이 허위로 판명되어 합격 및 입사가 취소되어도<br/>이의를 제기하지 않을 것을 맹세합니다.
                </p>
                <div class="agree">
                    <input type="checkbox" name="agree" id="apply_agree" class="information-box__check" v-model="checked" @change="changeAgree">
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
            return this.$store.state.user_info.id ? '작성완료': '<span class="danger">미작성</span>';
        },
        isApplicant() {
            return this.$store.state.career.length ? '작성완료': '<span class="danger">미작성</span>';
        },
        isSelfIntroduction() {
            let txt;
            if (this.item.is_cover_letter) {
                txt = this.item.is_cover_letter ? '작성완료': '<span class="danger">미작성</span>';
            } else {
                txt = '<span class="danger">미작성</span>';
            }
            return txt;
        },
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSubmit: false,
            checked: this.$store.state.agree
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        changeAgree: function() {
            this.$store.state.agree = !this.$store.state.agree;
        }
    }
}
</script>
