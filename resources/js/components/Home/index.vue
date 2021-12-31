<template>
  <div class="main">
    <!--<div id="map" v-cloak>
      <p>
        Let us locate you for better results...
        <button @click="locateMe">Get location</button>
      </p>
      <div v-if="errorStr">
        Sorry, but the following error
        occurred: {{errorStr}}
      </div>
      <div v-if="gettingLocation">
        <i>Getting your location...</i>
      </div>
      <div v-if="location">
        Your location data is {{ location.coords.latitude }}, {{ location.coords.longitude}}
      </div>
    </div>-->
    <div class="free_ship_bar">
      <p>
        <img
          :src="imgShip"
          alt="Ship"
        >
        Free Shipping on All U.S. Orders Over <b>$49</b>
      </p>
    </div>
    <section class="banner_sec">
      <div class="container_max">
        <div class="row">
          <div class="col-md-5 baner_1">
            <div class="banner_top">
              <span>LIMITED EDITION</span>
              <h2>DITCH HELLO<br>
              <span class="blu">SAY ALOHA</span></h2>
              <label>DIAPER & BELLY BAND <span>PACK</span></label>
              <div class="btn_orng">
                <a href="#">LEARN MORE</a>
              </div>
            </div>
          </div>
          <div class="col-md-7">
          <img
            :src="imgPro1"
            alt="Pro1"
          >
          </div>
        </div>
      </div>
    </section>
    <section class="treat_sec">
      <div class="container_max">
        <div class="row grid_4">
        <div
          v-for="(firstCatbanner, keycat) in firstCatbanners"
          :key="keycat"
          class="col-md-6"
          :class="'img_topbanner_bg_'+keycat"
        >
          <router-link
            :to="{ path: 'category/'+firstCatbanner.slug}"
          >
            <img
              :src="firstCatbanner.feature_image"
              alt="Treats"
            >
            <h2>{{firstCatbanner.name}}</h2>
          </router-link>
        </div>
        </div>
      </div>
    </section>
    <section class="product_slider">
      <div class="container_max">
        <div
          class="row regular slider margin_row"
          v-if="categories && categories.length>0"
        >
          <slick
            ref="slick"
            :options="slickOptions"
          >
            <div
              class="category_loop"
              v-for="(category,catbkey) in categories"  :key="catbkey"
            >
              <router-link
                :to="{ path: 'category/'+category.slug}"
              >
                <img
                  :src="category.feature_image"
                  :alt="category.name"
                >
                <h3>{{category.name}}</h3>
              </router-link>
            </div>
          </slick>
        </div>
      </div>
    </section>
    <section class="two_img">
      <div class="container_max">
        <div class="row pad_15">
          <div
            class="col-md-6 txt_over"
            v-for="(category, key) in categories"
            :key="key"
          >
            <router-link
              v-if="key<2"
              :to="{ path: 'category/'+category.slug}"
            >
              <img
                :src="category.feature_image"
                alt="Dog"
              >
              <h2>{{category.name}}</h2>
            </router-link>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container_max">
        <div class="row">
          <div class="col-md-4 gb_box">
            <a href="#" class="img_box1 gray_panel">
              <h3>GET THE <span class="re_d">APP</span></h3>
              <img
                :src="imgIos"
                alt="ios"
              >
            </a>
          </div>
          <div class="col-md-4 gb_box">
            <a href="#" class="img_box2 gray_panel">
              <h3>Curbside <span  class="re_d">Pickup</span></h3>
              <img
                src="imgBag"
                 :src="imgBag"
                alt=""
              >
            </a>
          </div>
          <div class="col-md-4 gb_box">
            <div class="img_box3 gray_panel">
              <div class="wrp">
                <h3>PET PARENTS<span class="re_d">+</span>®</h3>
                <a href="min_a">Learn More</a>
              </div>
              <img
                :src="imgPawP"
                alt="pawP"
              >
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="two_img rd_blue">
      <div class="container_max">
        <div class="row pad_15">
          <div class="col-md-6 red_box">
            <div class="con_box rect">
              <div>
                <img
                  :src="imgMonk"
                  alt="Monk"
                >
                <h2>SUMMER <span>TOYS</span></h2>
                <a href="#">Learn More</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 blue_box">
            <div class="con_box rect">
              <div>
                <h2>
                  <span>Day</span>Spaw<sup>™</sup>
                </h2>
                <p>
                  <a href="#">Schedule</a> your appointment today
                </p>
                <img
                  :src="imgBath"
                  alt="Bath"
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cart_slider">
      <div class="container_max">
        <h1 class="line_heading">Sale</h1>
        <ul
          class="row cart_slide slider margin_row"
          v-if="products.length>0"
        >
          <slick
            ref="productPanel"
            :options="productPanelOptions"
            @afterChange="handleAfterChange"
            @beforeChange="handleBeforeChange"
            @breakpoint="handleBreakpoint"
            @destroy="handleDestroy"
            @edge="handleEdge"
            @init="handleInit"
            @reInit="handleReInit"
            @setPosition="handleSetPosition"
            @swipe="handleSwipe"
            @lazyLoaded="handleLazyLoaded"
            @lazyLoadError="handleLazeLoadError"
          >
            <li v-for="(product,pkey) in products"  :key="pkey">
              <div class="product_panel">
                <div class="prod_img" v-if="product.gallary[0]">
                  <img
                    :src="product.gallary[0].image_path"
                    alt="Pro5"
                  >
                </div>
                <div class="prod_details">
                  <div class="rat_ing">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <router-link
                    :to="{ path: 'products/'+product.id}"
                  >
                    <h5>{{product.name}} </h5>
                  </router-link>
                  <div class="cart_flex">
                     <h3>${{product.sale_price}}<sup></sup></h3>
                    <a href="javascript:;" @click="addItemInCart(product.id)">Add To cart</a>
                  </div>
                </div>
                <label class="sale_tag">Sale</label>
              </div>
            </li>
          </slick>
        </ul>
      </div>
    </section>
    <section class="duo_banner">
      <div class="container_max">
        <div class="row">
          <div class="col-md-6">
            <div class="height_mix">
              <div class="sub_1">
                <h1>SUBSCRIPTION <span>PAWGRAM<sup>®</sup></span></h1>
                <p>Convenience + Savings. Yes please.</p>
                <a href="#">Learn More</a>
                <img
                  :src="imgGnaw"
                  alt="Gnaw"
                >
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="height_mix">
              <img
                :src="imgHeat"
                alt="heat"
              >
              <div class="sub_2">
                <div class="over_red">
                  <small>LATEST BLOG POST</small>
                  <h2>Heart Diseases in Dogs</h2>
                  <a href="#">Continue Reading</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="Keep_touch">
      <div class="container_min">
        <div class="row">
          <div class="col-md-2">
            <img
              :src="imgTouch"
              alt="Touch"
              class="desk_only"
            >
              <img
              :src="imgTouch2"
              alt="Touch2"
              class="mobil_only"
            >
          </div>
          <div class="col-md-6 form_text text-center form_mobile">
            <h1>
              Keep <span class="thin">in</span>
              <span class="re_d">Touch</span>
            </h1>
            <p>Stay up to date with the latest sales, new products, and special events.</p>
             <form class="mobil_only"> <div class="from_grp"><input type="text" placeholder="Enter Your Email"></div></form>
          </div>
          <div class="col-md-4 desk_only">
            <form class="touch_form">
              <div class="from_grp">
                <input type="text" placeholder="First Name">
              </div>
              <div class="from_grp">
                <input type="text" placeholder="Last Name">
              </div>
              <div class="from_grp radio_check">
                <span>
                  <input type="radio" name="cat">Cat
                </span>
                <span>
                  <input type="radio" name="dog">Dog
                </span>
              </div>
              <div class="from_grp">
                <input type="Email" placeholder="Enter your Email">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="xl_sec">
      <img
        :src="imgBg2"
        alt="bg2"
        class="desk_only"
      >
       <img
        :src="imgBg3"
        alt="bg2"
        class="mobil_only"
      >
      <div class="container_max ab_over">
        <div class="row">
          <div class="col-md-5 offset-md-7">
            <div class="div_center">
              <h3 class="lab_22">The <b>Pet Parents<sup>®</sup></b> Store <label>XL</label></h3>
              <p class="p_16">All you need, In one place.</p>
              <a href="#" class="btn_grn">Learn more</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="insta_Sec">
      <div class="container_max">
        <h3 class="insta_head"><span>@pet.parents</span></h3>
        <ul class="insta_nails" v-if="listPages">
          <li
            v-for="(listPage,pkey) in listPages"  :key="pkey"
          >
          <router-link
            :to="{ path: 'blog/'+listPage.slug}"
          >
            <span>
              <img
                :src="listPage.feature_image"
                alt="listPage.title"
              >
            </span>
          </router-link>
          </li>
        </ul>
      </div>
    </section>
  </div>
</template>
<style>
  @import './home.css';
  @import './slick.css';
</style>
<script>
import imgShip from "../../assets/images/ship.png"
import imgPro1 from "../../assets/images/pro1.png"
import imgSl1 from "../../assets/images/sl1.jpg"
import imgSl2 from "../../assets/images/sl2.jpg"
import imgSl3 from "../../assets/images/sl3.jpg"
import imgIos from "../../assets/images/ios.png"
import imgBag from "../../assets/images/bag.png"
import imgPawP from "../../assets/images/paw_p.png"
import imgMonk from "../../assets/images/monk.png"
import imgBath from "../../assets/images/bath.jpg"
import imgGnaw from "../../assets/images/gnaw.png"
import imgHeat from "../../assets/images/heat.jpg"
import imgTouch from "../../assets/images/touch.jpg"
import imgTouch2 from "../../assets/images/mobile_contact.png"
import imgBg2 from "../../assets/images/bg2.jpg"
import imgBg3 from "../../assets/images/bg3.jpg"


import Slick from 'vue-slick'
import {mapActions,mapGetters} from "vuex"

export default {
  name:"Home",
  components: { Slick },
  data: function () {
    return {
      imgShip: imgShip,
      imgPro1: imgPro1,
      imgSl1: imgSl1,
      imgSl2: imgSl2,
      imgSl3: imgSl3,
      imgIos: imgIos,
      imgBag: imgBag,
      imgPawP: imgPawP,
      imgMonk: imgMonk,
      imgBath: imgBath,
      imgGnaw: imgGnaw,
      imgHeat: imgHeat,
      imgTouch: imgTouch,
      imgTouch2: imgTouch2,
      imgBg2: imgBg2,
      imgBg3: imgBg3,
      slickOptions: {
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 2,
		      responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 2
              }
            },

            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                centerMode: true,
		            centerPadding: '120px'

              }
            },
            {
              breakpoint: 639,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
		            centerPadding: '120px'
              }
            },
          ]
      },
      productPanelOptions: {
        slidesToShow: 5,
        infinite: true,
        slidesToScroll: 3,
		      responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 2
              }
            },

            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                centerMode: true,
		            centerPadding: '60px'
              }
            },
            {
              breakpoint: 639,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
	              centerPadding: '60px'
              }
            },
          ]
      },
      firstCatbanners:[],
      location:null,
      gettingLocation: false,
      errorStr:null
    }
  },
  created(){
    if(this.tokenStatus != null){
      this.getCategories()
      this.getProducts()
      this.getPages()
    }
  },
  mounted(){
    this.init()
    this.locateMe()
  },
  watch: {
    tokenStatus(){
      this.getCategories()
      this.getProducts()
      this.getPages()
    },
    categories(){
      const listCategories = this.categories
      var insertCat =[]
      listCategories.filter(function (category,catind) {
        category.childrens.filter(function (chilsCategory,childCatind) {
          if(childCatind < 2){
            insertCat.push(chilsCategory)
          }
        })
      })
      this.firstCatbanners=insertCat
    },
    addCartItems(){
      this.getCartItems()
    }
  },
  computed: {
    ...mapGetters(['categories','tokenStatus','listPages','products','addCartItems'])
  },
  methods: {
    ...mapActions(['getCategories','getPages','getProducts','addCartItem','getCartItems']),
    async init(){
      if(localStorage.getItem("token") && localStorage.getItem("token") !='' && localStorage.getItem("token") !='undefined'){
        /*this.getCategories()*/
      }
    },
    addItemInCart(proId){
      if(proId){
        const cartkey = localStorage.getItem('cartKey')
        const itemDetails= {
          key: cartkey,
          product_id: proId,
          quantity: 1,
          variation_product_id:0
        }
        this.addCartItem(itemDetails)

      }
    },
    async getLocation() {
      return new Promise((resolve, reject) => {

        if(!("geolocation" in navigator)) {
          reject(new Error('Geolocation is not available.'));
        }

        navigator.geolocation.getCurrentPosition(pos => {
          resolve(pos);
        }, err => {
          reject(err);
        });

      });
    },
    async locateMe() {

      this.gettingLocation = true;
      try {
        this.gettingLocation = false;
        this.location = await this.getLocation();
      } catch(e) {
        this.gettingLocation = false;
        this.errorStr = e.message;
      }

    },
    next() {
        this.$refs.slick.next()
        this.$refs.productPanel.next()
    },
    prev() {
        this.$refs.slick.prev();
        this.$refs.productPanel.prev();
    },
    reInit() {
      this.$nextTick(() => {
        this.$refs.slick.reSlick();
        this.$refs.productPanel.reSlick();
      });
    },
    handleAfterChange(event, slick, currentSlide) {
      /*console.log('handleAfterChange', event, slick, currentSlide);*/
    },
    handleBeforeChange(event, slick, currentSlide, nextSlide) {
      /*console.log('handleBeforeChange', event, slick, currentSlide, nextSlide);*/
    },
    handleBreakpoint(event, slick, breakpoint) {
      /*console.log('handleBreakpoint', event, slick, breakpoint);*/
    },
    handleDestroy(event, slick) {
      /*console.log('handleDestroy', event, slick);*/
    },
    handleEdge(event, slick, direction) {
      /*console.log('handleEdge', event, slick, direction);*/
    },
    handleInit(event, slick) {
      /*console.log('handleInit', event, slick);*/
    },
    handleReInit(event, slick) {
      /*console.log('handleReInit', event, slick);*/
    },
    handleSetPosition(event, slick) {
      /*console.log('handleSetPosition', event, slick);*/
    },
    handleSwipe(event, slick, direction) {
      /*console.log('handleSwipe', event, slick, direction);*/
    },
    handleLazyLoaded(event, slick, image, imageSource) {
      /*console.log('handleLazyLoaded', event, slick, image, imageSource);*/
    },
    handleLazeLoadError(event, slick, image, imageSource) {
      /*console.log('handleLazeLoadError', event, slick, image, imageSource);*/
    }
  }
}
</script>
