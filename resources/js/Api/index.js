import axios from 'axios'

const API =  axios.create({
  baseURL: `{process.env.MIX_APP_APIURL}`
})

API.interceptors.request.use((config) => {
    if (localStorage.getItem("token") !== null) {
      config.headers.Token = `${localStorage.getItem('token')}`
    }
    return config
  }, function (error) {
    return Promise.reject(error)
  })


  API.interceptors.response.use(function (response) {
    return response
  }, function (error) {
    return Promise.reject(error)
  })

export default API
