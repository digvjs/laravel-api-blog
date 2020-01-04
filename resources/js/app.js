
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import { store } from './store';
import routes from './routes';

Vue.use(VueRouter)

const router = new VueRouter({
    // mode: 'history',
    routes
});


Vue.component('home', require('./components/HomeComponent.vue').default);
Vue.component('navigation', require('./components/NavigationComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
