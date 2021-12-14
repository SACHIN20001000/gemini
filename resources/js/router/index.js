import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../components/Dashboard'
import Home from "../components/Home";
import Register from "../components/Register";
import Login from "../components/Register/Login";
import Profile from "../components/Profile";

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
	},
	{
		path: '/register',
		// beforeEnter : guardMyroute,
		name: 'Register',
		component: Register
	},
	{
		path: '/signin',
		// beforeEnter : guardMyroute,
		name: 'Login',
		component: Login
	},
	{
		path: '/profile',
		// beforeEnter : guardMyroute,
		name: 'Profile',
		component: Profile
	}
]
})
