import API from './../../Api'
/*import HTTP from './../../Api/auth'*/

const state = {
  catpagErrors: [],
  categoryPag:[]

}
const getters = {
  categoryPag: state => state.categoryPag,
  catpagErrors: state => state.catpagErrors
}

const actions = {
  getPaginationCategory({commit},params){
    API.get(process.env.MIX_APP_APIURL+"products/category/"+params.id+'?page='+params.page).then((response) => {
      commit("getPagCategory", response.data)
    }).catch((errors) => {
      commit("catpagErrors", errors.response.data.message)
    })
  }
}
const mutations = {
  getPagCategory: (state, payload) => (
    state.categoryPag = payload
  ),
  catpagErrors: (state, error) => (
    state.catpagErrors = error
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
