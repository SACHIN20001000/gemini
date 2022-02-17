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
            <a href="javascript:;" @click="searchMobilePopup">
              <img
                :src="search_mobile"
                alt="search_mobile"
              />
            </a>
          </div>

            <div class="mob_serach_window"
              :class="searchactive"
            >
            <div class="s_warpper">
              <div class="form_search">
                <form>
                 <div class="srch_wrap">
                  <input type="serach" class="srch_input">
                  <button>
                    <img
                    :src="search_mobile"
                    alt="search_mobile"
                    />
                  </button>
                 </div>
                   <a href="javascript:;" @click="searchMobilePopup">
               <img :src="m_close">
            </a>
                </form>
              </div>
              <div class="serch_items">
                <p> Popular Search Terms</p>
                <ul>
                 <li><a href="#">dog clean</a></li>
                 <li><a href="#">diaper</a></li>
                 <li><a href="#">home clean</a></li>
                 <li><a href="#">blankets</a></li>
                 ...
                </ul>
              </div>
            </div>
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
            <div class="dropdownlogin"  @mouseleave="profilePopupClose($event)">
            <a
              href="javascript:;"
              class="alink"
              @click="myProfile('')"
            >
              MY PROFILE
            </a>
              <ul class="profile_drop" v-if="myProfileActive"  @mouseleave="closePopupWin()">
                <li>
                  <a
                  class="alink dropdown-item"
                  @click="myProfile('profile')"
                  href="javascript:;"
                  >
                    MY ACCOUNT
                  </a>
                </li>
                <li>
                  <a
                    class="alink dropdown-item"
                    @click="myProfile('signout')"
                  >
                    LogOut
                  </a>
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
              <MenuBurger @handleBurgerClicked="clickBurger" />
              <MenuShadow :isActive="isActive" :handleShadowClicked="clickShadow" />
              <div class="Menu__panel-wrapper"
                 :class="{'isActive': isActive}"
                 :style="[style_wrapperStyle, isActive ? style_wrapperActiveStyle : {}]"
              >
              <!-- prev -->
                <!--<a href="javascript:;" class="btn_bck"  @click="clickBurger"> <img :src="m_close"></a>-->
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
      m_close:m_close,
      myProfileActive: false,
      activeSearchMob: false,
      searchactive:'searchide'
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
    this.content_currentItem = this.source
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
            this.setTranslating(false)
            this.panel_homingPosition()
            this.content_homingItemAfterBack()
        }, this.menuSwitchSpeed)
    },

    // utils
    setTranslating(status) {
        this.isTranslating = status;
    },
    myProfile(urllink){
      this.myProfileActive = !this.myProfileActive
      if(urllink !=''){
        this.$router.push('/'+urllink)
      }
    },
    searchMobilePopup(){
      this.activeSearchMob = !this.activeSearchMob
      if(this.activeSearchMob){
        this.searchactive = 'searchactive'
      }else{
        this.searchactive = 'searchide'
      }
    },
    closePopupWin(){
      this.myProfileActive=false
    },
    profilePopupClose(en){
      if(en.relatedTarget){
        if(en.relatedTarget._prevClass !='profile_bar'){
          this.closePopupWin()
        }
      }
    }
  }
}
</script>
