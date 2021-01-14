
require('./bootstrap');

window.Vue = require('vue');
import Form from './Form.js'
window.Form = Form


Vue.component('example-component', require('./components/LeaveComponent.vue').default);
Vue.component('all-leave-component', require('./components/AllLeaveComponent'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
