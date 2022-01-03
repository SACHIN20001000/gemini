import axios from 'axios'

const HTTP =  axios.create({
  baseURL: `{process.env.MIX_APP_APIURL}`
})

const formData = new FormData()
formData.append('client_id', 2)
formData.append('client_secret', '8BSSg7qMYw2NAJaiMhQOCYxGlFSs141SLfPRLU')

HTTP.interceptors.request.use((config) => {
    if (localStorage.getItem("userauth") !== null) {
      config.headers.Authorization = `Bearer ${localStorage.getItem("userauth")}`
    }else if (localStorage.getItem('token') != null) {
      config.headers.Token = `${localStorage.getItem('token')}`
    }else {
      config.headers.Token = getTokenResponse()
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

async function getTokenResponse(){
  await axios.post(process.env.MIX_APP_APIURL+'oauth/token', formData).then((response) => {
    localStorage.setItem('token', response.data.Token)
    return response.data.Token
  }).catch(() => {
    return ''
  })
}
/*function getWithExpiry(key) {
	const itemStr = localStorage.getItem(key)
	if (!itemStr) {
		return null
	}
	const item = JSON.parse(itemStr)
	const now = new Date()
	const currentime = now.getTime()/1000
  const expire_at = item.expiry
	if (currentime >expire_at) {
		localStorage.removeItem(key)
		localStorage.removeItem('user')
		localStorage.removeItem('token')
		return null
	}

	return item.value
}*/
export default HTTP
