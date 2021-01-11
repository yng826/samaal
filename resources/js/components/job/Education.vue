<template>
    <div class="education-container form-container" v-if="isShow">
        <p class="notice">최근 졸업일자 순으로 작성해주시기 바랍니다</p>
        <form v-for="(item, id) in items" :key="id" >
            <div class="form-wrap">
                <h3>학력사항</h3>
                <button class="float-right btn btn-danger" @click.prevent="removeItem(item.id, id)" v-if="isOpen">삭제</button>
                <div class="form-group">
                    <label for="edu_type">학교구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="edu_type" v-model="item.edu_type">
                                <option v-for="type in types" :value="type.value" :key="type.value">{{type.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_name">학교명</label>
                    <input type="text" name="school_name" :class="maxLength(item.school_name, 10)" v-model="item.school_name" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="edu_address">소재지</label>
                    <input type="text" name="edu_address" :class="maxLength(item.edu_address, 10)" v-model="item.edu_address" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="edu_location">캠퍼스</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="edu_location" v-model="item.edu_location">
                                <option v-for="location in locations" :value="location.value" :key="location.value">{{location.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edu_major">전공</label>
                    <input type="text" name="edu_major" v-model="item.edu_major" placeholder="입력해주세요">
                </div>
                <div class="form-group">
                    <label for="edu_grade">성적</label>
                    <div class="input-group">
                        <input type="text" name="edu_grade" v-model="item.edu_grade" placeholder="총 평점 입력 (예) 4.3">
                        <input type="text" name="edu_grade_full" v-model="item.edu_grade_full" placeholder="만점 입력 (예) 4.5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edu_entrance">입학구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="edu_entrance" v-model="item.edu_entrance">
                                <option v-for="entrance in entrances" :value="entrance.value" :key="entrance.value">{{entrance.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="graduation">졸업구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="graduation" v-model="item.edu_graduation">
                                <option v-for="graduation in graduations" :value="graduation.value" :key="graduation.value">{{graduation.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="time">주야구분</label>
                    <div class="input-group">
                        <div class="select-container" >
                            <select type="text" name="time" v-model="item.edu_time">
                                <option v-for="time in times" :value="time.value" :key="time.value">{{time.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edu_start">재학기간</label>
                    <div class="input_date-group input-group">
                        <InputMask class="inline-block" name="edu_start" mask="9999-99" v-model="item.edu_start" format="yyyy-MM-dd" />
                        <span class="from-arrow">~</span>
                        <InputMask class="inline-block" name="edu_end" mask="9999-99" v-model="item.edu_end" format="yyyy-MM-dd" />
                    </div>
                </div>
                <div>{{ item.status_ko }}</div>
            </div>
        </form>
        <div class="button-group" v-if="isOpen">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn btn-success btn-save" @click="saveItems">저장</button>
        </div>
        <VSpinner v-if="isSubmit || !this.items" class="v-spinner"></VSpinner>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
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
        Datepicker,
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
        items () { return this.$store.state.education },
        status() {
            return this.$store.state.job.status
        },
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
            isSubmit: false,
            locations: [
                {value: 'major', name:'본교'},
                {value: 'minor', name:'분교'},
            ],
            entrances: [
                {value: 'entrance', name:'입학'},
                {value: 'transfer', name:'편입'},
            ],
            graduations: [
                {value: 'graduation', name: '졸업'},
                {value: 'prospective', name: '졸업예정'},
                {value: 'in_school', name: '재학'},
                {value: 'complete', name: '수료'},
            ],
            times: [
                {value: 'day', name: '주간'},
                {value: 'night', name: '야간'},
            ],
            types: [
                {value: 'college', name: '전문대학'},
                {value: 'university', name: '대학교'},
                {value: 'graduate', name: '대학원'},
            ],
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
        // if ( this.isAuth ) {
        // } else {
        //     console.log('no auth');
        // }
    },
    methods: {
        addItem: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.items.length >=3 ) {
                Swal.fire({
                    title: '추가할 수 없습니다.',
                    icon: 'error',
                    confirmButtonText: '확인',
                });
                return false;
            }
            this.items.push({
                id: "",
                edu_address: "",
                edu_entrance: '',
                edu_grade: '',
                edu_grade_full: '',
                edu_graduation: '',
                edu_location: '',
                edu_major: '',
                edu_start: '',
                edu_end: '',
                edu_time: '',
                edu_type: '',
                graduation: '',
                school_name: '',
            });
        },
        removeItem: function(id, index) {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.items.length == 1 ) {
                Swal.fire({
                    title: '삭제할 수 없습니다',
                    icon: 'error',
                    confirmButtonText: '확인'
                });
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            Swal.fire({
                title: '삭제하시겠습니까?',
                showDenyButton: true,
                allowOutsideClick: false,
                confirmButtonText: `네`,
                denyButtonText: `아니오`,
                allowOutsideClick: false
                }).then((result) => {
                if (result.isConfirmed) {
                    this.isSubmit = true;
                    if ( id ) {
                        let headers = getHeader();
                        let url, method;
                        url = '/api/job-detail/education/' + id;
                        method = 'delete';
                        axios({
                            method: method,
                            url: url,
                            headers: headers,
                            data: {education: this.$store.state.education}
                        })
                        .then(res => {
                            this.isSubmit = false;
                            Swal.fire({
                                title: '삭제되었습니다!',
                                icon: 'success',
                                confirmButtonText: '확인'
                            });
                        })
                        .catch(err => {
                            this.isSubmit = false;
                            Swal.fire({
                                title: '삭제에 실패했습니다!',
                                icon: 'error',
                                confirmButtonText: '확인'
                            });
                            console.error(err);
                        })
                    } else {
                        this.isSubmit = false;
                        Swal.fire({
                            title: '삭제되었습니다!',
                            icon: 'success',
                            confirmButtonText: '확인'
                        });

                    }
                    this.items.splice(index, 1);
                } else if (result.isDenied) {
                    this.isSubmit = false;
                }
            });

        },
        validation: function() {
            let temp = null;
            let valid = this.items.some(element => {
                if ( element.school_name == '' || element.school_name == undefined) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '학교명을 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else if ( element.school_name.length > 10) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '학교명은 10자 이내로 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else if ( element.edu_address == '' || element.edu_address == undefined) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '소재지를 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else if ( element.edu_address != undefined && element.edu_address.length > 10) {
                    Swal.fire({
                        title: '저장에 실패했습니다!',
                        text: '소재지는 10자 이내로 작성해주세요',
                        icon: 'error',
                        confirmButtonText: '확인'
                    });
                    temp = true;
                    return false;
                } else {
                    if ( !temp ) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });

            console.log(valid);
        },
        saveItems: function() {
            if ( !this.isSubmitable ) {
                return false;
            }
            if ( this.isSubmit ) {
                return false;
            }
            // const validate = this.validation();
            // if ( !validate ) {
            //     return false;
            // }
            this.isSubmit = true;
            console.log(this.$store.state);
            let headers = getHeader();
            let url, method;
            url = '/api/job-detail/education/' + this.$store.state.job.id;
            method = 'put';
            axios({
                method: method,
                url: url,
                headers: headers,
                data: {education: this.$store.state.education}
            })
            .then(res => {
                this.isSubmit = false;
                Swal.fire({
                    title: '저장되었습니다!',
                    icon: 'success',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    this.$store.state.education = res.data;
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
