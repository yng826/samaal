<template>
    <div class="button-groups">
        <button v-if="step==2" @click="changeStep(3)">자기소개서 작성</button>
        <button v-if="step==3" @click="changeStep(2)">이력서 작성</button>
        <button v-if="step==3" @click="changeStep(4)">제출전 확인</button>
        <button v-if="step==4" @click="changeStep(3)">제출</button>
    </div>
</template>
<script>
export default {
    props: [],
    components: {
    },
    computed: {
        step() {
            return this.$store.state.step
        }
    },
    data: function() {
        return {
        }
    },
    mounted: function() {
        // this.isAuth = getAuth();
    },
    methods: {
        changeStep: function(step) {
            this.$store.state.step = step;
        }
    }
}
</script>
