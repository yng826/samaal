<template>
    <div class="daum-post-box" @click="onClick">
        <a href="#" class="btn-close" @click.prevent="">닫기</a>
        <div ref="daumPostBox" v-bind:style="styles">

        </div>
    </div>
</template>
<style>
</style>
<script>
export default {
    data: function() {
        return {
            q: {
                type: String,
                default: '',
            },
            styleHeight: 0,
        }
    },
    mounted: function(){
        let daumScript = document.createElement('script')
        let self = this;
        daumScript.setAttribute('src', 'https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js');
        document.head.appendChild(daumScript);
        // console.log(daumScript);
        daumScript.onload = function() {
            new daum.Postcode({
                width: '100%',
                height: '100%',
                animation: self.animation,
                autoMapping: !self.noAutoMapping,
                shorthand: !self.noShorthand,
                pleaseReadGuide: self.pleaseReadGuide,
                pleaseReadGuideTimer: self.pleaseReadGuideTimer,
                maxSuggestItems: self.maxSuggestItems,
                showMoreHName: self.showMoreHName,
                hideMapBtn: self.hideMapBtn,
                hideEngBtn: self.hideEngBtn,
                alwaysShowEngAddr: self.alwaysShowEngAddr,
                zonecodeOnly: self.zonecodeOnly,
                theme: self.theme,
                submitMode: !self.noSubmitMode,
                onsearch: (data) => {
                    self.$emit('search', data)
                },
                oncomplete: (data) => {
                    self.$emit('complete', data)
                },
                onresize: (size) => {
                    self.styleHeight = `${size.height}px`
                },
            }).embed(self.$refs.daumPostBox, {
                q: self.q,
                autoClose: false,
            });
        }
    },
    computed: {
        styles() {
            const styles = {}
            // styles.marginTop = '15%';
            styles.position = 'relative';
            styles.minHeight = '300px';
            styles.height = this.styleHeight
            return styles
        },
    },
    methods: {
        onClick() {
            this.$root.$emit('closePopup');
        }
    },
    animation: {
    type: Boolean,
    default: false,
    },
    noAutoMapping: {
    type: Boolean,
    default: false,
    },
    noShorthand: {
    type: Boolean,
    default: false,
    },
    noSubmitMode: {
    type: Boolean,
    default: false,
    },
    pleaseReadGuide: {
    type: Number,
    default: 0,
    },
    pleaseReadGuideTimer: {
    type: Number,
    default: 1.5,
    },
    maxSuggestItems: {
    type: Number,
    default: 10,
    },
    showMoreHName: {
    type: Boolean,
    default: false,
    },
    hideMapBtn: {
    type: Boolean,
    default: false,
    },
    hideEngBtn: {
    type: Boolean,
    default: false,
    },
    alwaysShowEngAddr: {
    type: Boolean,
    default: false,
    },
    zonecodeOnly: {
    type: Boolean,
    default: false,
    },
    theme: {
    type: Object,
    default: () => ({}),
    },
}
</script>
