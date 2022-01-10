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

const actions = {
  async getCartItems ({ commit }) {
    const cartKey = localStorage.getItem('cartKey')
    const cartId = localStorage.getItem('cartId')
    HTTP.get(process.env.MIX_APP_APIURL+'cart/'+cartId+'?key='+cartKey).then((response) => {
      commit('getItemsCart', response.data.data)
    });
  },
  addCartItem ({ commit }, cartItem) {
    const cartId = localStorage.getItem('cartId')
    HTTP.post(process.env.MIX_APP_APIURL+'cart/'+cartId, cartItem).then((response) => {
      commit('addItemCart', response.data.data)
    });
  },
  removeCartItem ({ commit }, cartId) {
    const cartKey = localStorage.getItem('cartKey')
    const cartkeyId = localStorage.getItem('cartId')
    HTTP.delete(process.env.MIX_APP_APIURL+'cart/'+cartkeyId+'/'+cartId, {
      data: {
        key: cartKey
      }
    }).then(() => {
      commit('deleteCartItem', cartId)
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
  deleteCartItem: (state, payload) => (
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
