import axios from 'axios'

const HTTP =  axios.create({
  baseURL: `{process.env.MIX_APP_APIURL}`,
  delayed: true
})

const formData = new FormData()
formData.append('client_id', 2)
formData.append('client_secret', '8BSSg7qMYw2NAJaiMhQOCYxGlFSs141SLfPRLU')

HTTP.interceptors.request.use((config) => {
    if (localStorage.getItem("userauth") !== null) {
      config.headers.Authorization = `Bearer ${localStorage.getItem("userauth")}`
    }else if (localStorage.getItem('token') != null) {
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

HTTP.interceptors.response.use(function (response) {
  return response
}, function (error) {
  return Promise.reject(error)
})

export default HTTP
