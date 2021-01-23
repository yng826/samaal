
const about = () => {

    //aboutUs - location
    // location page 슬라이드
    const locationSwiper = () => {
        const swiper = new Swiper('.about-location .swiper-container', {
            loop: true,
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
    const news_close = () => {
        var header = document.getElementById('header');

         $('.news-btn').on("click",function(){

             $(".storyNews-pop").show();
             $(".popup-mask").show();

             news($(this).attr('id').toString());

         });

        $(".popup-mask , .layer-popup__close-btn").on("click",function(){
            $(".layer-popup").removeClass('show');
            $(".popup-mask").removeClass('show');
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
            $('img[name=id]').attr('src','/kor/admin/news_info/file-download?id='+data.new.id);
        });
    }

    const about_init = () => {
        locationSwiper();
        // news_close();
    };

    about_init();
}

export default about;

