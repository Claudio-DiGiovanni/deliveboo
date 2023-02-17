require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import AdminHome from './pages/AdminHome';
Vue.use(VueRouter);

const routes = [
    {
        path:'/restaurants',
<<<<<<< HEAD
        name:'home',
        component: AdminHome,
    },
];
=======
        name:'restaurants',
        component:AdminHome,
    }
]
>>>>>>> b257ecff47b0b60135b3a70c3290c473cb415d7c

const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router,
});
