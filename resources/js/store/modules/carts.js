/*import API from './../../Api'*/
import HTTP from './../../Api/auth'

const state = {
  getCartItem: [],
  addCartItems: [],
  deleteCartItem: [],
  chowhubItems: [],
  litterhubItems: [],
  deleteCartItems: []
}
const getters = {
  getCartItem: state => state.getCartItem,
  addCartItems: state => state.addCartItems,
  deleteCartItem: state => state.deleteCartItem,
  chowhubItems: state => state.chowhubItems,
  litterhubItems: state => state.litterhubItems,
  deleteCartItems: state => state.deleteCartItems,
  cartQuantity: state => {
    return state.getCartItem.reduce((acc, cartItem) => {
      return Number(cartItem.quantity) + Number(acc);
    }, 0);
  },
  cartTotal: state => {
    return state.getCartItem.reduce((acc, cartItem) => {
      if(cartItem.variationProduct){
        return Number(cartItem.quantity * cartItem.variationProduct.sale_price) + Number(acc);
      }else{
        return Number(cartItem.quantity * cartItem.product.sale_price) + Number(acc);
      }

    }, 0).toFixed(2);
  },
}

const actions = {
  async getCartItems ({ commit }) {
    const cartKey = localStorage.getItem('cartKey')
    const cartId = localStorage.getItem('cartId')
    HTTP.get(process.env.MIX_APP_APIURL+'cart/'+cartId+'?key='+cartKey).then((response) => {
      commit('getItemsCart', response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
      localStorage.removeItem('cartKey')
      localStorage.removeItem('cartId')
      HTTP.get(process.env.MIX_APP_APIURL+"cart").then((response) => {
        commit("getCartToken", response.data.data)
        const cartToken = response.data.data;
        if(cartToken.key){
          localStorage.setItem('cartKey', cartToken.key)
          localStorage.setItem('cartId', cartToken.id)
        }
      })
    })
  },
  async getChowhubCartItems ({ commit },chowhubcart) {
    HTTP.get(process.env.MIX_APP_APIURL+'chowhub/cart/'+chowhubcart.cartId+'?key='+chowhubcart.cartKey).then((response) => {
      commit('chowhubCartItems', response.data.data)
    });
  },
  async getLitterhubCartItems ({ commit },litterhubcart) {
    HTTP.get(process.env.MIX_APP_APIURL+'litterhub/cart/'+litterhubcart.cartId+'?key='+litterhubcart.cartKey).then((response) => {
      commit('litterhubCartItems', response.data.data)
    });
  },
  addCartItem ({ commit }, cartItem) {
    const cartId = localStorage.getItem('cartId')
    HTTP.post(process.env.MIX_APP_APIURL+'cart/'+cartId, cartItem).then((response) => {
      commit('addItemCart', response.data.data)
    });
  },
  removeCartItem ({ commit }) {
    const cartKey = localStorage.getItem('cartKey')
    const cartkeyId = localStorage.getItem('cartId')
    HTTP.delete(process.env.MIX_APP_APIURL+'cart/'+cartkeyId, {
      data: {
        key: cartKey
      }
    }).then(() => {
      commit('deleteCartItem', cartkeyId)
      localStorage.removeItem('cartKey')
      localStorage.removeItem('cartId')
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
  chowhubCartItems: (state, payload) => (
    state.chowhubItems = payload
  ),
  litterhubCartItems: (state, payload) => (
    state.litterhubItems = payload
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
