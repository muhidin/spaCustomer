import Vue from 'vue';
import App from './components/App';
import router from './router';

require('./bootstrap');

// window.Vue = require('vue');
const app = new Vue({
    el: '#app',
    components: { App },
    router
});