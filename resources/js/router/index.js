import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../components/Dashboard'
import Home from "../components/Home";
import Register from "../components/Register";
import Login from "../components/Register/Login";
import Logout from "../components/Register/Logout";
import Profile from "../components/Profile";
import Category from "../components/Category";
import Blog from "../components/Blog";
import Products from "../components/Products";
import Cart from "../components/Cart";
import Checkout from "../components/Checkout";
import Payment from "../components/Payment";
import Chowhub from "../components/Chowhub";
import Litterhub from "../components/Litterhub";
import Brand from "../components/Brands";

Vue.use(VueRouter)

function guardMyroute(to, from, next)
{
	if(localStorage.getItem('token') && localStorage.getItem('token') !=null){
		next()
	}else{
		window.location.href='/'
		return
	}
}
function loginRoute(to, from, next)
{
	if(localStorage.getItem('userauth') && localStorage.getItem('userauth') !=null){
		next()
	}else{
		window.location.href='/signin'
		return
	}
}
/*function withOutToken(to, from, next)
{
	if(localStorage.getItem('token') && localStorage.getItem('token') !=null){
    window.location.href='/'
		return
	}else{
    next()
	}
}*/
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
      path: '/category/:slug',
      beforeEnter : guardMyroute,
      name: 'Category',
      component: Category
    },
    {
      path: '/products/:slug/:id',
      beforeEnter : guardMyroute,
      name: 'Products',
      component: Products
    },
    {
      path: '/cart',
      beforeEnter : guardMyroute,
      name: 'Cart',
      component: Cart
    },
    {
      path: '/payment',
      beforeEnter : guardMyroute,
      name: 'Payment',
      component: Payment
    },
    {
      path: '/checkout',
      beforeEnter : guardMyroute,
      name: 'Checkout',
      component: Checkout
    },
    {
      path: '/blog/:slug',
      beforeEnter : guardMyroute,
      name: 'Blog',
      component: Blog
    },
    {
      path: '/dashboard',
      beforeEnter : loginRoute,
      name: 'Dashboard',
      component: Dashboard
    },
    {
      path: '/register',
      beforeEnter : guardMyroute,
      name: 'Register',
      component: Register
    },
    {
      path: '/signin',
      beforeEnter : guardMyroute,
      name: 'Login',
      component: Login
    },
    {
      path: '/profile',
      beforeEnter : loginRoute,
      name: 'Profile',
      component: Profile
    },
    {
      path: '/signout',
      // beforeEnter : guardMyroute,
      name: 'Logout',
      component: Logout
    },
    {
      path: '/brand/:brandid',
      beforeEnter : guardMyroute,
      name: 'Brand',
      component: Brand
    },
    {
      path: '/chowhub/:cartid/:cartkey',
      beforeEnter : guardMyroute,
      name: 'Chowhub',
      component: Chowhub
    },
    {
      path: '/litterhub/:cartid/:cartkey',
      beforeEnter : guardMyroute,
      name: 'Litterhub',
      component: Litterhub
    }
  ],
  scrollBehavior() {
    window.scrollTo(0, 0)
  }
})
