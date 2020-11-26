// import Swiper from 'swiper/bundle';
// import 'swiper/swiper-bundle.css';

const business = () => {

    const foilWrap = () => {
        const test = $(".footer").outerHeight();
        console.log(test);
        console.log(window.innerHeight);

        $(window).scroll(function() {

        });


    };


    const business_init = () => {
        foilWrap();
    };
    business_init();
}

export default business;
