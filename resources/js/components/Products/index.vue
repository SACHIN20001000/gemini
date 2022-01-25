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
                        <span class="selectedOption">{{getProductIcon(variationAttribute.name).toUpperCase()}}</span>
                        <small>{{variationAttribute.name}}</small>
                      </label>
                      <label v-else>
                        <input @click="variationUpdate($event,variationAttribute.id,varitationattr.id,varitationattr.type)" type="radio" name="size" vale="small">
                        <span>{{getProductIcon(variationAttribute.name).toUpperCase()}}</span>
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
          <div class="col-md-12">
            <img :src="product.banner_image">
          </div>
        </div>
      </div>
    </section>
    <section v-if="product.product_description_detail">
      <div
        class="ingradients-wrap"
        v-for="(descbanner,dbkey) in product.product_description_detail"
        :key="dbkey"
      >
        <div class="container_max">
          <div
            v-if="dbkey% 2 === 0 || dbkey==0"
            class="row ingradients-inner m-lr"
          >
            <div class="col-md-4 ps-0">
              <img :src="descbanner.image_path">
            </div>
            <div class="col-md-8 centered_txt">
              <div class="textdecoration" v-html="descbanner.value"></div>
            </div>
          </div>
          <div
            class="row ingradients-inner m-lr"
            v-else
          >
            <div class="col-md-8 centered_txt order-02">
              <div class="textdecoration" v-html="descbanner.value"></div>
            </div>
            <div class="col-md-4 text-end pe-0">
              <img :src="descbanner.image_path">
            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="about-brand">
      <div class="container_max">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title-txt">About the brand</h3>
            <div v-html="product.about_description"></div>
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
            <div v-if="!searchQuestion" class="faq_list">
              <p
                v-for="(faq,fkey) in faqs"
                :key="fkey"
                @click="openQuestion(fkey)"
              >{{faq.title}}</p>
            </div>
            <div v-else>
              <div class="srch_q">
              <input type="text" v-model="filterForm.serachtext"><button type="button" @click='filterFaq'><i class="fa fa-search" aria-hidden="true"></i></button>
              <span class="error_validation" v-if="filterForm.errors().has('serachtext')">
                {{ filterForm.errors().get('serachtext') }}
              </span>
              <div class="faq_list">
                <p
                  v-for="(filterfaq,flkey) in filterfaqs"
                  :key="flkey"
                  @click="openQuestion(flkey)"
                >{{filterfaq.title}}</p>
              </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2 Large-btn-box">
            <button
              class="Large-btn"
              v-on:click="askQuestion = !askQuestion"
              v-bind:class="{Large_red_btn: askQuestion}"
            >
              ask a question
            </button>
            <button
              class="Large-btn"
              v-on:click="searchQuestion = !searchQuestion"
              v-bind:class="{Large_red_btn: searchQuestion}"
            >
              search question
            </button>
            <button class="Large-btn">filter</button>
          </div>
          <div class="col-sm-7">
            <div class="row" v-if="!askQuestion">
              <div class="col-sm-3" v-if="faqDetail && faqDetail.user">
                <div class="bm-wrap">
                  <img :src="faqDetail.user.profile_image" width="60px">
                  <div>
                    <span><b>{{faqDetail.user.name}}</b></span>
                    <span>{{faqDetail.user.created_at}}</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-9" v-if="faqDetail">
                <p class="light-text">{{faqDetail.title}}</p>
                <p class="light-text">Answers</p>
                <div class="bm-wrap cmnt_txt">
                <div class="blg_auth">  <img :src="foot_5"> <span> Pet Parents® </span></div>
                  <div>
                    <div
                      class="light-text"
                      v-html="faqDetail.description"
                    >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-sm-12">
                <div class="question_form row">
                  <div class="form_label col-md-6">
                    <label>Name: </label>
                    <input type="text" v-model='faqForm.name' />
                    <span class="error_validation" v-if="faqForm.errors().has('name')">
                      {{ faqForm.errors().get('name') }}
                    </span>
                  </div>
                  <div class="form_label col-md-6">
                    <label>Email: </label>
                    <input type="text" v-model='faqForm.email' />
                    <span class="error_validation" v-if="faqForm.errors().has('email')">
                      {{ faqForm.errors().get('email') }}
                    </span>
                  </div>
                  <div class="form_label col-md-12">
                    <label>Question: </label>
                    <textarea v-model='faqForm.question'></textarea>
                    <span class="error_validation" v-if="faqForm.errors().has('question')">
                      {{ faqForm.errors().get('question') }}
                    </span>
                  </div>
                  <div class="form_label col-md-12 for_m_btn">
                    <button type="button" @click='faqSubmit'>Submit Question</button>
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
            <button
              class="Large-btn"
              v-on:click="writeReview = !writeReview"
              v-bind:class="{Large_red_btn: writeReview}"
            >
              Write a Review
            </button>
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
    <section class="review-write" v-if="writeReview">
      <div class="container_max">
        <div class="row">
          <div class="col-md-12 question-inner">
            <div class="review_form">
              <h4>Reviews</h4>
              <div class="review_form_50">
                <div class="review_form_label">
                  <label>Name: </label>
                  <input type="text" v-model='reviewForm.name' />
                  <span class="error_validation" v-if="reviewForm.errors().has('name')">
                    {{ reviewForm.errors().get('name') }}
                  </span>
                </div>
                <div class="review_form_label">
                  <label>Email </label>
                  <input type="text" v-model='reviewForm.email' />
                  <span class="error_validation" v-if="reviewForm.errors().has('name')">
                    {{ reviewForm.errors().get('name') }}
                  </span>
                </div>
              </div>
              <div class="review_form_50">
                <div class="review_form_label form_label">
                  <label>Rating </label>
                  <input type="text" v-model='reviewForm.rating' />
                </div>
                <div class=" review_form_label form_label">
                  <label>Title of Review </label>
                  <input type="text" v-model='reviewForm.title' />
                  <span class="error_validation" v-if="reviewForm.errors().has('title')">
                    {{ reviewForm.errors().get('title') }}
                  </span>
                </div>
              </div>
              <div class="review_form_100">
                <div class="form_label txt_area">
                  <label>How was your overall experience? </label>
                  <textarea v-model='reviewForm.description'></textarea>
                  <span class="error_validation" v-if="reviewForm.errors().has('description')">
                    {{ reviewForm.errors().get('description') }}
                  </span>
                </div>
              </div>
              <div class="review_form_50">
                <div class="review_form_label form_label">
                  <label>Are you recommend this product? </label>
                  <div class="recommend">
                    <span><input type="radio" name="status" v-model='reviewForm.status' value="1" /> Yes</span>
                    <span><input type="radio" name="status" v-model='reviewForm.status' value="0" /> No</span>
                  </div>
                </div>
                <div class="review_btn_label review_form_label form_label">
                  <input type="file" multiple accept="image/*" @change="reviewImages($event.target.files)" id="reviewImages">
                  <button type="button" @click="submitReview" >Submit Question</button>
                </div>
              </div>
            </div>
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
            <div v-if="reviews">
              <div
                class="row rating_row"
                v-for="(review,rkey) in reviews"
                :key="rkey"
              >
                 <div class="col-md-4 col-lg-3">
                    <div class="star-box">
                       <div class="varified-img">
                          <img :src="bm_logo">
                       </div>
                       <div class="star-inner-txt" v-if="review && review.user">
                          <h6>{{review.user.name}} <span class="green-txt">Varified Bayer</span></h6>
                          <div><img :src="u_s"><span>United States</span></div>
                          <div class="star-rating">
                             <i class="fa fa-star" aria-hidden="true"></i>
                             <i class="fa fa-star" aria-hidden="true"></i>
                             <i class="fa fa-star" aria-hidden="true"></i>
                             <i class="fa fa-star" aria-hidden="true"></i>
                             <i class="fa fa-star" aria-hidden="true"></i>
                             {{review.rating}}
                          </div>
                       </div>
                    </div>
                    <div class="thumb-up">
                      <span v-if="review.status == 1">
                        <img :src="thumb_up">I recommend this product
                      </span>
                      <span v-else>
                        <i class="fa fa-thumbs-down"></i>I recommend this product
                      </span>
                    </div>
                 </div>
                 <div class="col-md-8 rating-right">
                    <h3>{{review.title}}</h3>
                    <p>{{review.description}}</p>
                    <a href="#">read more</a>
                 </div>
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
  data: () => ({
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
    swiperThumbs:'',
    askQuestion: false,
    searchQuestion: false,
    writeReview: false,
    faqForm: form({
      name: '',
      email: '',
      question: '',
      product_id:0
      })
      .rules({
        name: 'required',
        email: 'email|min:5|required',
        question: 'required'
      })
      .messages({
        'name': 'This field is required!',
        'email.email': 'Email field must be an email',
        'question.question': 'This field is required!'
      }),
    filterForm: form({
      serachtext: '',
      product_id:0
      })
      .rules({
        serachtext: 'required'
      })
      .messages({
        'serachtext.serachtext': 'This field is required!',
      }),
    reviewForm: form({
      name: '',
      email: '',
      rating: '',
      title: '',
      description:'',
      product_id:0,
      status:'',
      images:[]
      })
      .rules({
        name: 'required',
        email: 'email|min:5|required',
        title: 'required',
        description: 'required'
      })
      .messages({
        'name': 'This field is required!',
        'email.email': 'Email field must be an email',
        'title.title': 'This field is required!',
        'description.description': 'This field is required!'
      }),
    photoFiles: [],
    faqDetail:[]
  }),
  mounted(){
    this.getProdcut()
    this.getFaqs(this.$route.params.id)
    this.getReviews(this.$route.params.id)
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
    },
    faqs(){
      if(this.faqs.length>0){
        this.faqDetail = this.faqs[0]
      }
    }
  },
  computed: {
    ...mapGetters(['product', 'catErrors','addCartItems', 'faqs','filterfaqs','reviews'])
  },
  methods: {
    ...mapActions(['getProduct','addCartItem','getCartItems','addFaq','getFaqs','filterFaqs','getReviews','addReview']),
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
    },
    getProductIcon(fullName) {
      let arrName = fullName.split(" ")
      if(arrName.length>1){
        let iniName = fullName.charAt(0)
        let iniLname = arrName[arrName.length - 1].charAt(0)
        return iniName + iniLname
      }else{
        return fullName.charAt(0)+fullName.charAt(1)
      }
    },
    faqSubmit(){
      this.faqForm.validate()
      if (!this.faqForm.validate().errors().any()) {
        var productId = this.$route.params.id
        this.faqForm.data.product_id=productId
        this.addFaq(this.faqForm.data)
        this.askQuestion=false
      }
    },
    openQuestion(arrayIndex){
      this.faqDetail = this.faqs[arrayIndex]
    },
    filterFaq(){
      this.filterForm.validate()
      if (!this.filterForm.validate().errors().any()) {
        var productId = this.$route.params.id
        this.filterForm.data.product_id=productId
        this.filterFaqs(this.filterForm)
      }
    },
    reviewImages(fileList){
      this.photoFiles = fileList
    },
    submitReview(){
      this.reviewForm.validate()
      if (!this.reviewForm.validate().errors().any()) {
        const formData = new FormData()
        formData.append('name', this.reviewForm.data.name)
        formData.append('email', this.reviewForm.data.email)
        formData.append('rating', this.reviewForm.data.rating)
        formData.append('title', this.reviewForm.data.title)
        formData.append('description', this.reviewForm.data.description)
        formData.append('status', this.reviewForm.data.status)
        formData.append('product_id', this.$route.params.id)
        console.log(this.photoFiles);
        for(var i=0;i<this.photoFiles.length;i++){
          formData.append('images[' + i + ']', this.photoFiles[i]);
        }

        this.addReview(formData)
      }
    }
  }
}
</script>
