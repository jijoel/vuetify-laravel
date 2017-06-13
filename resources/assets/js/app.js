
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('vuetify');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component('VaLayout', require('./components/Layout.vue'));
Vue.component('VaBtn', require('./components/LinkButton.vue'));
Vue.component('VaEmailControl', require('./controls/Email.vue'));
Vue.component('VaPasswordControl', require('./controls/Password.vue'));
Vue.component('VaNewPasswordControl', require('./controls/NewPassword.vue'));


window.Validator = require('validatorjs');
window.FormRules = require('./helpers/FormRules.js');

