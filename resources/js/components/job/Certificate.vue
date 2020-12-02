<template>
    <div class="certificate-container">
        <form v-for="(item, id) in items" :key="id" >
            <h3>자격면허 <button @click.prevent="removeItem(item.id, id)">삭제</button></h3>
            <div class="form-group">
                <label for="certificate_date">근무기간</label>
                <Datepicker class="inline-block" name="certificate_date" :language="ko" v-model="item.certificate_date" format="yyyy-MM-dd"></Datepicker>
            </div>
            <div class="form-group">
                <label for="certificate_name">자격증명</label>
                <input type="text" name="certificate_name" v-model="item.certificate_name">
            </div>
            <div class="form-group">
                <label for="certificate_issuer">발행처</label>
                <input type="text" name="certificate_issuer" v-model="item.certificate_issuer">
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
        return this.$store.state.certificate
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
                id: "",
                certificate_name: "",
                certificate_issuer: "",
                certificate_date: "",
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
