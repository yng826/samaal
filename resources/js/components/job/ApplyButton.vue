<template>
    <a href="#" class="but-apply" @click.prevent="openJoin">지원하기</a>
</template>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getJob, clearAuth} from '../../config'
import Swal from 'sweetalert2'
export default {
    props : ['recruit_id', 'recruit_status'],
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
            if ( this.recruit_status != 'open') {
                let text = '';
                switch (this.recruit_status) {
                    case 'standby':
                        text = '아직 채용이 시작되지 않았습니다';
                        break;
                    case 'closed':
                        text = '채용이 마감되었습니다';
                        break;

                    default:
                        text = '아직 채용이 시작되지 않았습니다';
                        break;
                }
                Swal.fire({
                    title: '알림',
                    icon: 'error',
                    text: text
                });
                return false;
            }
            clearAuth();
            if (this.isAuth) {
                // this.$root.$emit('openPopup', 'login');
                Swal.fire({
                    title: '알림',
                    icon: 'success',
                    text: '지원서 작성으로 이동합니다',
                    confirmButtonText: '확인',
                    allowOutsideClick: false
                }).then(result => {
                    if (result.isConfirmed) {
                        // this.$root.$emit('closePopup');
                        // let jobList = getJob();
                        // if (jobList.indexOf(this.recruit_id) > -1) {
                        //     Swal.fire('기존 작성중 이력서');
                        // }
                        window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/create';
                    }
                });
            } else {
                window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/create';
            }
        }
    }
}
</script>
