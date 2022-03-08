import Vue from "vue"
import VueMeta from 'vue-meta'
import store from "./store"
import Notifications from "vue-notification"
import VueSweetalert2 from "vue-sweetalert2"
import "sweetalert2/dist/sweetalert2.min.css"
import VueAwesomeSwiper from 'vue-awesome-swiper'
import { StripePlugin } from '@vue-stripe/vue-stripe'
import moment from 'moment'
import VueNestedMenu from 'vue-nested-menu'
import VueJsonLD from 'vue-jsonld'

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MMM, DD YYYY h:mm')
    }
})
const options = {
  pk: process.env.MIX_STRIPE_PUBLISHABLE_KEY,
  stripeAccount: process.env.MIX_STRIPE_ACCOUNT,
  apiVersion: process.env.MIX_API_VERSION,
  locale: process.env.MIX_LOCALE,
}
Vue.use(VueSweetalert2)
Vue.use(Notifications)
Vue.use(store)
Vue.use(VueAwesomeSwiper)
Vue.use(StripePlugin, options)
Vue.use(VueMeta)
Vue.use(VueNestedMenu)
Vue.use(VueJsonLD)

import './assets/js/jquery-3.6.0.min.js'
import './assets/js/bootstrap.bundle.min.js'
import './assets/css/bootstrap.min.css'
import './assets/css/style.css'
/*
new Vue({
    el: "#app",
    components: { App },
    store
});*/
Vue.component('header-component', require('./components/Header/index.vue').default)
Vue.component('footer-component', require('./components/Footer/index.vue').default)
Vue.component('home-component', require('./components/Home/index.vue').default)
Vue.component('product-component', require('./components/Products/index.vue').default)

const app = new Vue({
    el: '#app',
    store
});
