/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import common from './common';
// import business from './business';
// import about from './aboutUs';

import axios from 'axios';
import {getHeader} from './config';
import User from './job/User';

require('./bootstrap');

// axios.defaults.headers = getHeader();


window.Vue = require('vue');

// console.log(getHeader());

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
// Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
// Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);
Vue.component('login-component', require('./components/job/Login.vue').default);
Vue.component('applicant-list-component', require('./components/job/ApplicantList.vue').default);
Vue.component('individual-info-component', require('./components/job/IndividualInfo.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.$ = window.jQuery = require('jquery');



document.addEventListener('DOMContentLoaded', () => {
    console.log($('#email').val());

    const app = new Vue({
        el: '#app',
    });

});