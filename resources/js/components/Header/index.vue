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
      <div class="right_info">        <div class="search_bar">
         
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
              data-toggle="dropdown"
              aria-haspopup="true"
            >
              MY PROFILE
            </router-link>
              <ul class="dropdown-menu profile_drop" aria-labelledby="dropdownMenuButton1">
                <li>
                  <router-link
                  :to="{ path: '/profile'}"
                  class="alink dropdown-item"
                  >
                  MY ACCOUNT
                  </router-link>
                </li>
                <li>
                  <router-link
                  :to="{ path: '/signout'}"
                  class="alink dropdown-item"
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
        <!-- <div class="menu_btn mobil_only">
        <a class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <img :src="menuLines" />
          </a>
          </div>-->
           <div class="Menu">
              <MenuBurger :handleBurgerClicked="clickBurger" />
              <MenuShadow :isActive="isActive" :handleShadowClicked="clickShadow" />
              <div class="Menu__panel-wrapper"
                 :class="{'isActive': isActive}"
                 :style="[style_wrapperStyle, isActive ? style_wrapperActiveStyle : {}]"
              >
              <!-- prev -->
                <a href="#" class="btn_bck"  @click="clickBurger"> <img :src="m_close"></a>
                <MenuPanel
                   :list="content_prevItem"
                   :functionalityStyle="style_panelStyle"
                   :positionStyle="panel_prevPositionStyle"
                   :isTranslating="isTranslating"
                   :transitionStyle="style_transitionStyle"
                   :showHeaderArrow="prevItemHasParent"
                />
                <!-- staging -->
                <MenuPanel
                   :list="content_currentItem"
                   :functionalityStyle="style_panelStyle"
                   :positionStyle="panel_stagingPositionStyle"
                   :isTranslating="isTranslating"
                   :transitionStyle="style_transitionStyle"
                   :showHeaderArrow="currentItemHasParent"
                   :handleHeaderClicked="clickPrevItem"
                   :handleItemClicked="clickNextItem"
                />
                <!-- next -->
                <MenuPanel
                   :list="content_nextItem"
                   :functionalityStyle="style_panelStyle"
                   :positionStyle="panel_nextPositionStyle"
                   :isTranslating="isTranslating"
                   :transitionStyle="style_transitionStyle"
                   :showHeaderArrow="true"
                />
              </div>
            </div>
      </div>
    </div>
    <div class="top_devider"></div>
    <NavBar />
  </header>
</template>
<style>
  @import './header.css';
  .viewport-warning {
      display: none !important;
  }

  .lv_0 a, .lv_0 {
      font-size: 30px;
      font-weight: 700;
      color: #9d9d9c !important;
  }
  .bottom_menu ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: block;
      clear: both;
          padding:  0 20px;
      position: absolute;
      bottom: 40px;
  }
  .Menu__list
  {padding:  0 20px !important;}

   .Menu__list li {  padding: 0!important;}
  .bottom_menu ul li a {
      font-size: 17px;
      text-decoration: none;
      color: #9d9d9c;
      font-weight: 400;
      position: relative;
      line-height: 41px;
  }
  .lv_0:before {
      content: "";
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
      border-left: 10px solid #00b3ba;
      position: absolute;
      right: 25px;
  }
  li.Menu__item.lv_1:before,li.Menu__item.lv_2:before  {
      content: "";
      border-top: 5px solid transparent;
      border-bottom: 5px solid transparent;
      border-left: 7px solid #00b3ba;
      position: absolute;
      right: 25px;
  }
  .Menu__header .arrow {
      display: none !important;
  }
  .Menu__panel {
      padding-top: 30px;
  }
  .Menu__header {
      padding: 20px !important;
      font-size: 24px !important;
      font-weight: 700;
      margin: 10px 0 0 0 !important;
      color: #9d9d9c !important;
  }
  .bottom_menu ul li a img {
      margin-right: 10px;
      display: inline-block;
  }
  ul.Menu__list>.lv_0:first-child {
      margin-top: 10px !important;
  }
  .lv_0:after ,li.Menu__item.lv_1:after,li.Menu__item.lv_2:after{
      content: "";
      flex-grow: 1;
      height: 1px;
      background: #ededed;
      margin:0 20px 0 10px;
  }
  .lv_0 a, .lv_0 {
      font-size: 24px;
      font-weight: 700;
      color: #9d9d9c !important;
      margin: 30px 0 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between;

  }
  li.Menu__item.lv_1 a, li.Menu__item.lv_1 ,li.Menu__item.lv_2 a, li.Menu__item.lv_2 {
      font-size: 18px;
      color: #9d9d9c;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between;
      font-weight: 500;
      line-height: 1.9 !important;
      height: auto;
  }
  .back_prev {
      display: flex;
      justify-content: space-between;
      padding: 0 20px;
  }
  .bottom_menu ul li a span {
      display: inline-block;
      width: 45px;
  }
</style>
<script>
import imgLogo from "../../assets/images/logo.png"
import imgCartIcon from "../../assets/images/cart_icon.png"
import search_mobile from "../../assets/images/search_mobile.png"
import menuLines from "../../assets/images/menu_lines.svg"
import imgDownload from "../../assets/images/download.png"
import {mapActions,mapGetters} from "vuex"
import NavBar from "../NavBar"

import demoData from '../../demo-data.js';
import functionalityStyle from '../mixins/functionalityStyle.mixin';
import panelControl from '../mixins/panelControl.mixin';
import contentControl from '../mixins/contentControl.mixin';
import RightArrowIcon from '../icons/RightArrowIcon.vue';
import LeftArrowIcon from '../icons/LeftArrowIcon.vue';
import MenuBurger from '../MenuBurger.vue';
import MenuShadow from '../MenuShadow.vue';
import MenuPanel from '../MenuPanel.vue';
import m_close from "../../assets/images/m_close.png";

export default {
  name:"Dashboard",
  mixins: [
      functionalityStyle,
      panelControl,
      contentControl,
  ],
  components: {
    NavBar,
    RightArrowIcon,
    LeftArrowIcon,
    MenuBurger,
    MenuShadow,
    MenuPanel,
  },
  props: {
    source: {
        type: Object,
        default: () => demoData,
    },
    panelWidth: {
        type: Number,
        default: 300,
    },
    menuOpenSpeed: {
        type: Number,
        default: 350,
    },
    menuSwitchSpeed: {
        type: Number,
        default: 300,
    },
  },
  data: function () {
    return {
      imgLogo: imgLogo,
      imgCartIcon: imgCartIcon,
      search_mobile: search_mobile,
      menuLines: menuLines,
      imgDownload: imgDownload,
      token: localStorage.getItem('userauth'),
      isActive: false,
      isTranslating: false,
      m_close:m_close
    }
  },
  watch:{
    list(){
      this.content_currentItem = this.source
    }
  },
  created(){
    this.cartInfoupdate()
  },
  mounted() {
    this.content_currentItem = this.source;
  },
  computed: {
    ...mapGetters(['cartQuantity','accountDetails']),
    currentItemHasParent() {
      return this.content_parentStack.length >= 1
    },
    prevItemHasParent() {
      return this.content_parentStack.length >= 2
    }
  },
  methods: {
    ...mapActions(['getCartItems','getProfile']),
    cartInfoupdate(){
      if(localStorage.getItem('cartKey') != null){
        this.getCartItems()
        if(localStorage.getItem('userauth')){
          this.getProfile()
        }
      }
    },
    clickBurger() {
    		this.isActive = !this.isActive;
    },
    clickShadow() {
        this.isActive = false;
    },
    clickNextItem(targetItem) {

        if (this.isTranslating || targetItem.children.length <= 0) {
            return;
        }

        this.slideToNext(targetItem);
    },
    clickPrevItem() {

        if (this.isTranslating || !this.currentItemHasParent) {
            return;
        }

        this.slideToPrev();
    },

    /*
     * main part of core
     * definite of how to handle panel sliding and item updating
     */
    slideToNext(targetItem) {

        // set target item as content of next panel
        this.content_setNextItem(targetItem);

        // switch animation on
        this.setTranslating(true);

        // activate panel sliding with animation after `.translating` class has updated to panel dom.
        this.$nextTick(() => {
            this.panel_slideNext();
        });

        // reset panel position
        this.homingAfterTranslatingNext();
    },
    slideToPrev() {

        // set prev item which is the parent of the current item.
        this.content_setPrevItem();

        // switch animation on
        this.setTranslating(true);

        // activate panel sliding with animation after `.translating` class has updated to panel dom.
        this.$nextTick(() => {
            this.panel_slideBack();
        });

        // reset panel position
        this.homingAfterTranslatingBack();
    },

    // handle homing after slide animation end
    homingAfterTranslatingNext() {
        setTimeout(() => {

            // switch off transition state of panel
            this.setTranslating(false);

            // push current to parent stack
            this.content_pushCurrentToParentStack();

            // homing
            this.panel_homingPosition(); // reset panel position just like the beginning.
            this.content_homingItemAfterNext(); // change item between these panels to meet updated panel position.
        }, this.menuSwitchSpeed);
    },
    homingAfterTranslatingBack() {
        setTimeout(() => {
            this.setTranslating(false);

            // homing
            this.panel_homingPosition();
            this.content_homingItemAfterBack();
        }, this.menuSwitchSpeed);
    },

    // utils
    setTranslating(status) {
        this.isTranslating = status;
    }
  }
}
</script>
