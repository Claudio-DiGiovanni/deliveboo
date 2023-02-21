require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';
import PageDishes from './pages/PageDishes';
Vue.use(VueRouter);

const routes = [
    {
        path:'/',
        name:'home',
        component: PageHome,
    },
    {
        path:'/:slug',
        name:'dishes',
        component: PageDishes,
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
