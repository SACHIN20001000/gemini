import API from './../../Api'
/*import HTTP from './../../Api/auth'*/

const state = {
  catErrors: [],
  categories:[],
  category:[],
  listPages:[],
  singlePage:[],
  pageErrors:[]

}
const getters = {
  categories: state => state.categories,
  catErrors: state => state.catErrors,
  category: state => state.category,
  listPages: state => state.listPages,
  singlePage: state => state.singlePage,
  pageErrors: state => state.pageErrors
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
  },
  async getPages({commit}){
    API.get(process.env.MIX_APP_APIURL+"pages").then((response) => {
      commit("getPages", response.data.data)
    }).catch((errors) => {
      commit("pageErrors", errors.response.data.message)
    })
  },
  async getPage({commit},id){
    API.get(process.env.MIX_APP_APIURL+"pages/"+id).then((response) => {
      commit("getPage", response.data.data)
    }).catch((errors) => {
      commit("pageErrors", errors.response.data.message)
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
  ),
  pageErrors: (state, error) => (
    state.pageErrors = error
  ),
  getPages: (state, pages) => (
    state.listPages = pages
  ),
  getPage: (state, page) => (
    state.singlePage = page
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
