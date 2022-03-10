<template>
  <div class="main">
    <section class="catg_banner">
      <div class="container_max">
        <div class="banner_row">
          <div class="text_lf">
            <div class="h_p">
            <h1>{{category.name}}</h1>
            <p>{{category.tag_line}}</p>
            </div>
          </div>
          <img
          :src="category.feature_image"
          alt="banner"
          width="493px"
          >
        </div>
      </div>
    </section>
    <section class="prod-filter">
      <div class="container_max">
      <div class="filter_flex">
        <div class="filter-drop">
          <ul class="filter_list">
            <li><a href="#">Type</a>  <span class="filter_icon">+</span></li>
            <li><a href="#">Life Stage <span class="filter_icon">+</span></a></li>
            <li><a href="#">Breed</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Product</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Product</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Flavor</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Health Feature</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Food Form</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Brand</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Price</a> <span class="filter_icon">+</span></li>
            <li><a href="#">Rating</a> <span class="filter_icon">+</span></li>
          </ul>
        </div>
      <div class="prod-archive">
        <div class="ad_banner">
        <img
        :src="add_banner"
        alt="adds"
        >
        </div>
        <div class="tab-cat">
          <div class="tb_slider" v-if="categories">
          <swiper class="swiper" :options="swiperOption">
            <swiper-slide
              v-for="(listCategory,catkey) in categories"  :key="catkey"
              :class="getActiveClass(catkey)"
            >
              <a :href="'/category/'+listCategory.slug+'/'+listCategory.id">
                {{listCategory.name}}
              </a>
            </swiper-slide>
          </swiper>
          <div class="swiper_nav">
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
              </div>
          </div>
        </div>
      <div class="cat_list">
      <h2>{{category.name}} Selection</h2>
      <ul class="prd_sld" v-if="productsByCategory">
      <li
        v-for="(productList,pckey) in productsByCategory"
        :key="pckey"
      >
        <div class="prod_lst">
          <img
           :src="productList.feature_image"
           alt="product"
           width="139px"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>{{limitedString(productList.name)}}</h3>
            <span v-if="productList.variations">
              <p class="bd_type">Variations</p>
              <label>${{productList.variations[0].real_price}}</label>
            </span>
            <span v-else>
              <label>${{productList.real_price}}</label>
            </span>
            <a
              :href="'products/'+productSlug(productList.name)+'/'+productList.id"
            >
              More Options Available
            </a>
          </div>
        </div>
      </li>

      </ul>
      </div>

      <div class="slider_prd">
        <h3 class="sl_head">Educate yourself on how to raise your cat</h3>
        <ul class="slider_blog">
          <li>
            <a href="#">
            <img
            :src="blg1"
            alt="product"
            >
            <div class="post_over">
              <div class="dt_brand">
                <span>Nov.17</span>
                <img
                :src="brand_b"
                alt="branded"
                >
              </div>
              <div class="bt-text">
                <h3>Your Female Cat and
                When to Breed Her</h3>
                <a href="#">> Read <b>More</b></a>
              </div>
            </div>
            </a>
          </li>
          <li>
            <a href="#">
              <img
              :src="blg2"
              alt="product"
              >
              <div class="post_over">
                <div class="dt_brand">
                  <span>Nov.17</span>
                  <img
                  :src="brand_b"
                  alt="branded"
                  >
                </div>
                <div class="bt-text">
                  <h3>Cat Hair Loss</h3>
                  <a href="#">> Read <b>More</b></a>
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">
              <img
              :src="blg3"
              alt="product"
              >
              <div class="post_over">
                <div class="dt_brand">
                  <span>Nov.17</span>
                  <img
                  :src="brand_b"
                  alt="branded"
                  >
                </div>
                <div class="bt-text">
                  <h3>Cat Nutrition Tips</h3>
                  <a href="#">> Read <b>More</b></a>
                </div>
              </div>
            </a>
          </li>
          <li><a href="#">
            <img
            :src="blg4"
            alt="product"
            >
            <div class="post_over">
              <div class="dt_brand">
                <span>Nov.17</span>
                <img
                :src="brand_b"
                alt="branded"
                >
              </div>
              <div class="bt-text">
                <h3>Tips for a Healthy
                Cat Diet</h3>
                <a href="#">> Read <b>More</b></a>
              </div>
            </div>
            </a>
          </li>
        </ul>
      </div>

        <div class="seo_div">
          <h4> Category Text for SEO</h4>
          <p>{{category.description}}</p>
        </div>
      </div>
      </div>
      </div>
    </section>
  </div>
</template>
<style>
  @import './category.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import add_banner from "../../assets/images/add_banner.jpg"
import pouch2 from "../../assets/images/pouch2.jpg"
import blg1 from "../../assets/images/blg1.jpg"
import blg2 from "../../assets/images/blg2.jpg"
import blg3 from "../../assets/images/blg3.jpg"
import blg4 from "../../assets/images/blg4.jpg"
import brand_b from "../../assets/images/badge.png"

import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'

export default {
  name:"Category",
  components: {
    Swiper,
    SwiperSlide
  },
  data: function () {
    return {
      add_banner: add_banner,
      pouch2: pouch2,
      brand_b: brand_b,
      blg1: blg1,
      blg2: blg2,
      blg3: blg3,
      blg4: blg4,
      swiperOption: {
        slidesPerView: 7,
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      }
    }
  },
  created(){
    if (window.catId) {
      this.getCategory(window.catId)
      this.getProductsByCategory(window.catId)
    }
    this.getCategories()
  },
  computed: {
    ...mapGetters(['categories', 'catErrors','productsByCategory','category'])
  },
  methods: {
    ...mapActions(['getCategories','getProductsByCategory','getCategory']),
    productSlug(productName){
      return productName.replace(/\s+/g, '-').toLowerCase()
    },
    getActiveClass(catkey){
      if(catkey>0){
        return '';
      }
      return 'active-tab';
    },
    limitedString(str){
      if(str.length > 12) {
         return str.slice(0,12)+'...'
      }else{
        return str
      }
    },
    productSlug(productName){
      return productName.replace(/\s+/g, '-').toLowerCase()
    }
  }
}
</script>
