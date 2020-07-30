
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./date');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';

import 'fullpage.js/vendors/scrolloverflow';

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas)
 
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(require('vue-moment'));

import VueFullPage from 'vue-fullpage.js';
import App from './components/App.vue';




Vue.component('app', require('./components/App.vue'));

Vue.use(VueFullPage);

const app = new Vue({
    el: '#app',
    render: h => h(App)
});