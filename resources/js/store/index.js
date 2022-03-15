import Vue from 'vue'
import Vuex from 'vuex'
import UsersModule from './modules/users'
import HomesModule from './modules/homes'
import CartsModule from './modules/carts'
import CheckoutsModule from './modules/checkouts'
import BrandsModule from './modules/brands'
import RelatedProductsModule from './modules/relatedProducts'
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
    HomesModule,
    CartsModule,
    CheckoutsModule,
    RelatedProductsModule,
    BrandsModule,
    CategoriesModule
  }
})
