<template>
  <div class="main">
    <section class="catg_banner">
      <div class="container_max">
        <div class="banner_row">
          <div class="text_lf">
            <div class="h_p">
            <h1>Shop Cats</h1>
            <p>Everything you need for your cats</p>
            </div>
          </div>
          <img
          :src="cat_1"
          alt="banner"
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
          <div class="tb_slider">
          <swiper class="swiper" :options="swiperOption">
            <swiper-slide class="active-tab"><a href="#">Dry Food</a></swiper-slide>
            <swiper-slide><a href="#">Wet Food</a></swiper-slide>
            <swiper-slide><a href="#">Raw Food</a></swiper-slide>
            <swiper-slide><a href="#">Soft and Chewy Treats</a></swiper-slide>
            <swiper-slide><a href="#">Health Care</a></swiper-slide>
            <swiper-slide><a href="#">Grooming</a></swiper-slide>
            <swiper-slide><a href="#">Litter Boxes</a></swiper-slide>
            <swiper-slide><a href="#">Litter Boxes12</a></swiper-slide>
            <swiper-slide><a href="#">Litter Boxes13</a></swiper-slide>
            <swiper-slide><a href="#">Litter Boxes14</a></swiper-slide>
            <swiper-slide><a href="#">Litter Boxes15</a></swiper-slide>

          </swiper>
          <div class="swiper_nav">
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
              </div>
          </div><!--
          <ul>
            <li class="active-tab"><a href="#">Health Care</a></li>
            <li><a href="#">Health Care</a></li>
            <li><a href="#">Health Care</a></li>
            <li><a href="#">Health Care</a></li>
            <li><a href="#">Health Care</a></li>
            <li><a href="#">Grooming</a></li>
            <li><a href="#">Litter Boxes</a></li>
          </ul> -->
        </div>
      <div class="cat_list">
      <h2>Cat Dry Food Selection</h2>
      <ul class="prd_sld">
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>Product Name</h3>
            <p class="bd_type">Variations</p>
            <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
            More Options Available
            </a>
          </div>
        </div>
      </li>
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>Product Name</h3>
            <p class="bd_type">Variations</p>
            <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
            More Options Available
            </a>
          </div>
        </div>
      </li>
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>Product Name</h3>
            <p class="bd_type">Variations</p>
            <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
            More Options Available
            </a>
          </div>
        </div>
      </li>
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>Product Name</h3>
            <p class="bd_type">Variations</p>
            <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
            More Options Available
            </a>
          </div>
        </div>
      </li>
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>Product Name</h3>
            <p class="bd_type">Variations</p>
            <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
            More Options Available
            </a>
          </div>
        </div>
      </li>
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
            <h3>Product Name</h3>
            <p class="bd_type">Variations</p>
            <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
            More Options Available
            </a>
          </div>
        </div>
      </li>
      <li>
        <div class="prod_lst">
          <img
          :src="pouch2"
          alt="product"
          >
          <div class="bd-txt">
            <div class="bd_rate">
              <span>
              <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i>
              </span>
              <label>(125 Reviews)</label>
            </div>
              <h3>Product Name</h3>
              <p class="bd_type">Variations</p>
              <label>$25</label> <a href="/products/pet-parents®-pawtect®-pads-(2pack)-of-washable-premium-pee-pads/15" class="">
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
          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porta non enim ut sollicitudin. Vestibulum non tortor tempus magna ullamcorper pellentesque sit amet in sem. Suspendisse ullamcorper sem non elit rhoncus, tempus rhoncus tortor venenatis. Suspendisse at mi vitae quam pharetra dapibus. Fusce diam velit, dapibus sed leo a, imperdiet pharetra quam. Sed porttitor tincidunt eros sit amet scelerisque. Quisque volutpat a ligula at ullamcorper. Nullam ullamcorper, urna sit amet iaculis semper, enim risus cursus augue, et malesuada orci magna non nulla. Ut pretium, turpis vitae lacinia faucibus, dolor justo scelerisque erat, quis fringilla elit dolor viverra dui. Nulla facilisi. Ut consequat dictum tortor, et consequat mauris posuere at. Nulla hendrerit tincidunt turpis, eget bibendum ligula maximus nec. Sed vitae convallis neque.
          </p>
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
import cat_1 from "../../assets/images/cat_1.png"
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
      cat_1: cat_1,
      add_banner: add_banner,
      pouch2: pouch2,
      brand_b: brand_b,
      blg1: blg1,
      blg2: blg2,
      blg3: blg3,
      blg4: blg4,
      category:[],
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
    this.getCategories()
  },
  watch:{
    categories(){
      if (window.catslug) {
        this.category = this.singleCategory(window.catslug)
        this.getProductsByCategory(this.category.id)
      }
    }
  },
  computed: {
    ...mapGetters(['categories', 'catErrors','productsByCategory'])
  },
  methods: {
    ...mapActions(['getCategories','getProductsByCategory']),
    singleCategory(slug){
      const listCategories = this.categories
      var insertCat =[]
      listCategories.filter(function (category,catind) {
        if(category.slug==slug){
          insertCat=category
        }
        else{
          category.childrens.filter(function (childCategory,childCatind) {
            if(childCategory.slug==slug){
              insertCat=childCategory
            }
          })
        }
      })
      return insertCat
    },
    productSlug(productName){
      return productName.replace(/\s+/g, '-').toLowerCase()
    }
  }
}
</script>
