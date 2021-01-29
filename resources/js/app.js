
require('./bootstrap');

window.Vue = require('vue');
import Form from './Form.js'
window.Form = Form

Vue.component('example-component', require('./components/LeaveComponent.vue').default);
Vue.component('all-leave-component', require('./components/AllLeaveComponent'));

const app = new Vue({
    el: '#app',
});
