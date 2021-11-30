require("./bootstrap");
import Vue from "vue";

import VueRouter from "vue-router";

import Notifications from "vue-notification";

import VueSweetalert2 from "vue-sweetalert2";

import "sweetalert2/dist/sweetalert2.min.css";

Vue.use(VueRouter);

Vue.use(VueSweetalert2);

Vue.use(Notifications)

import App from "./components/App";
import Home from "./components/Home";
const router = new VueRouter({
    mode: "history",

    routes: [{
            path: "/",

            name: "home",

            component: Home
        }
    ]
});

const app = new Vue({
    el: "#app",

    components: { App },

    router
});