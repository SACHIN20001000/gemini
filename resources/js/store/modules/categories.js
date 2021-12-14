import Api from './../../Api'

const state = {
  catErrors: [],
  getCategories:[]

}
const getters = {
  getCategories: state => state.getCategories,
  catErrors: state => state.catErrors
}

const actions = {
  async getCategories({commit}){
    Api.get(process.env.MIX_APP_APIURL+"categories").then((response) => {
      commit("getCategories", response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  getCategories: (state, categories) => (
    state.getCategories = categories
  ),
  catErrors: (state, error) => (
    state.catErrors = error
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
