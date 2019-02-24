// app.js

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

axios.defaults.baseURL = 'http://localhost:8000/api';

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';
import ReadComponent from './components/ReadComponent.vue';
import LoginComponent from './components/LoginComponent.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent,
    },
    {
        path: '/login',
        name: 'login',
        component: LoginComponent,
        meta: {
            auth: false
        }
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'posts',
        path: '/posts',
        component: IndexComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'read',
        path: '/read/:id',
        component: ReadComponent
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
Vue.router = router;

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});

App.router = Vue.router;
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');