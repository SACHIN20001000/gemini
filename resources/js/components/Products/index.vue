<template>
  <div class="main_container">
    <div class="free_ship_bar">
      <p>
        <img :src="ship">
        Free Shipping on All U.S. Orders Over <b>$49</b>
      </p>
    </div>
    <section class="product_view">
      <div class="container_max">
        <div class="row" v-if="variations && variations.length>0">
          <div class="col-md-6 pe-4 ">
            <div class="main_img">
              <div class="thumb-example">
                <!-- swiper1 -->
                <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
                  <swiper-slide
                    v-for="(variation, varky) in variations"
                    :key="varky"
                    :class="'slide-'+varky"
                  >
                    <img :src="variation.image" />
                  </swiper-slide>
                  <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
                  <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
                </swiper>
                <!-- swiper2 Thumbs -->
                <swiper class="swiper gallery-thumbs" :options="swiperOptionThumbs" ref="swiperThumbs">
                  <swiper-slide
                    v-for="(variation, varky) in variations"
                    :key="varky"
                    :class="'slide-'+varky"
                  >
                    <img :src="variation.image" />
                  </swiper-slide>
                </swiper>
              </div>
            </div>
          </div>
          <div class="col-md-6 ps-4">
            <h2 class="pr_title">
              {{product.name}}
            </h2>
            <div class="prod_rev">
              <span>142 <i class="fa fa-star" aria-hidden="true"></i> Reviews</span>
            </div>
            <div class="pro_dec" v-html="product.description"></div>
            <div class="select_type">
              <div class="row" v-if="variationAttributes">
                <div
                  class="col-md-6"
                  v-for="(varitationattr, vakey) in variationAttributes"
                  :key="vakey"
                >
                  <label class="line_label">{{varitationattr.type}}</label>
                  <ul class="style_p1">
                    <li
                      v-for="(variationAttribute,vak) in varitationattr.attributes"
                      :key="vak"
                    >
                      <label v-if="selectedlabel(variationAttribute.id) === true">
                        <input @click="variationUpdate($event,variationAttribute.id,varitationattr.id,varitationattr.type)" type="radio" name="size" vale="small" checked>
                        <span class="selectedOption">{{variationAttribute.name}}</span>
                        <small>{{variationAttribute.name}}</small>
                      </label>
                      <label v-else>
                        <input @click="variationUpdate($event,variationAttribute.id,varitationattr.id,varitationattr.type)" type="radio" name="size" vale="small">
                        <span>{{variationAttribute.name}}</span>
                        <small>{{variationAttribute.name}}</small>
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row g-3 align-items-center cart_form">
              <div class="col-auto quantity_select">
                <label for="staticEmail2" class="sr-only">Quantity</label>
                <div class="number-input md-number-input">
                  <button  class="minus">-</button>
                  <input class="quantity" min="0" name="quantity" value="1" type="number">
                  <button class="plus">+</button>
                </div>
              </div>
              <div class="col-auto amount_pro">
                <span  class="form-control">${{finalVariant.sale_price}}</span>
              </div>
              <div class="col-auto add_cart">
                <button class="btn_bl" @click="addItemInCart(product.id)" >Add to Cart</button>
              </div>
            </div>
            <p class="ingr">
              <b>Ingredients/Material:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum urna felis, eget auctor nisi placerat ac. Vestibulum porttitor faucibus condimentum. In hac habitasse platea dictumst. Praesent scelerisque sapien a eleifend gravida. In hac habitasse platea dictumst. Nam consequat sapien convallis nulla vestibulum, et ornare ipsum hendrerit. Praesent a ante vel mauris dictum lobortis et nec risus.
            </p>
            <p class="ingr">
              <b>Country of origin: United States</b>
            </p>
          </div>
        </div>
        <div class="row" v-else>
          <div class="col-md-6 pe-4 ">
            <div class="main_img">
              <div class="thumb-example">
                <!-- swiper1 -->
                <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
                  <swiper-slide
                    v-for="(gallery, gky) in product.gallary"
                    :key="gky"
                    :class="'slide-'+gky"
                  >
                    <img :src="gallery.image_path" />
                  </swiper-slide>
                  <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
                  <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
                </swiper>
                <!-- swiper2 Thumbs -->
                <swiper class="swiper gallery-thumbs" :options="swiperOptionThumbs" ref="swiperThumbs">
                  <swiper-slide
                    v-for="(gallery, gky) in product.gallary"
                    :key="gky"
                    :class="'slide-'+gky"
                  >
                    <img :src="gallery.image_path" />
                  </swiper-slide>
                </swiper>
              </div>
            </div>
          </div>
          <div class="col-md-6 ps-4">
            <h2 class="pr_title">
              {{product.name}}
            </h2>
            <div class="prod_rev">
              <span>142 <i class="fa fa-star" aria-hidden="true"></i> Reviews</span>
            </div>
            <div class="pro_dec" v-html="product.description"></div>
            <div class="row g-3 align-items-center cart_form">
              <div class="col-auto quantity_select Desktop-friendly">
                <label for="staticEmail2" class="sr-only">Quantity</label>
                <div class="number-input md-number-input">
                  <button  class="minus">-</button>
                  <input class="quantity" min="0" name="quantity" value="1" type="number">
                  <button class="plus">+</button>
                </div>
              </div>
              <div class="col-auto amount_pro">
                <div class="form-control">${{product.sale_price}}</div>
              </div>
              <div class="col-auto add_cart">
                <button
                  class="btn_bl"
                  @click="addItemInCart(product.id)"
                >
                  Add to Cart
                </button>
              </div>
            </div>
            <p class="ingr">
              <b>Ingredients/Material:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum urna felis, eget auctor nisi placerat ac. Vestibulum porttitor faucibus condimentum. In hac habitasse platea dictumst. Praesent scelerisque sapien a eleifend gravida. In hac habitasse platea dictumst. Nam consequat sapien convallis nulla vestibulum, et ornare ipsum hendrerit. Praesent a ante vel mauris dictum lobortis et nec risus.
            </p>
            <p class="ingr">
              <b>Country of origin: United States</b>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="nutrition_wrap">
      <div class="container_max">
        <div class="row nutrition_inner m-lr">
          <div class="col-md-6"></div>
          <div class="col-md-4">
            <p>discover the blue buffalo difference</p>
            <h2>a nutritional philosophy <br> inspired by the love <br>of a family pet</h2>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </section>
    <section class="ingradients-wrap">
      <div class="container_max">
        <div class="row ingradients-inner m-lr">
          <div class="col-md-4 ps-0">
            <img :src="high_quality_ingradients">
          </div>
          <div class="col-md-8 centered_txt">
            <p>
              <b>Real Meat First:</b> Blue Buffalo foods always feature real meat as the first <br>ingredient. High-quality protein from real chicken helps your dog build and <br>
              maintain healthy muscles. Plus they contain wholesome whole grains, <br>
              garden veggies and fruit.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="ingradients-wrap">
      <div class="container_max">
        <div class="row ingradients-inner m-lr">
          <div class="col-md-8 centered_txt">
            <p>
              <b>For adult dogs:</b>
              BLUE Life Protection Formula adult dog food <br>
              contains essential proteins and carbohydrates to help meet the <br>
              energy needs of adult dogs, and features omega 3 & 6 fatty acids <br>
              to promote a shiny coat and healthy skin.
            </p>
          </div>
          <div class="col-md-4 text-end pe-0">
            <img :src="high_quality_ingradients_02">
          </div>
        </div>
      </div>
    </section>
    <section class="ingradients-wrap">
      <div class="container_max">
        <div class="row ingradients-inner m-lr">
          <div class="col-md-4 ps-0">
            <img :src="high_quality_ingradients">
          </div>
          <div class="col-md-8 centered_txt">
            <p>
              <b>With Lifesource Bits: </b>
              This formula contains BLUE's exclusive LifeSource Bits - a
              precise <br> blend of antioxidants, vitamins and minerals carefully selected by holistic veterinarians <br> and animal nutritionists, to support immune system health, life stage requirements, <br> and a healthy oxidative balance.<br>
              A natural dog food: BLUE dry dog food is made with the finest natural ingredients <br> enhanced with vitamins and minerals. BLUE contains NO chicken (or poultry) <br> by-product meals, corn, wheat, soy, artificial flavors or preservatives.<br>
              Contains one (1) 15 lb. Bag of BLUE Life Protection Formula Adult Dry Dog Food,<br> Chicken and Brown Rice
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="about-brand">
      <div class="container_max">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title-txt">About the brand</h3>
            <p class="light-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum urna felis, eget auctor nisi placerat ac. Vestibulum porttitor faucibus condimentum. In hac habitasse platea dictumst. Praesent scelerisque sapien a eleifend gravida. In hac habitasse platea dictumst. Nam consequat sapien convallis nulla vestibulum, et ornare ipsum hendrerit. Praesent a ante vel mauris dictum lobortis et nec risus.
            </p>
            <p class="light-text">
              Mauris eu orci pharetra, pulvinar odio non, accumsan erat. Vestibulum elementum pellentesque nulla, at interdum erat porttitor porta. Quisque pharetra tempor elementum. Nulla vel nulla eleifend justo vestibulum sollicitudin. Aenean sed lacinia metus. Vestibulum ac risus urna. Aliquam consequat elit sit amet lorem tristique porttitor. Cras vitae fermentum erat. Proin vulputate nisl dolor. Donec tempus at nisi eget venenatis. Curabitur a ligula a turpis gravida placerat. Duis nec lectus neque.
            </p>
            <p class="light-text">
              Phasellus euismod sodales sagittis. Suspendisse eu vestibulum purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla urna nisi, vehicula molestie efficitur in, lobortis varius ante. Donec et blandit tellus, vel venenatis odio. In hac habitasse platea dictumst. Nunc bibendum sed arcu in suscipit. Nunc tincidunt maximus mi, eu mattis odio tincidunt quis. In quis nisi a magna vulputate mattis.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="question-wrap">
      <div class="container_max">
        <div class="row">
          <div class="col-md-12 question-inner">
            <h3 class="title-txt">Questions</h3>
          </div>
        </div>
        <div class="row m-lr question-inner02">
          <div class="col-sm-3 pe-0">
            <p>Can I use a Bounce dryer sheet...</p>
            <p>Can I use a Bounce dryer sheet...</p>
            <p>Can I use a Bounce dryer sheet...</p>
            <p>Can I use a Bounce dryer sheet...</p>
            <p>Can I use a Bounce dryer sheet...</p>
          </div>
          <div class="col-sm-2 Large-btn-box">
            <button class="Large-btn Large-red-btn">ask a question</button>
            <button class="Large-btn">search question</button>
            <button class="Large-btn">filter</button>
          </div>
          <div class="col-sm-7">
            <div class="row">
              <div class="col-sm-3">
                <div class="bm-wrap">
                  <img :src="bm_logo">
                  <div>
                    <span><b>Barbara M.</b></span>
                    <span>08/31/2021</span><br>
                    <span>08/31/2021</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-9">
                <p class="light-text">What are the various dimensions? I have a queen bed.</p>
                <p class="light-text">Answers</p>
                <div class="bm-wrap ">
                  <img :src="foot_5">
                  <div>
                    <p class="light-text">
                      <span> Pet Parents® </span><br>
                      Hi Barbara! Our Pawtect® Blanket comes in 3 sizes.<br>
                      Small: 24 inches x32 inches<br>
                      Medium: 32 inches x40 inches<br>
                      Large: 50 inches x60 inches<br>
                      Hope this helps!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="review-wrap">
      <div class="container_max">
        <div class="row">
          <div class="col-md-12 question-inner">
            <h3 class="title-txt">Reviews</h3>
          </div>
        </div>
        <div class="row m-lr">
          <div class="col-sm-3 px-0">
            <div class="light-box2">
              <div class="light-box-inner">
                <p class="light-box-txt01">4.9/5.0</p>
                <p class="light-btm">Based on 259 reviews</p>
              </div>
              <div class="light-box-inner">
                <p class="light-box-txt02">97%</p>
                <p class="light-btm">Recommend this product</p>
              </div>
            </div>
          </div>
          <div class="col-sm-2 Large-btn-box">
            <button class="Large-btn">Write a Review</button>
            <button class="Large-btn">Review filter</button>
          </div>
          <div class="col-sm-7 reviews-img-section">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
            <img :src="review_01">
          </div>
        </div>
      </div>
    </section>
    <section class="latest-review">
         <div class="container_max">
            <div class="row">
               <div class="col-md-12 sort-btn-wrap">
                  <p class="letest-review-title">Latest Reviews</p>
                  <button>Sort by <i class="fa fa-angle-down"></i></button>
               </div>
            </div>
            <div class="row rating_row">
               <div class="col-md-4 col-lg-3">
                  <div class="star-box">
                     <div class="varified-img">
                        <img :src="bm_logo">
                     </div>
                     <div class="star-inner-txt">
                        <h6>Cindy. K <span class="green-txt">Varified Bayer</span></h6>
                        <div><img :src="u_s"><span>United States</span></div>
                        <div class="star-rating">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
                  <div class="thumb-up">
                     <img :src="thumb_up"><span>I recommend this product</span>
                  </div>
               </div>
               <div class="col-md-8 rating-right">
                  <h3>Awesome</h3>
                  <p>I love these blankets, I bought two in the large, one for the back seat of our pickup and one for the trailer, my dogs love to snuggle in them and they seem to be comforting for them.  I only have one major issue with this product!  My husband kept stealing them ...</p>
                  <a href="#">read more</a>
               </div>
            </div>
            <div class="row rating_row">
               <div class="col-md-4 col-lg-3">
                  <div class="star-box">
                     <div class="varified-img">
                        <img :src="bm_logo">
                     </div>
                     <div class="star-inner-txt">
                        <h6>Cindy. K <span class="green-txt">Varified Bayer</span></h6>
                        <div><img :src="u_s"><span>United States</span></div>
                        <div class="star-rating">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
                  <div class="thumb-up">
                     <img :src="thumb_up"><span>I recommend this product</span>
                  </div>
               </div>
               <div class="col-md-8 rating-right">
                  <h3>Awesome</h3>
                  <p>I love these blankets, I bought two in the large, one for the back seat of our pickup and one for the trailer, my dogs love to snuggle in them and they seem to be comforting for them.  I only have one major issue with this product!  My husband kept stealing them ...</p>
                  <a href="#">read more</a>
               </div>
            </div>
            <div class="row rating_row">
               <div class="col-md-4 col-lg-3">
                  <div class="star-box">
                     <div class="varified-img">
                        <img :src="bm_logo">
                     </div>
                     <div class="star-inner-txt">
                        <h6>Cindy. K <span class="green-txt">Varified Bayer</span></h6>
                        <div><img :src="u_s"><span>United States</span></div>
                        <div class="star-rating">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                     </div>
                  </div>
                  <div class="thumb-up">
                     <img :src="thumb_up"><span>I recommend this product</span>
                  </div>
               </div>
               <div class="col-md-8 rating-right">
                  <h3>Awesome</h3>
                  <p>I love these blankets, I bought two in the large, one for the back seat of our pickup and one for the trailer, my dogs love to snuggle in them and they seem to be comforting for them.  I only have one major issue with this product!  My husband kept stealing them ...</p>
                  <a href="#">read more</a>
               </div>
            </div>
         </div>
      </section>
  </div>
</template>
<style>
  @import './products.css';
  @import './swipe.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"

import ship from "../../assets/images/ship.png"
import product_img from "../../assets/images/product.png"
import product_t from "../../assets/images/product_t.png"
import product_t2 from "../../assets/images/product_t2.png"
import high_quality_ingradients from "../../assets/images/high-quality-ingradients.jpg"
import high_quality_ingradients_02 from "../../assets/images/high-quality-ingradients-02.jpg"
import bm_logo from "../../assets/images/bm-logo.jpg"
import foot_5 from "../../assets/images/foot-5.jpg"
import review_01 from "../../assets/images/review-01.jpg"
import thumb_up from "../../assets/images/thumb-up.png"
import u_s from "../../assets/images/u_s.jpg"

import form from 'vuejs-form'

import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'

export default {
  name:"Products",
  components: {
    Swiper,
    SwiperSlide
  },
  directives: {
    swiper: directive
  },
  data: function () {
    return {
      product_img:product_img,
      product_t:product_t,
      product_t2:product_t2,
      high_quality_ingradients:high_quality_ingradients,
      high_quality_ingradients_02:high_quality_ingradients_02,
      bm_logo:bm_logo,
      foot_5:foot_5,
      thumb_up:thumb_up,
      u_s:u_s,
      review_01:review_01,
      ship:ship,
      itemDetails: {
        key: 1,
        product_id: 0,
        quantity: 2,
      },
      variations:{},
      variationAttributes:[],
      finalVariant:[],
      selectedattrIds:[],
      varaintOutStock:'',
      form: form({
        selectedIds: []
      }),
      swiperOptionTop: {
        loop: true,
        loopedSlides: 5, // looped slides should be the same
        spaceBetween: 10,
        observer: true,
        observeParents: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      },
      swiperOptionThumbs: {
        loop: true,
        loopedSlides: 5, // looped slides should be the same
        spaceBetween: 10,
        centeredSlides: false,
        slidesPerView: 4,
        observer: true,
        observeParents: true,
        touchRatio: 0.2,
        slideToClickedSlide: true
      },
      swiperTop:'',
      swiperThumbs:''
    }
  },
  mounted(){
    this.getProdcut()
  },
  watch: {
    addCartItems(){
      this.getCartItems()
    },
    product(){
      this.variations = this.product.variations
      var variation_attributes = this.product.variation_attributes
      var vaarrayCollection=[]
      if(variation_attributes.length>0){
        const _this = this
        variation_attributes.filter(function(varitioonattr,vaindex){
          var vname = varitioonattr.name
          var vid = varitioonattr.id
          var subAttributeArray =[]
          _this.product.attributes.filter(function(attr,attrindex){
            if(varitioonattr.id == attr.attribute_id){
              subAttributeArray.push({id:attr.id,name:attr.name})
            }
          })
          vaarrayCollection.push({type:vname,id:vid,attributes:subAttributeArray})
        })
      }
      this.variationAttributes = vaarrayCollection
      this.firstTimePrice()

      this.$nextTick(() => {
        this.swiperTop = this.$refs.swiperTop.$swiper
        this.swiperThumbs = this.$refs.swiperThumbs.$swiper
        this.swiperTop.controller.control = this.swiperThumbs
        this.swiperThumbs.controller.control = this.swiperTop
      })
    }
  },
  computed: {
    ...mapGetters(['product', 'catErrors','addCartItems'])
  },
  methods: {
    ...mapActions(['getProduct','addCartItem','getCartItems']),
    getProdcut(){
      if (this.$route.params.id) {
        this.getProduct(this.$route.params.id)
      }
    },
    addItemInCart(proId){
      if(proId){
        const cartkey = localStorage.getItem('cartKey')
        var vid=0

        if(this.finalVariant && this.finalVariant.id){
          vid = this.finalVariant.id
        }
        const itemDetails= {
          key: cartkey,
          product_id: proId,
          quantity: 1,
          variation_product_id: vid
        }
        this.addCartItem(itemDetails)
      }
    },
    variationUpdate(e,attributeId,attnameId,typ){
      var switchTumnb=0
      var _this = this
      this.selectedattrIds.filter(function(selIds,selind){
        if(selIds.type == typ){
          _this.selectedattrIds[selind].id = attributeId
        }
      })
      var varientsArr=[]

      this.variations.filter(function(varients,varindex){
        var countMatch =0;
        varients.variation_attributes.filter(function(varientAttrs, index){
          _this.selectedattrIds.filter(function(getarrtibuteId,indx){
            if(getarrtibuteId.id == varientAttrs.attribute_id){
              countMatch++
            }
          })
        })
        if(countMatch == _this.selectedattrIds.length){
          switchTumnb = varindex
          varientsArr=varients
        }
      })
      if(varientsArr && varientsArr.id){
        this.finalVariant =[]
        this.finalVariant = varientsArr
        this.varaintOutStock=''
        this.toggleSlide(Number(switchTumnb)+Number(1))
      }else{
        this.varaintOutStock='Option is Out Of Stock.'
      }
    },
    firstTimePrice(){
      var getarrtibuteIds = []
      this.variationAttributes.filter(function(vaattr, vaindex){
        getarrtibuteIds.push({id:vaattr.attributes[0].id,type:vaattr.type})
      })
      this.selectedattrIds=getarrtibuteIds
      var varientsArr=[]
      this.variations.filter(function(varients,varindex){
        var countMatch =0;
        varients.variation_attributes.filter(function(varientAttrs, index){
          getarrtibuteIds.filter(function(getarrtibuteId,indx){
            if(getarrtibuteId.id == varientAttrs.attribute_id){
              countMatch++
            }
          })
        })
        if(countMatch == getarrtibuteIds.length){
          varientsArr=varients
        }
      })

      if(varientsArr && varientsArr.id){
        this.finalVariant =[]
        this.finalVariant = varientsArr
        this.varaintOutStock=''
      }else{
        this.varaintOutStock='Option is Out Of Stock.'
      }
    },
    selectedlabel(selId){
      var selectCount=0
      if(this.finalVariant.variation_attributes)
      {
        this.finalVariant.variation_attributes.filter(function(att,attind){
          if(att.attribute_id == selId){
            selectCount++
          }
        })
        if(selectCount>0){
          return true
        }else{
          return false
        }
      }
    },
    toggleSlide(i) {
      this.swiperTop.slideTo(i, 0,true)
    }
  }
}
</script>
