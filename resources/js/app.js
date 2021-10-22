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

import Test from "./components/Test";

import Home from "./components/Home";

import ExampleComponent from "./components/ExampleComponent";

import TestForm from "./components/TestForm";
import Conditional from "./components/Conditional";
import Registration from "./components/Register";
import Profile from "./components/Profile";
const router = new VueRouter({
    mode: "history",

    routes: [{
            path: "/",

            name: "home",

            component: Home
        },

        {
            path: "/test",

            name: "test",

            component: Test
        },
        {
            path: "/Example",

            name: "Example",

            component: ExampleComponent
        },
        {
            path: "/TestForm",
            name: "TestForm",
            component: TestForm
        },
        {
            path: "/Conditional",
            name: "Conditional",
            component: Conditional
        },
        {
            path: "/Registration",
            name: "Registration",
            component: Registration
        },
        {
            path: "/Profile",
            name: "Profile",
            component: Profile
        }
    ]
});

const app = new Vue({
    el: "#app",

    components: { App },

    router
});