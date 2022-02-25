import API from './../../Api'
/*import HTTP from './../../Api/auth'*/

const state = {
  brandError: [],
  brandProducts:[],
  brand:[]

}
const getters = {
  brand: state => state.brand,
  brandProducts: state => state.brandProducts,
  brandError: state => state.brandError
}

const actions = {
  async getBrandProducts({commit},id){
    API.get(process.env.MIX_APP_APIURL+"brand/product/"+id).then((response) => {
      commit("getBrandProducts", response.data.data)
    }).catch((errors) => {
      commit("brandErrors", errors.response.data.message)
    })
  },
  async getBrand({commit},id){
    API.get(process.env.MIX_APP_APIURL+"brand/"+id).then((response) => {
      commit("getBrand", response.data.data)
    }).catch((errors) => {
      commit("brandErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  getBrandProducts: (state, payload) => (
    state.brandProducts = payload
  ),
  getBrand: (state, payload) => (
    state.brand = payload
  ),
  brandErrors: (state, error) => (
    state.brandError = error
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
