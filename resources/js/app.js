/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);
import { routes } from './router.js';
const router = new VueRouter({
    mode: 'history',
    routes
});


import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store"

const store = new Vuex.Store(
   storeData
)

Vue.component('veg', require('./components/VEG.vue').default);
Vue.component('mai', require('./components/main.vue').default);
Vue.component('fruit', require('./components/fruit.vue').default);
Vue.component('nav--bar', require('./components/nav.vue').default);
Vue.component('cart', require('./components/cart.vue').default);
Vue.component('detail', require('./components/detail.vue').default);
Vue.component('router', require('./components/router.vue').default);
Vue.component('add', require('./components/add.vue').default);
Vue.component('totalcart', require('./components/footer.vue').default);
Vue.component('notification', require('./components/notification.vue').default);



const app = new Vue({

    el: '#app',

    store,
    router //vuex

});