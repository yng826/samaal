<template>
    <a href="#" class="but-revise" @click.prevent="openJoin" v-bind:data-recruit-id="recruit_id">지원내역 확인 및 수정</a>
</template>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getUser, clearAuth} from '../../config'
import Swal from 'sweetalert2'
export default {
    props : ['recruit_id'],
    components : {},
    data: function() {
        return {
            isAuth: false,
        }
    },
    mounted: function() {
        this.isAuth = getAuth();
    },
    methods: {
        openJoin: function() {
            // clearAuth();
            Swal.fire({
                title: '알림',
                icon: 'info',
                text: '지원이력 내역으로 이동합니다.',
                confirmButtonText: '확인',
                allowOutsideClick: false
            }).then(result => {
                if (result.isConfirmed) {
                    this.$root.$emit('closePopup');
                    window.location.href = '/kor/work-with-us/job';
                }
            });
            return false;
        }
    }
}
</script>
