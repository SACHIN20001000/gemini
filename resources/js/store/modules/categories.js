import API from './../../Api'
/*import HTTP from './../../Api/auth'*/

const state = {
  catErrors: [],
  categories:[],
  category:[]

}
const getters = {
  categories: state => state.categories,
  catErrors: state => state.catErrors,
  category: state => state.category
}

const actions = {
  async getCategories({commit}){
    API.get(process.env.MIX_APP_APIURL+"categories").then((response) => {
      commit("getCategories", response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
    })
  },
  async getCategory({commit},id){
    API.get(process.env.MIX_APP_APIURL+"categories/"+id).then((response) => {
      commit("getCategory", response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  getCategories: (state, categories) => (
    state.categories = categories
  ),
  getCategory: (state, category) => (
    state.category = category
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
