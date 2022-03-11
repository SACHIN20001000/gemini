import HTTP from './../../Api/auth'

const state = {
  catErrors: [],
  categories:[],
  category:[],
  listPages:[],
  singlePage:[],
  pageErrors:[],
  products:[],
  product:[],
  cartToken:[],
  productErrors:[],
  productsByCategory:[],
  stores:[]
}

const getters = {
  categories: state => state.categories,
  catErrors: state => state.catErrors,
  category: state => state.category,
  listPages: state => state.listPages,
  singlePage: state => state.singlePage,
  pageErrors: state => state.pageErrors,
  products: state => state.products,
  product: state => state.product,
  cartToken: state => state.cartToken,
  productErrors: state => state.productErrors,
  productsByCategory: state => state.productsByCategory,
  stores: state => state.stores
}

const actions = {
  async getCategories({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+"categories").then((response) => {
      commit("getCategories", response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
    })
  },
  async getCategory({commit},id){
    HTTP.get(process.env.MIX_APP_APIURL+"categories/"+id).then((response) => {
      commit("getCategory", response.data.data)
    }).catch((errors) => {
      commit("catErrors", errors.response.data.message)
    })
  },
  async getPages({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+"pages").then((response) => {
      commit("getPages", response.data.data)
    }).catch((errors) => {
      commit("pageErrors", errors.response.data.message)
    })
  },
  async getPage({commit},id){
    HTTP.get(process.env.MIX_APP_APIURL+"pages/"+id).then((response) => {
      commit("getPage", response.data.data)
    }).catch((errors) => {
      commit("pageErrors", errors.response.data.message)
    })
  },
  async getProducts({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+"products").then((response) => {
      commit("getProducts", response.data.data)
    }).catch((errors) => {
      commit("productErrors", errors.response.data.message)
    })
  },
  async getProduct({commit},id){
    HTTP.get(process.env.MIX_APP_APIURL+"products/"+id).then((response) => {
      commit("getProduct", response.data.data)
    }).catch((errors) => {
      commit("productErrors", errors.response.data.message)
    })
  },
  async getCartToken({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+"cart").then((response) => {
      commit("getCartToken", response.data.data)
      const cartToken = response.data.data;
      console.log(cartToken);
      if(cartToken.key){
        localStorage.setItem('cartKey', cartToken.key)
        localStorage.setItem('cartId', cartToken.id)
      }
    }).catch((errors) => {
      commit("pageErrors", errors.response.data.message)
    })
  },
  async getProductsByCategory({commit},cartId){
    HTTP.get(process.env.MIX_APP_APIURL+'products/category/'+cartId).then((response) => {
      commit("getProductsCategory", response.data.data)
    }).catch((errors) => {
      commit("productErrors", errors.response.data.message)
    })
  },
  getStores({commit}){
    HTTP.get(process.env.MIX_APP_APIURL+'stores').then((response) => {
      commit("getStores", response.data.data)
    }).catch((errors) => {
      commit("productErrors", errors.response.data.message)
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
  ),
  getProducts: (state, products) => (
    state.products = products
  ),
  getProduct: (state, product) => (
    state.product = product
  ),
  getCartToken: (state, payload) => (
    state.cartToken = payload
  ),
  productErrors: (state, payload) => (
    state.productErrors = payload
  ),
  getProductsCategory: (state, payload) => (
    state.productsByCategory = payload
  ),
  getStores: (state, payload) => (
    state.stores = payload
  )
}

export default {
    state,
    getters,
    actions,
    mutations
}
