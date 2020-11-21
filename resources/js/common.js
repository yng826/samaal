const common = () => {

    const header_lang = () => {
        const $lang = $('.header .language__kor');
        const $lang_en = $('.header .language__eng');

        $lang.on("click",function(){
            // $lang_en.addClass('on');

        });

        console.log(1);
    }

    const common_init = () => {
        header_lang();
    };

    common_init();
}

export default common;
