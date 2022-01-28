/*import API from './../../Api'*/
import HTTP from './../../Api/auth'
import axios from 'axios'

const state = {
  addFaq: [],
  faqError: [],
  faqs: [],
  reviews: [],
  insertReview: [],
  filterfaqs: [],
  overAllRating: [],
  reviewError: []
}
const getters = {
  addFaq: state => state.addFaq,
  faqs: state => state.faqs,
  filterfaqs: state => state.filterfaqs,
  reviews: state => state.reviews,
  insertReview: state => state.insertReview,
  overAllRating: state => state.overAllRating,
  faqError: state => state.faqError,
  reviewError: state => state.reviewError
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
    HTTP.get(process.env.MIX_APP_APIURL+'faq/'+filterdata.data.product_id+'/'+filterdata.data.serachtext).then((response) => {
      commit('filterFaqs', response.data.data)
    }).catch((errors) => {
      commit("faqError", errors.response.data.message)
    })
  },
  getReviews({ commit }, productId) {
    HTTP.get(process.env.MIX_APP_APIURL+'rating/'+productId).then((response) => {
      commit('getReviews', response.data.data)
    }).catch((errors) => {
      commit("reviewError", errors.response.data.message)
    })
  },
  getOverAllRating({ commit }, productId) {
    HTTP.get(process.env.MIX_APP_APIURL+'rating/overall/'+productId).then((response) => {
      commit('overallRating', response.data)
    }).catch((errors) => {
      commit("reviewError", errors.response.data.message)
    })
  },
  addReview({ commit }, reviewdata) {
    let config = {
      header : {
        'Content-Type': 'multipart/form-data'
      }
    }
    axios.post(process.env.MIX_APP_APIURL+'rating/create', reviewdata, config).then((response) => {
      commit('reviewAdd', response.data.data)
    }).catch((errors) => {
      commit("reviewError", errors)
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
  getReviews: (state, payload) => (
    state.reviews = payload
  ),
  reviewAdd: (state, payload) => (
    state.insertReview = payload
  ),
  overallRating: (state, payload) => (
    state.overAllRating = payload
  ),
  faqError: (state, payload) => (
    state.faqError = payload
  ),
  reviewError: (state, payload) => (
    state.reviewError = payload
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
