<template>
    <div class="career-container">
        <form v-for="(item, id) in items" :key="id" >
            <h3>경력사항 <button @click.prevent="removeItem(id)">삭제</button></h3>
            <div class="form-group">
                <label for="career_start">근무기간</label>
                <Datepicker class="inline-block" name="career_start" :language="ko" v-model="item.career_start" format="yyyy-MM-dd"></Datepicker>
                <Datepicker class="inline-block" name="career_end" :language="ko" v-model="item.career_end" format="yyyy-MM-dd"></Datepicker>
            </div>
            <div class="form-group">
                <label for="career_name">직장명</label>
                <input type="text" name="career_name" v-model="item.career_name">
            </div>
            <div class="form-group">
                <label for="career_position">직위/근무부서</label>
                <input type="text" name="career_position" v-model="item.career_position">
            </div>
            <div class="form-group">
                <label for="career_role">담당업무</label>
                <input type="text" name="career_role" v-model="item.career_role">
            </div>
        </form>
        <div class="button-group">
            <button class="btn-add" @click="addItem">추가</button>
            <button class="btn-save" @click="saveItems">저장</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'
import Datepicker from 'vuejs-datepicker'
import {ko} from 'vuejs-datepicker/dist/locale'
import {getHeader, getAuth, getUser} from '../../config'
export default {
    props: ['action'],
    components: {
        Datepicker,
    },
    computed: {
        items () {
        return this.$store.state.career
        }
    },
    data: function() {
        return {
            ko: ko,
            isAuth: false,
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        addItem: function() {
            this.items.push({
                career_start: "",
                career_end: "",
                career_name: "",
                career_position: "",
                career_role: "",
            });
        },
        removeItem: function(index) {
            this.items.splice(index, 1);
            Swal.fire({
                title: '임시삭제되었습니다!',
                text: '저장해야 완전삭제됩니다.',
                icon: 'warning',
                confirmButtonText: '확인'
            });
        },
        saveItems: function() {
            // this.$store.commit('updateCareer', items);
            console.log(this.$store.state);
            Swal.fire({
                title: '저장되었습니다!',
                // text: '계속 이용하시기 바랍니다.',
                icon: 'success',
                confirmButtonText: '확인'
            });
        }
    }
}
</script>
