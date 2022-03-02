<template>
  <div class="main" v-if="brand">
    <section class="banner-shrink">
      <div class="banner_img">
        <img
        :src="brand.cover_image"
        alt="Ship"
        >
        <div class="max-1280 text_over">
          <h4>{{brand.name}}</h4>
        </div>
      </div>
      </section>
      <section class="brand_strip">
        <a href="brand_box">
           <img
        :src="brand.logo"
        alt="Ship"
        >
        </a>
      </section>
      <section class="abt_text">
        <div class="max_990 text-center pt-5">
          <h2 class="b-tb">{{brand.tag_line}}</h2>
          <div class="txt_abt" v-html="brand.overview">
        </div>
        </div>
      </section>
      <section class="brand_grid">
        <div class="max-1280">
          <div class="grid-4-6d">
            <!--<div class="prod_big" style="background: #f6f6f6;">
              <img
              :src="product"
              alt="product"
              >
              <div class="bd-txt">
                <div class="bd_rate">
                  <span>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  </span>
                  <label>(125 Reviews)</label>
                </div>
                <h3>Product Name</h3>
                <p class="bd_type"> Product Type</p>
                <label>$00.00</label>
                <a href="#">More Options Available </a>
              </div>
            </div>-->
            <div class="flex_product" v-if="brandProducts">
              <div
                class="prod_min"
                v-for="(branProduct, bpkey) in brandProducts"
                :key="bpkey"
                :class="isInclude(bpkey)"
              >
                <img
                :src="branProduct.feature_image"
                alt="product2"
                >
                <div class="bd-txt">
                  <div class="bd_rate">
                    <span>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                    <label>(125 Reviews)</label>
                  </div>
                  <h3>branProduct.name</h3>
                  <p class="bd_type" v-if="branProduct.variations">Variations</p>
                  <p class="bd_type" v-else>Simple</p>
                  <label v-if="branProduct.variations">${{branProduct.variations[0].real_price}}</label>
                  <router-link
                    :to="{ path: '/products/'+productSlug(branProduct.name)+'/'+branProduct.id}"
                  >
                    More Options Available
                 </router-link>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <section class="seo_txt">
        <div class="container_max">
          <h3>Category Text for SEO</h3>
          <div v-html="brand.category_text"></div>
        </div>
      </section>

  </div>
</template>
<style>
  @import './brand.css';
</style>
<script>
import brand_flex from "../../assets/images/abt_header.jpg"
import brand_logo from "../../assets/images/brand-logo.png"
import product from "../../assets/images/pouch.jpg"
import product2 from "../../assets/images/pouch2.jpg"
import {mapActions,mapGetters} from "vuex"

export default {
  name:"Brands",
  data: function () {
    return {
      title:'Brands',
      brand_flex: brand_flex,
      brand_logo: brand_logo,
      product: product,
      product2: product2 ,
      totalNumProduct:[0,7,8,15,16,23,24,31]
    }
  },
  created(){
    if(this.$route.params.slug && this.$route.params.brandid){
      this.getBrand(this.$route.params.brandid)
      this.getBrandProducts(this.$route.params.brandid)
    }
  },
  computed: {
    ...mapGetters(['brand','brandProducts'])
  },
  methods: {
    ...mapActions(['getBrand','getBrandProducts']),
    isInclude(key) {
        if(this.totalNumProduct.includes(key)){
          return 'gridbig_40'
        }else{
          return 'gridnormal_20'
        }
    },
    productSlug(productName){
      return productName.replace(/\s+/g, '-').toLowerCase()
    }
  }
}
</script>
