/*import API from './../../Api'*/
import HTTP from './../../Api/auth'

const state = {
  Orders: [],
  getOrder: [],
  orderResponse: [],
  orderErrors: []
}
const getters = {
  Orders: state => state.Orders,
  getOrder: state => state.getOrder,
  orderResponse: state => state.orderResponse,
  orderErrors: state => state.orderErrors
}

const actions = {
  async getOrders ({ commit }) {
    HTTP.get(process.env.MIX_APP_APIURL+'order').then((response) => {
      commit('getOrdersList', response.data.data)
    }).catch((errors) => {
      commit("orderErrors", errors.response.data.message)
    })
  },
  async getOrder({ commit },orderId) {
    HTTP.get(process.env.MIX_APP_APIURL+'order/'+orderId).then((response) => {
      commit('getOrder', response.data.data)
    }).catch((errors) => {
      commit("orderErrors", errors.response.data.message)
    })
  },
  addOrder({ commit }, cartItem) {
    const cartId = localStorage.getItem('cartId')
    HTTP.post(process.env.MIX_APP_APIURL+'checkout/'+cartId, cartItem).then((response) => {
      commit('addOrderList', response.data.message)
    }).catch((errors) => {
      commit("orderErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  getOrdersList: (state, payload) => (
    state.Orders = payload
  ),
  getOrder: (state, payload) => (
    state.getOrder = payload
  ),
  addOrderList: (state, payload) => (
    state.orderResponse = payload
  ),
  orderErrors: (state, payload) => (
    state.orderErrors = payload
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
