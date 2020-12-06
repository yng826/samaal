
const about = () => {

    //aboutUs - location
    // location page 슬라이드
    const locationSwiper = () => {
        const swiper = new Swiper('.about-location .swiper-container', {
            navigation: {
                nextEl: '.about-location .swiper-button-next',
                prevEl: '.about-location .swiper-button-prev',
            },
            pagination: {
                el: '.about-location .swiper-pagination',
            }
        });
    }

    // aboutUs - storyNews - News
    // 스토리뉴스 top button
    const storyTopButton = () => {
        $(window).scroll(function(){
            // top button 생김
            if ($(this).scrollTop()) {
                $(".about-storyNews__top-btn").fadeIn();
            } else {
                $(".about-storyNews__top-btn").fadeOut();
            }

            // top button position
            if($(window).scrollTop() + $(window).height() < $(document).height() - $(".footer").height()) {
                $('.about-storyNews__top-btn').css({'position':'fixed','bottom':'0','right': '5%'});
            }
            if($(window).scrollTop() + $(window).height() > $(document).height() - $(".footer").height()) {
                $('.about-storyNews__top-btn').css({'position':'absolute','bottom':'60px','right':'5%'});
            }
        });

         // top button click
         $(".about-storyNews__top-btn").click(function(){
            $('html, body').animate({
                scrollTop : 0
            }, 400);
        });
    }

    const news_close = () => {
        var header = document.getElementById('header');

         $('.news-btn').on("click",function(){

             $(".storyNews-pop").show();
             $(".popup-mask").show();

             news($(this).attr('id').toString());

         });

        $(".popup-mask , .layer-popup__close-btn").on("click",function(){
            $(".layer-popup").hide();
            $(".popup-mask").hide();
        });


    }

    function news(id) {
        id = id.split('news-btn-')[1];

        $.ajax({
            url: "/about-us/story-news/"+id,
            type: "get",
        }).done(function(data) {
            $('div[name=title]').html(data.new.title);
            $('div[name=contents]').html(data.new.contents);
            $('img[name=id]').attr('src','/admin/news_info/file-download?id='+data.new.id);
        });
    }

    const about_init = () => {
        locationSwiper();
        storyTopButton();
        news_close();
    };

    about_init();
}

export default about;

