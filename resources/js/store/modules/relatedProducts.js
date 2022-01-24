/*import API from './../../Api'*/
import HTTP from './../../Api/auth'

const state = {
  addFaq: [],
  faqError: []
}
const getters = {
  addFaq: state => state.addFaq,
  faqError: state => state.faqError
}

const actions = {
  addFaq ({ commit }, faqData) {
    HTTP.post(process.env.MIX_APP_APIURL+'faq​/store/', faqData).then((response) => {
      commit('addFaq', response.data.data)
    }).catch((errors) => {
      commit("faqError", errors.response.data.message)
    })
  }
}
const mutations = {
  addFaq: (state, payload) => (
    state.addFaq = payload
  ),
  faqError: (state, payload) => (
    state.faqError = payload
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
