require('./bootstrap');

import Vue from 'vue';
import App from './App';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    {
        path:'/restaurants',
        name:'restaurants',
const router = new VueRouter({
    mode: 'history',
    routes,
});
new Vue({
    el: '#root',
    render: h => h(App),
    router
});
