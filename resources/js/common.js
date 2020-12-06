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
         $(".header__nav--item").on('mouseover', function(){
			$(this).addClass("on");
				if(
					$(this).hasClass("on")
				)
			$(".header__nav .header__nav--item").not(this).removeClass("on");
		});

		$(".header__nav--item").on('mouseout', function(){
			if($(this).hasClass("on")){
				$(this).removeClass("on")
			};
        });

        // 모바일 이하 header nav
        const mobileGnb = $(".header__m-nav--gnb");
        $(".header__m-nav").on("click",function(){
            $(".gnb-mask").show();
            mobileGnb.addClass("on");
        })

        $(".header__m-nav--gnb .close-btn").on("click",function(){
            mobileGnb.removeClass("on");
            $(".gnb-mask").hide();
        });

        $(".header__m-nav--gnb__item").on("click",function(){
            $(this)
                .toggleClass("on")
                .siblings()
                .removeClass("on");
        })

    }

    const footer_top = () => {
        $(".footer__m-top").click(function(){
            $('html, body').animate({
                scrollTop : 0
            }, 400);
            return false;
        });
    }

    const question_pop = () => {
        $('.question-btn').on('click', function (e) {
            e.preventDefault();
            alert();
        });
    }

    const common_init = () => {
        header_lang();
        header_nav();
        footer_top();
        question_pop();
    };

    common_init();
}

export default common;
