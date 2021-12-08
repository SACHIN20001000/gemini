<template>
  <header>
    <div class="logo_nav">
      <a class="navbar-brand" href="#">
        <img
          :src="imgLogo"
          alt="logo"
        />
      </a>
      <div class="right_info">
        <div class="search_bar">
          <form class="srch_form">
            <input type="text" name="search" placeholder="Search">
            <input type="submit" value="">
          </form>
        </div>
        <div class="profile_bar">
          <div class="pr_img">
            <img
              :src="imgProfile"
              alt="Profile"
            >
          </div>
          <div class="pr_info">
            <label>Susan M.</label>
            <a href="#">MY PROFILE</a>
          </div>
        </div>
        <div class="cart_bar">
          <a href="#">
            <img
              :src="imgCartIcon"
              alt="Cart Icon"
            >
            <span class="cart_items">3</span>
          </a>
        </div>
      </div>
    </div>
    <div class="top_devider"></div>
    <div class="menu_nav">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link " aria-current="page" href="#">SHOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">SERVICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ABOUT US </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">SUBSCRIPTION PAWGRAM®</a>
              </li>
              <li class="nav-item">
                <a class="nav-link "  href="#">PET PARENTS+® </a>
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
              <li class="nav-item">
                <a class="nav-link" href="#">HELP</a>
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
import imgProfile from "../../assets/images/profile.png"
import imgCartIcon from "../../assets/images/cart_icon.png"
import imgDownload from "../../assets/images/download.png"
export default {
  name:"Dashboard",
  data: function () {
    return {
      imgLogo: imgLogo,
      imgProfile: imgProfile,
      imgCartIcon: imgCartIcon,
      imgDownload: imgDownload
    }
  }
}
</script>
