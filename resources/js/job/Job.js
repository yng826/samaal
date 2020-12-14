/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import common from './common';
// import business from './business';
// import about from './aboutUs';

import axios from 'axios';
import {getHeader} from '../config';
import User from './User';
// import Count from './job/Count'
// import Vuex from 'vuex'

require('../bootstrap');

// axios.defaults.headers = getHeader();


window.Vue = require('vue');
// Vue.use(Vuex);

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
Vue.component('login-component', require('../components/job/Login.vue').default);
Vue.component('join-component', require('../components/job/Join.vue').default);
Vue.component('find-password-component', require('../components/job/FindPassword.vue').default);
Vue.component('applicant-list-component', require('../components/job/ApplicantList.vue').default);
Vue.component('individual-info-component', require('../components/job/IndividualInfo.vue').default);
Vue.component('education-component', require('../components/job/Education.vue').default);
Vue.component('career-component', require('../components/job/Career.vue').default);
Vue.component('military-component', require('../components/job/Military.vue').default);
Vue.component('oa-component', require('../components/job/OA.vue').default);
Vue.component('language-component', require('../components/job/Language.vue').default);
Vue.component('award-component', require('../components/job/Award.vue').default);
Vue.component('certificate-component', require('../components/job/Certificate.vue').default);
Vue.component('overseas-component', require('../components/job/OverseasStudy.vue').default);
Vue.component('self-introduction-component', require('../components/job/SelfIntroduction.vue').default);
Vue.component('applycant-review-component', require('../components/job/ApplicantReview.vue').default);
Vue.component('job-button-groups-component', require('../components/job/JobButtonGroups.vue').default);
Vue.component('progress-component', require('../components/job/Progress.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.$ = window.jQuery = require('jquery');


import {JobStore} from './Store'
document.addEventListener('DOMContentLoaded', () => {

    if ( typeof vueApp == 'undefined' ) {
        const vueApp = new Vue({
            el: '#app',
            store: JobStore,
            mounted: function() {
                this.$root.$on('openPopup', (args1, args2) => {
                    console.log('openPopup', args1, args2);
                    $('html, body').animate({scrollTop: '0'}, 1000);
                    $('.popup-mask').addClass('show');
                })
                this.$root.$on('closePopup', (args1) => {
                    $('.popup-mask').removeClass('show');
                })
            }
        });
        console.log('init job');
    }
});
