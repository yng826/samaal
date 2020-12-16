/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import common from './common';
// import business from './business';
// import about from './aboutUs';

import axios from 'axios';

require('./bootstrap');
// require('axios');
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

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
// Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
// Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// window.$ = window.jQuery = require('jquery');
Vue.component('login-component', require('./components/job/Login.vue').default);
Vue.component('join-component', require('./components/job/Join.vue').default);
Vue.component('find-password-component', require('./components/job/FindPassword.vue').default);
Vue.component('apply-button', require('./components/job/ApplyButton.vue').default);
Vue.component('check-apply-button', require('./components/job/CheckApplyButton.vue').default);


// import {JobStore} from './Job/Store'
import ApplyButton from './components/job/ApplyButton';
const app = new Vue({
    el: '#app',
    mounted: function() {
        this.$root.$on('openPopup', (args1) => {
            console.log('openPopup', args1);
            $('.popup-mask').addClass('show');
        })
        this.$root.$on('closePopup', (args1) => {
            $('.popup-mask').removeClass('show');
        })
        window.addEventListener('closePop', this.closePop);
    },
    methods: {
        closePop() {
            this.$root.$emit('closePopup');
            console.log('hello');
        }
    }
    // store: JobStore,
});
