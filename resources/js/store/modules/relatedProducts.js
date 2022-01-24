/*import API from './../../Api'*/
import HTTP from './../../Api/auth'

const state = {
  addFaq: [],
  faqError: [],
  faqs: [],
  filterfaqs: []
}
const getters = {
  addFaq: state => state.addFaq,
  faqs: state => state.faqs,
  filterfaqs: state => state.filterfaqs,
  faqError: state => state.faqError
}

const actions = {
  addFaq ({ commit }, faqData) {
    HTTP.post(process.env.MIX_APP_APIURL+'faq/store', faqData).then((response) => {
      commit('addFaq', response.data.data)
    }).catch((errors) => {
      commit("faqError", errors.response.data.message)
    })
  },
  getFaqs ({ commit }, productId) {
    HTTP.get(process.env.MIX_APP_APIURL+'faq/'+productId).then((response) => {
      commit('getFaqs', response.data.data)
    }).catch((errors) => {
      commit("faqError", errors.response.data.message)
    })
  },
  filterFaqs ({ commit }, filterdata) {
    HTTP.get(process.env.MIX_APP_APIURL+'faq/'+filterdata.product_id+'/'+filterdata.search).then((response) => {
      commit('filterFaqs', response.data.data)
    }).catch((errors) => {
      commit("faqError", errors.response.data.message)
    })
  }
}
const mutations = {
  addFaq: (state, payload) => (
    state.addFaq = payload
  ),
  getFaqs: (state, payload) => (
    state.faqs = payload
  ),
  filterFaqs: (state, payload) => (
    state.filterfaqs = payload
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
