<template>
  <header>
    <div class="logo_nav">
      <router-link
        :to="{ path: '/'}"
        class="navbar-brand"
      >
        <img
          :src="imgLogo"
          alt="logo"
        />
      </router-link>
      <div class="right_info">
        <div class="search_bar">
        <div class="mobil_searc mobil_only">
          <a href="#">
            <img
              :src="search_mobile"
              alt="search_mobile"
            />
          </a>
          </div>
          <form class="srch_form desk_only">
            <input type="text" name="search" placeholder="Search">
            <input type="submit" value="">
          </form>
        </div>

        <div class="profile_bar" v-if="token && token != null && accountDetails">
          <div class="pr_img">
            <img
              :src="accountDetails.profile_image"
              alt="Profile"
              width="50px"
            >
          </div>
          <div class="pr_info">
            <label>{{accountDetails.name}}</label>
            <div class="dropdown">


            <router-link
              :to="{ path: '/profile'}"
              class="alink dropdown-toggle"
              type="button"
              id="dropdownMenuButton1"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              MY PROFILE
            </router-link>

              <ul class="dropdown-menu profile_drop" aria-labelledby="dropdownMenuButton1">
                <li>
                  <router-link
                  :to="{ path: '/profile'}"
                  class="alink"
                  >
                  MY ACCOUNT
                  </router-link>
                  </li>

                <li>
                  <router-link
                  :to="{ path: '/signout'}"
                  class="alink"
                  >
                  LogOut
                  </router-link>
                </li>
              </ul>
            </div>

          </div>
        </div>
        <div class="profile_bar" v-else>
          <div class="btn_log_sign">
            <router-link
              :to="{ path: '/signin'}"
              class="alink log_btn"
            >
              Login
            </router-link>

            <router-link
              :to="{ path: '/register'}"
              class="alink sign_btn"
            >
              register
            </router-link>
          </div>
        </div>
        <div class="cart_bar">
          <router-link
            :to="{ path: '/cart'}"
          >
            <img
              :src="imgCartIcon"
              alt="Cart Icon"
            >
            <span class="cart_items">{{cartQuantity}}</span>
          </router-link>
        </div>
         <div class="menu_btn mobil_only">
        <a class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <img :src="menuLines" />
          </a>
          </div>
      </div>
    </div>
    <div class="top_devider"></div>
    <div class="menu_nav">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#">SHOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">SERVICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ABOUT US </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">SUBSCRIPTION PAWGRAM<sup>®</sup></a>
              </li>
              <li class="nav-item">
                <a class="nav-link "  href="#">PET PARENTS+<sup>®</sup> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">APP
                  <img
                    :src="imgDownload"
                    alt="Download"
                  >
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">LEARN</a>
              </li>
              <li class="nav-item lb_no">
                <a class="nav-link" href="#">HELP</a>
              </li>
               </li>
              <li class="nav-item nv mobil_only">
                <router-link
                  :to="{ path: '/signin'}"
                  class="alink log_btn"
                >
                  Login
                </router-link>

                <li class="nav-itemnv mobil_only">
                <router-link
              :to="{ path: '/register'}"
              class="alink sign_btn"
            >
              register
            </router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
</template>
<style>
  @import './header.css';
</style>
<script>
import imgLogo from "../../assets/images/logo.png"
import imgCartIcon from "../../assets/images/cart_icon.png"
import search_mobile from "../../assets/images/search_mobile.png"
import menuLines from "../../assets/images/menu_lines.svg"
import imgDownload from "../../assets/images/download.png"
import {mapActions,mapGetters} from "vuex"

export default {
  name:"Dashboard",
  data: function () {
    return {
      imgLogo: imgLogo,
      imgCartIcon: imgCartIcon,
      search_mobile: search_mobile,
      menuLines: menuLines,
      imgDownload: imgDownload,
      token: localStorage.getItem('userauth')
    }
  },
  created(){
    if(localStorage.getItem('cartKey') != null){
      this.getCartItems()
      if(localStorage.getItem('userauth')){
        this.getProfile()
      }
    }
  },
  computed: {
    ...mapGetters(['cartQuantity','accountDetails'])
  },
  methods: {
    ...mapActions(['getCartItems','getProfile'])
  }
}
</script>
