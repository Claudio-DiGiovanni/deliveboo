require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import Vuex from 'vuex'
import store from './store'
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';
import PageDishes from './pages/PageDishes';
import PageCart from './pages/PageCart';
Vue.use(VueRouter);
Vue.use(Vuex)

const routes = [
    {
        path:'/',
        name:'home',
        component: PageHome,
    },
    {
        path:'/restaurants/:id/dishes',
        name:'dishes',
        component: PageDishes,
    },
    {
        path:'/cart',
        name:'cart',
        component: PageCart,
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router,
    store,
});
