import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../components/Dashboard'
import Home from "../components/Home";

Vue.use(VueRouter)

// function guardMyroute(to, from, next)
// {
// 	return true
// }
//
// function restricatedmyRoute(to, from, next){
// 		return true
// }

export default new VueRouter({
	mode: 'history',
routes: [
  {
		path: '/',
		// beforeEnter : guardMyroute,
		name: 'Home',
		component: Home
	},
	{
		path: '/dashboard',
		// beforeEnter : guardMyroute,
		name: 'Dashboard',
		component: Dashboard
	}
]
})
