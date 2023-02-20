require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import AdminHome from './pages/AdminHome';
Vue.use(VueRouter);

const routes = [
    {
        path:'/',
        name:'home',
        component: AdminHome,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router,
});
