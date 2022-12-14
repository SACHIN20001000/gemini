import axios from 'axios'
import API from './../../Api'
import HTTP from './../../Api/auth'

const state = {
  errors: [],
  loginErrors: [],
  userDetails:[],
  accountDetails:[],
  accountErrors:[],
  pets:[],
  tokenStatus: localStorage.getItem("token"),
  tokenError:''
}
const formData = new FormData()
formData.append('client_id', 2)
formData.append('client_secret', '8BSSg7qMYw2NAJaiMhQOCYxGlFSs141SLfPRLU')

const getters = {
  userDetails: state => state.userDetails,
  errors: state => state.errors,
  loginErrors: state => state.loginErrors,
  accountDetails: state => state.accountDetails,
  accountErrors: state => state.accountErrors,
  tokenStatus: state => state.tokenStatus,
  pets: state => state.pets,
  tokenError: state => state.tokenError
}

const actions = {
  async registerUser({commit},data){
    API.post(process.env.MIX_APP_APIURL+"register", data).then((response) => {
      localStorage.setItem('userauth', response.data.data.token)
      commit("userInfo", response.data.data)
    }).catch((errors) => {
      commit("userErrors", errors.response.data)
    })
  },
  async loginUser({commit},data){
    API.post(process.env.MIX_APP_APIURL+"login", data).then((response) => {
      localStorage.setItem('userauth', response.data.data.token)
      commit("userInfo", response.data.data)
    }).catch((errors) => {
      commit("loginErrors", errors.response.data.message)
    })
  },
  async getProfile({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+"profile").then((response) => {
      commit("accountDetails", response.data.data)
    }).catch((errors) => {
      commit("accountErrors", errors.response.data.message)
    })
  },
  async getPets({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+"pet").then((response) => {
      commit("pets", response.data.data)
    }).catch((errors) => {
      commit("accountErrors", errors.response.data.message)
    })
  },
  async getToken({commit}){
    await axios.post(process.env.MIX_APP_APIURL+'oauth/token', formData).then((response) => {
      localStorage.setItem('token', response.data.Token)
      commit("tokenStatus", 'token is set!')
    }).catch((errors) => {
      commit("tokenError", errors.response.data.message)
      localStorage.removeItem('token')
      if(errors.response.data.message =='Invalid client Id'){
          alert(errors.response.data.message)
      }else{
        window.location.reload()
      }
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
  loginErrors: (state, error) => (
    state.loginErrors = error
  ),
  accountDetails: (state, account) => (
    state.accountDetails = account
  ),
  accountErrors: (state, accerror) => (
    state.accountErrors = accerror
  ),
  pets: (state, payload) => (
    state.pets = payload
  ),
  tokenStatus: (state, tokenstatus) => (
    state.tokenStatus = tokenstatus
  ),
  tokenError: (state, tokenerror) => (
    state.tokenError = tokenerror
  ),
}

export default {
    state,
    getters,
    actions,
    mutations
}
