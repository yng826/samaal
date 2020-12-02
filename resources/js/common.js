const common = () => {

    const header_lang = () => {
        const $lang = $('.header .language__kor');
        const $lang_en = $('.header .language__eng');

        $lang.on("click",function(){
            $lang_en.toggleClass('on');
            $lang.toggleClass('on');

        });

    }

    const header_nav = () => {
        // header menu mouseover 했을 경우
         $(".header__nav--item").mouseover(function(){
			$(this).addClass("on");
				if(
					$(this).hasClass("on")
				)
			$(".header__nav .header__nav--item").not(this).removeClass("on");
		});

		$(".header__nav--item").mouseout(function(){
			if($(this).hasClass("on")){
				$(this).removeClass("on")
			};
        });

        // 태블릿 사이즈 이하 header nav
        $(".header__m-nav").on("click",function(){
            if($(this).hasClass("on")){
                $(this).removeClass("on");
                $("body").removeClass("hidden");
                $(".header__m-nav--gnb").removeClass("on");

            } else{
                $(this).addClass("on");
                $("body").addClass("hidden");
                $(".header__m-nav--gnb").addClass("on");
            }
        })

        $(".header__m-nav--gnb__item").on("click",function(){
            $(this)
                .toggleClass("on")
                .siblings()
                .removeClass("on");
        })

    }

    const common_init = () => {
        header_lang();
        header_nav();
    };

    common_init();
}

export default common;
