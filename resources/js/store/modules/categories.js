import API from './../../Api'
/*import HTTP from './../../Api/auth'*/

const state = {
  catErrors: [],
  categories:[]

}
const getters = {
  categories: state => state.categories,
  catErrors: state => state.catErrors
}

const actions = {
  async getCategories({commit}){
    API.get(process.env.MIX_APP_APIURL+"categories").then((response) => {
      commit("getCategories", response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  getCategories: (state, categories) => (
    state.categories = categories
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
