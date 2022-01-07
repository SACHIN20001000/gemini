import axios from 'axios'

const API =  axios.create({
  baseURL: `{process.env.MIX_APP_APIURL}`,
  delayed: true
})

const formData = new FormData()
formData.append('client_id', 2)
formData.append('client_secret', '8BSSg7qMYw2NAJaiMhQOCYxGlFSs141SLfPRLU')

API.interceptors.request.use((config) => {
    if (localStorage.getItem("token") !== null) {
      config.headers.Token = `${localStorage.getItem('token')}`
    } else {
      if (config.delayed) {
         return new Promise(resolve => setTimeout(function(){
           config.headers.Token = `${localStorage.getItem('token')}`
           resolve(config)}, 2000)
         );
      }
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
