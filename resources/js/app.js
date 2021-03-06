/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import "core-js";
import 'core-js/es/number';
import 'core-js/es/string';
import common from './common';
import about from './aboutUs';
import business from './business';
import siteIntro from './siteIntro';
import work from './work';

import Swiper from 'swiper/bundle';
window.Swiper = Swiper;
import 'swiper/swiper-bundle.css';

//require('./bootstrap');
// require('./common');
// require('./business');
// require('./aboutUs');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
// Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
// Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

const appMethods = {
    common,
    business,
    about,
    siteIntro,
    work
};

const appInit = () => {
    const appName = $('body').attr('class');
    if(appName) {
        console.log(appName);
        [common, appMethods[appName]].forEach(method  => {
            if(method) method();
        })
    } else {
        common();
    };

};

document.addEventListener('DOMContentLoaded', async () => {
    appInit();
});
