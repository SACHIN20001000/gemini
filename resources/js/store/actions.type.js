import API from '../Api'


const formData = new FormData()
formData.append('client_id', 2)
formData.append('client_secret', '8BSSg7qMYw2NAJaiMhQOCYxGlFSs141SLfPRLU')


var getToken = function () {
    API.post(process.env.MIX_APP_APIURL+'oauth/token', formData).then((response) => {
      localStorage.setItem('token', response.data.Token)
      return response.data.Token
    }).catch(() => {
      localStorage.setItem('token', null)
      return ''
    })
  }

export default getToken
