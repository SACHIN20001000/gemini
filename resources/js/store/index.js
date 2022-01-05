import Vue from 'vue'
import Vuex from 'vuex'
import UsersModule from './modules/users'
import HomesModule from './modules/homes'
import CartsModule from './modules/carts'
import CheckoutsModule from './modules/checkouts'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    UsersModule,
    HomesModule,
    CartsModule,
    CheckoutsModule
  }
})
