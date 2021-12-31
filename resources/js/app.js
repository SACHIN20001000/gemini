import Vue from "vue"
import VueRouter from "vue-router"
import router from "./router"
import App from "./App.vue"
import store from "./store"
import Notifications from "vue-notification"
import VueSweetalert2 from "vue-sweetalert2"
import "sweetalert2/dist/sweetalert2.min.css"
Vue.use(VueRouter)
Vue.use(VueSweetalert2)
Vue.use(Notifications)
Vue.use(store)
import './assets/js/jquery-3.6.0.min.js'
import './assets/js/bootstrap.bundle.min.js'
import './assets/css/bootstrap.min.css'
import './assets/css/style.css'

new Vue({
    el: "#app",
    components: { App },
    store,
    router
});
