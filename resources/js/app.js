import Vue from "vue"
import VueRouter from "vue-router"
import router from "./router"
import App from "./App.vue"
import VueMeta from 'vue-meta'
import store from "./store"
import Notifications from "vue-notification"
import VueSweetalert2 from "vue-sweetalert2"
import "sweetalert2/dist/sweetalert2.min.css"
import VueAwesomeSwiper from 'vue-awesome-swiper'
import { StripePlugin } from '@vue-stripe/vue-stripe'
import moment from 'moment'

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY hh:mm')
    }
})
const options = {
  pk: process.env.MIX_STRIPE_PUBLISHABLE_KEY,
  stripeAccount: process.env.MIX_STRIPE_ACCOUNT,
  apiVersion: process.env.MIX_API_VERSION,
  locale: process.env.MIX_LOCALE,
}
Vue.use(VueRouter)
Vue.use(VueSweetalert2)
Vue.use(Notifications)
Vue.use(store)
Vue.use(VueAwesomeSwiper)
Vue.use(StripePlugin, options)
Vue.use(VueMeta)

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
