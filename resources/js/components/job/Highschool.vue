<template>
    <div class="education-container form-container" v-if="isShow">
        <p class="notice">*필수입력</p>
        <form>
            <div class="form-wrap">
                <h3>학력사항(고등학교)</h3>
                <div class="form-group">
                    <label for="school_name">학교명</label>
                    <input type="text" name="school_name" :class="maxLength(item.school_name, 10)" v-model="item.school_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="school_address">소재지</label>
                    <input type="text" name="school_address" :class="maxLength(item.school_address, 10)" v-model="item.school_address" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="school_major">계열</label>
                    <!-- <input type="text" name="school_major" v-model="item.school_major" placeholder="입력해주세요"> -->
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="school_major" v-model="item.school_major">
                                <option v-for="major in majors" :value="major.value" :key="major.value">{{major.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="graduation">졸업구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="school_graduation" v-model="item.school_graduation">
                                <option v-for="graduation in graduations" :value="graduation.value" :key="graduation.value">{{graduation.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_start">재학기간</label>
                    <div class="input_date-group input-group">
                        <InputMask class="inline-block" name="school_start" mask="9999-99" v-model="item.school_start" format="yyyy-MM-dd" />
                        <span class="from-arrow">~</span>
                        <InputMask class="inline-block" name="school_end" mask="9999-99" v-model="item.school_end" format="yyyy-MM-dd" />
                    </div>
                </div>
            </div>
        </form>
        <div class="button-group" v-if="isOpen">
            <button class="btn btn-success btn-save" @click="saveItems">저장</button>
        </div>
        <VSpinner v-if="isSubmit" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
import VSpinner from 'vue-simple-spinner'
import { FormField } from '../../mixins/FormFields'
import { SendValidation } from '../../mixins/SendValidation'
import InputMask from 'vue-input-mask';
export default {
    props: [],
    mixins: [
        FormField,
        SendValidation
    ],
    components: {
        VSpinner,
        InputMask,
    },
    computed: {
        isOpen() { return this.$store.state.recruit_status == 'open' },
        isShow() {
            let step2 = this.$store.state.step == 2;
            let job_id = this.$store.state.job.id;
            const editMode = this.$store.state.mode == 'edit';
            if ( step2 && job_id && editMode ) {
                return true;
            } else {
                return false;
            }
        },
        item () { return this.$store.state.highschool },
        status() {
            return this.$store.state.job.status
        },
        status() {
            return this.$store.state.job.status
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSubmit: false,
            majors: [
                {value: 'science', name:'이과'},
                {value: 'liberal', name:'문과'},
                {value: 'special', name:'전문계'},
            ],
            // 졸업, 졸업예정, 검정고시
            graduations: [
                {value: 'graduation', name: '졸업'},
                {value: 'prospective', name: '졸업예정'},
                {value: 'qualification', name: '검정고시'},
            ],
        }
    },
    mounted: function() {
        console.log(this.item);
    },
    methods: {
        validation: function() {
            if ( this.item.school_name == '' || this.item.school_name == null ) {
                return {
                    result: false,
                    msg: '학교명을 작성해주세요',
                };
            }
            if ( this.item.school_name.length > 10 ) {
                return {
                    result: false,
                    msg: '학교명은 10자 이내로 작성해주세요.',
                };
            }
            if ( this.item.school_address == '' || this.item.school_address == null ) {
                return {
                    result: false,
                    msg: '소재지를 작성해주세요',
                };
            }
            if ( this.item.school_address.length > 10 ) {
                return {
                    result: false,
                    msg: '소재지는 10자 이내로 작성해주세요.',
                };
            }
            if ( this.item.school_major == '' || this.item.school_major == null ) {
                return {
                    result: false,
                    msg: '계열을 선택해주세요',
                };
            }
            if ( this.item.school_graduation == '' || this.item.school_graduation == null ) {
                return {
                    result: false,
                    msg: '졸업구분을 선택해주세요',
                };
            }
            if ( this.item.school_start == '' || this.item.school_start == null ) {
                return {
                    result: false,
                    msg: '재학기간을 입력해주세요',
                };
            }
            let IsValidDate = Date.parse( this.item.school_start );
            if ( isNaN(IsValidDate) ) {
                return {
                    result: false,
                    msg: '재학기간을 정확히 입력해주세요',
                };
            }
            return {
                result: true,
                msg: '',
            }
        },
        saveItems: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            const validate = this.validation();
            console.log(validate.msg);
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
            console.log(this.$store.state);
            let headers = getHeader();
            let url, method;
            url = '/kor/api/job-detail/highschool/' + this.$store.state.job.id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {highschool: this.item}
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.highschool = res.data;
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
