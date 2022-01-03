/*import API from './../../Api'*/
import HTTP from './../../Api/auth'

const state = {
  getCartItem: [],
  addCartItems: [],
  deleteCartItem: [],
  deleteCartItems: []
}
const getters = {
  getCartItem: state => state.getCartItem,
  addCartItems: state => state.addCartItems,
  deleteCartItem: state => state.deleteCartItem,
  deleteCartItems: state => state.deleteCartItems,
  cartQuantity: state => {
    return state.getCartItem.reduce((acc, cartItem) => {
      return cartItem.quantity + acc;
    }, 0);
  },
  cartTotal: state => {
    return state.getCartItem.reduce((acc, cartItem) => {
      return (cartItem.quantity * cartItem.product.sale_price) + acc;
    }, 0).toFixed(2);
  },
}
let cartKey =''
let cartId = ''
if(localStorage.getItem('cartKey') != '' && localStorage.getItem('cartId') !=''){
  cartKey = localStorage.getItem('cartKey')
  cartId = localStorage.getItem('cartId')
}

const actions = {
  async getCartItems ({ commit }) {
    HTTP.get(process.env.MIX_APP_APIURL+'cart/'+cartId+'?key='+cartKey).then((response) => {
      commit('getItemsCart', response.data.data)
    });
  },
  addCartItem ({ commit }, cartItem) {
    HTTP.post(process.env.MIX_APP_APIURL+'cart/'+cartId, cartItem).then((response) => {
      commit('addItemCart', response.data.data)
    });
  },
  removeCartItem ({ commit }, cartItem) {
    HTTP.delete(process.env.MIX_APP_APIURL+'cart/delete', cartItem).then((response) => {
      commit('deleteItemsCart', response.data.data)
    });
  },
  removeAllCartItems ({ commit }) {
    HTTP.delete(process.env.MIX_APP_APIURL+'cart/delete/all').then((response) => {
      commit('deleteAllItemsCart', response.data.data)
    });
  }
}
const mutations = {
  getItemsCart: (state, payload) => (
    state.getCartItem = payload
  ),
  addItemCart: (state, payload) => (
    state.addCartItems = payload
  ),
  deleteItemsCart: (state, payload) => (
    state.deleteCartItem = payload
  ),
  deleteAllItemsCart: (state, payload) => (
    state.deleteCartItems = payload
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
