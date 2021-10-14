require('./bootstrap');
import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'

import Test from './components/Test'

import Home from './components/Home'

const router = new VueRouter({

    mode: 'history',

    routes: [

        {

            path: '/',

            name: 'home',

            component: Home

        },

        {

            path: '/test',

            name: 'test',

            component: Test,

        },

    ],

});

const app = new Vue({

    el: '#app',

    components: { App },

    router,

});