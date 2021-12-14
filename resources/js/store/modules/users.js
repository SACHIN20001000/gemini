/*import axios from 'axios'*/
import Api from './../../Api'

const state = {
  errors: [],
  userDetails:[],
  accountDetails:[],
  accountErrors:[]

}
/*const formData = new FormData()*/

const getters = {
  userDetails: state => state.userDetails,
  errors: state => state.errors,
  accountDetails: state => state.accountDetails,
  accountErrors: state => state.accountErrors
}

const actions = {
  async registerUser({commit},data){
    Api.post(process.env.MIX_APP_APIURL+"register", data).then((response) => {
      localStorage.setItem('token', response.data.data.token)
      commit("userInfo", response.data.data)
    }).catch((errors) => {
      commit("userErrors", errors.response.data.message)
    })
  },
  async loginUser({commit},data){
    Api.post(process.env.MIX_APP_APIURL+"login", data).then((response) => {
      localStorage.setItem('token', response.data.data.token)
      commit("userInfo", response.data.data)
    }).catch((errors) => {
      commit("userErrors", errors.response.data.message)
    })
  },
  async getProfile({commit}){
    Api.get(process.env.MIX_APP_APIURL+"profile").then((response) => {
      commit("accountDetails", response.data.data)
    }).catch((errors) => {
      commit("accountErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  userInfo: (state, user) => (
    state.userDetails = user
  ),
  userErrors: (state, error) => (
    state.errors = error
  ),
  accountDetails: (state, account) => (
    state.accountDetails = account
  ),
  accountErrors: (state, accerror) => (
    state.accountErrors = accerror
  ),
}

export default {
    state,
    getters,
    actions,
    mutations
}
