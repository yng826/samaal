<template>
    <a href="#" class="but-revise" @click.prevent="openJoin" v-bind:data-recruit-id="recruit_id">지원내역 확인 및 수정</a>
</template>
<script>
import User from '../../job/User'
import {getHeader, getAuth, getUser} from '../../config'
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
            if (this.isAuth) {
                this.isAuth = getAuth();
                axios.get('/api/work-with-us/job/search/' + this.recruit_id,{
                    'headers': getHeader(),
                    'recruit_id': this.recruit_id,
                }).then(res => {
                    console.log(res);
                    if (res.data.id) {
                        Swal.fire({
                            title: '저장된 내역이 있습니다',
                            icon: 'success',
                            text: '저장된 이력서로 이동합니다.',
                            confirmButtonText: '확인',
                            allowOutsideClick: false
                        }).then(result => {
                            if (result.isConfirmed) {
                                this.$root.$emit('closePopup');
                                console.log("// window.location.href = '/work-with-us/job/'" + res.data.id);
                                window.location.href = '/work-with-us/job/' + res.data.id
                            }
                        });
                    } else {
                        Swal.fire({
                            title: '저장된 내역이 없습니다',
                            icon: 'error',
                            text: '이력서 작성으로 이동합니다.',
                            confirmButtonText: '확인',
                            allowOutsideClick: false
                        }).then(result => {
                            if (result.isConfirmed) {
                                this.$root.$emit('closePopup');
                                window.location.href = '/work-with-us/recruit/' + this.recruit_id + '/create';
                            }
                        });
                    }
                });
                // this.$root.$emit('openPopup', 'login');
            } else {
                this.$root.$emit('openPopup', 'login');
            }
        }
    }
}
</script>
