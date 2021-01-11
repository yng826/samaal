const common = () => {

    const header_lang = () => {
        const $lang = $('.header .language__kor');
        const $lang_en = $('.header .language__eng');

        $lang.on("click",function(){
            $lang_en.toggleClass('on');
            $lang.toggleClass('on');
        });
    }

    const header_search = () => {
        $(".header .btn-search").on('click', function(){
            $(".header .header-search").toggleClass("on");
        });

        $(".header-search__box--close").on('click', function(){
            $(".header .header-search").removeClass("on");
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

        $('.menu__title > a').on('click', function(e) {
            e.preventDefault();
        })

        $(".header__m-nav--gnb__item").on("click",function(e){
            if ( $(this).hasClass('on')) {
                if ( $(e.target).prop('tagName') == 'A' ) {
                    setTimeout( function() {
                        $(".header__m-nav--gnb .close-btn").trigger('click');
                    }, 200);
                }
            }
            $(this)
                .toggleClass("on")
                .siblings()
                .removeClass("on");
        })

    }

    const TopButton = () => {
        $(window).on('scroll',function(){
            // top button 생김
            if ($(this).scrollTop()) {
                $(".top-btn").fadeIn();
            } else {
                $(".top-btn").fadeOut();
            }

            // top button position
            // if($(window).scrollTop() + $(window).height() < $(document).height() - $(".footer").height()) {
            //     $('.top-btn').css({'position':'fixed','bottom':'10%','right': '5%'});
            // }
            // if($(window).scrollTop() + $(window).height() > $(document).height() - $(".footer").height()) {
            //     $('.top-btn').css({'position':'absolute','bottom':'10%','right':'5%'});
            // }
        });

         // top button click
         $(".top-btn").on('click',function(){
            $('html, body').animate({
                scrollTop : 0
            }, 400);
        });
    }

    const footer_top = () => {
        $(".footer__m-top").on('click',function(){
            $('html, body').animate({
                scrollTop : 0
            }, 400);
            return false;
        });
    }

    const question_pop = () => {
        console.log('question pop');

        $('body').on('click', '.question-btn' , function () {
            $(".all-q-pop").addClass('show');
            $(".popup-mask").addClass('show');
            window.scrollTo(0,0);
        });

        $("body").on("click", '.popup-mask,.layer-popup__close-btn', function(){
            $(".layer-popup").removeClass('show');
            $(".popup-mask").removeClass('show');

            let e = new Event('closePop');
            window.dispatchEvent(e);
        });
    }

    const common_init = () => {
        header_lang();
        header_search();
        header_nav();
        TopButton();
        footer_top();
        question_pop();
    };

    common_init();
}

export default common;
