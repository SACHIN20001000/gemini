import Vue from 'vue'
import Vuex from 'vuex'
import UsersModule from './modules/users'
import CategoriesModule from './modules/categories'

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
    CategoriesModule
  }
})
