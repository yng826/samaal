const workWithUs = () => {

    // 탭 클릭시
    const workTab = () => {
        $(".work-faq .tab-item").on("click",function(){
            $(".work-faq .tab-item").removeClass('on');
            $(".work-faq__section--list").removeClass('on');
            $(this).addClass('on');
            $("."+$(this).data('tab')).addClass('on');
        })
    };

    // 질문 클릭시
    const workQuestion = () => {
        $(".work-faq__section--list__item").on("click",function(){
            $(this)
                .toggleClass("on")
                .siblings()
                .removeClass("on");
        })
    };

    const work_init = () => {
        workQuestion();
        workTab();
    };

    work_init();
}

export default workWithUs;
