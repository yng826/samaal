<template>
    <div class="daum-post-box" @click="onClick">
        <div ref="daumPostBox" v-bind:style="styles">

        </div>
    </div>
</template>
<style>
.daum-post-box {
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    left: 0;
    top: 0;
    padding: 20vw 10vw;
    box-sizing: border-box;
    z-index: 9;
        overflow: scroll;
}
</style>
<script>
export default {
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
            console.log(self);
            console.log(self.$refs);
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
            styles.marginTop = '20%';
            styles.position = 'relative';
            styles.height = this.styleHeight
            return styles
        },
    },
    methods: {
        onClick() {
            console.log('click');
        }
    }
}
</script>
