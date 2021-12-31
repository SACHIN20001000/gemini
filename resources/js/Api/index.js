import axios from 'axios'

const API =  axios.create({
  baseURL: `{process.env.MIX_APP_APIURL}`
})

const formData = new FormData()
formData.append('client_id', 2)
formData.append('client_secret', '8BSSg7qMYw2NAJaiMhQOCYxGlFSs141SLfPRLU')

API.interceptors.request.use((config) => {
    if (localStorage.getItem("token") !== null) {
      config.headers.Token = `${localStorage.getItem('token')}`
    }else{
      axios.post(process.env.MIX_APP_APIURL+'oauth/token', formData).then((response) => {
        localStorage.setItem('token', response.data.Token)
        config.headers.Token = `${response.data.Token}`
      }).catch(() => {
        config.headers.Token =''
      })
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
