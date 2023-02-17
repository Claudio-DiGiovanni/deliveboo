require('./bootstrap');

import Vue from 'vue';
import App from './App';
import VueRouter from 'vue-router';
import AdminHome from './pages/AdminHome';
Vue.use(VueRouter);



new Vue({
    el: '#root',
    render: h => h(App),

});
