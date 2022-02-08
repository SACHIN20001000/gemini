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
                <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
                  <swiper-slide
                    v-for="(variation, varky) in variations"
                    :key="varky"
                    :class="'slide-'+varky"
                  >
                    <div class="swiper-zoom-container">
                      <img :src="variation.image" />
                    </div>
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
            <div class="prod_rev" v-if="overAllRating">
              <span class="star-rating">
                <star-rating
                  v-model="overAllRating.overAllRating"
                  v-bind:increment="0.5"
                  v-bind:max-rating="5"
                  inactive-color="#ccc"
                  active-color="#e7ba2e"
                  v-bind:star-size="15"
                >
                </star-rating>
              </span>
              <span>
                <a href="javascript:;" @click="questionPosstion">{{overAllRating.total_reviews}} Ratings</a>
              </span>
              <span>
                &nbsp;|&nbsp;<a href="javascript:;" @click="reviewPosstion">{{faqs.length}} Answered Questions</a>
              </span>
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
                  <button  class="minus" @click="quantityMinus">-</button>
                  <input class="quantity" min="0" v-model="quantity" type="number">
                  <button class="plus" @click="quantityPlus">+</button>
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
                <a class="btn-close f-r"><img :src="thumb_up" @click="closeViewer" alt="" title=""></a>
                <swiper class="swiper gallery-top" :options="swiperOptionTop" ref="swiperTop">
                  <swiper-slide
                    v-for="(gallery, gky) in product.gallary"
                    :key="gky"
                    :class="'slide-'+gky"
                  >
                    <div class="swiper-zoom-container">
                      <img :src="gallery.image_path" />
                    </div>
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
            <div class="prod_rev" v-if="overAllRating">
              <span class="star-rating">
                <star-rating
                  v-model="overAllRating.overAllRating"
                  v-bind:increment="0.5"
                  v-bind:max-rating="5"
                  inactive-color="#ccc"
                  active-color="#e7ba2e"
                  v-bind:star-size="15"
                >
                </star-rating>
              </span>
              <span>
                <a href="javascript:;" @click="questionPosstion">{{overAllRating.total_reviews}} Ratings</a>
              </span>
              <span>
                &nbsp;|&nbsp;<a href="javascript:;" @click="reviewPosstion">{{overAllRating.total_reviews}} Answered Questions</a>
              </span>
            </div>
            <div class="pro_dec" v-html="product.description"></div>
            <div class="row g-3 align-items-center cart_form">
              <div class="col-auto quantity_select Desktop-friendly">
                <label for="staticEmail2" class="sr-only">Quantity</label>
                <div class="number-input md-number-input">
                  <button  class="minus" @click="quantityMinus">-</button>
                  <input class="quantity" min="0" v-model="quantity" type="number">
                  <button class="plus" @click="quantityPlus">+</button>
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
          <div class="col-md-12 question-inner questionPosstion">
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
              <vue-infinite-autocomplete
                :data-source=currentOptions
                :value=currentValue
                v-on:select="handleOnSelect">
              </vue-infinite-autocomplete>
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
            <!--<button class="Large-btn">filter</button>-->
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
          <div class="col-md-12 question-inner reviewPosstion">
            <h3 class="title-txt">Reviews</h3>
          </div>
        </div>
        <div class="row m-lr">
          <div class="col-sm-3 px-0">
            <div class="light-box2" v-if="overAllRating">
              <div class="light-box-inner">
                <p class="light-box-txt01">{{overAllRatings(overAllRating.overAllRating)}}/5.0</p>
                <p class="light-btm">Based on {{overAllRating.total_reviews}} reviews</p>
              </div>
              <div class="light-box-inner">
                <p class="light-box-txt02">{{getPercentage(overAllRating.overAllRating, overAllRating.total_reviews)}}%</p>
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
            <button
              class="Large-btn"
              v-on:click="reviewFilter = !reviewFilter"
              v-bind:class="{Large_red_btn: reviewFilter}"
            >
              Review filter
            </button>
          </div>
          <div class="col-sm-7 reviews-img-section" v-if="reviews">
            <div
              v-for="(review,rkey) in reviews"
              :key="rkey"
            >
              <div v-if="review.images">
              <span
                v-for="(img,ikey) in review.images"
                :key="ikey"
              >
                <img
                  v-if="img && ikey==0"
                  :src="img.image_path"
                  width="90px"
                >
              </span>
              </div>
            </div>
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
                  <star-rating
                    v-model="reviewForm.rating"
                    v-bind:increment="0.5"
                    v-bind:max-rating="5"
                    inactive-color="#ccc"
                    active-color="#e7ba2e"
                    v-bind:star-size="30">
                  </star-rating>
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
    <section class="review-write" v-if="reviewFilter">
      <div class="container_max">
        <div class="row">
          <div class="col-md-12 question-inner">
            <div class="review_form">
              <h4>Reviews Filter</h4>
              <div class="review_form_50">
                <div class="review_form_label">
                  <label>Search: </label>
                  <input type="text" v-model='reviewFilterForm.search' />
                  <span class="error_validation" v-if="reviewFilterForm.errors().has('search')">
                    {{ reviewFilterForm.errors().get('search') }}
                  </span>
                </div>
                <div class="review_form_label">
                  <label>Sort </label>
                  <select v-model='reviewFilterForm.filterSort'>
                    <option value="ASC">Low To High</option>
                    <option value="DESC">High To Low</option>
                  </select>
                </div>
              </div>
              <div class="review_form_50">
                <div class="review_btn_label review_form_label form_label">
                  <button type="button" @click="submitReviewFilter" >Filter</button>
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
              <select @change="sortRatings($event)" name="sortreviews">
                <option value="">Select</option>
                <option value="ASC">Low To High Ratings</option>
                <option value="DESC">High To Low Ratings</option>
              </select>
           </div>
        </div>
        <div v-if="paginationReviews && paginationReviews.length>0">

              <div
                class="row rating_row"
                v-for="(review,rkey) in paginationReviews"
                :key="rkey"
              >
                 <div class="col-md-4 col-lg-3">
                    <div class="star-box" v-if="review && review.user">
                       <div class="varified-img">
                        <span>
                          {{getProductIcon(review.user.name).toUpperCase()}}
                        </span>
                       </div>
                       <div class="star-inner-txt">
                          <h6>
                            {{review.user.name}}
                            <span v-if="review.verified_buyer==1" class="green-txt">Verified Bayer</span>
                            <span v-else class="red-txt">Unverified Bayer</span>
                          </h6>
                          <div><img :src="u_s"><span>{{review.user.country}}</span></div>
                          <div class="star-rating">
                            <star-rating
                              v-model="review.rating"
                              v-bind:increment="0.5"
                              v-bind:max-rating="5"
                              inactive-color="#ccc"
                              active-color="#e7ba2e"
                              v-bind:star-size="15"
                            >
                            </star-rating>
                          </div>
                       </div>
                    </div>
                    <div class="thumb-up">
                      <span v-if="review.status == 1">
                        <img :src="thumb_up">I recommend this product
                      </span>
                      <span v-else>
                        <i class="fa fa-thumbs-down"></i>I don't recommend this product
                      </span>
                    </div>
                 </div>
                <div class="col-md-8 rating-right">
                  <h3>{{review.title}}</h3>
                  <p v-if="readMoreActivated.indexOf(review.id) == -1">{{review.description.substring(0, 200)}}</p>
                  <a v-if="readMoreActivated.indexOf(review.id) == -1 && review.description.length>200" @click="activateReadMore(review.id)" href="javascript:;">read more</a>
                  <p v-if="readMoreActivated.indexOf(review.id) !== -1" v-html="review.description"></p>
                  <a v-if="readMoreActivated.indexOf(review.id) !== -1" @click="deactiveReadMore(review.id)" href="javascript:;">read less</a>
                </div>
              </div>
            </div>
            <div class="card-footer pb-0 pt-3" v-if="reviews.length>10">
                <jw-pagination :items="exampleItems" @changePage="onChangePage"></jw-pagination>
            </div>
          </div>

      </section>
  </div>
</template>
<style>
  @import './products.css';
  @import './swipe.css';
  .viewImg .swiper-slide img {
    width: 100%;
  }
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import HTTP from './../../Api/auth'
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
import StarRating from 'vue-star-rating'
import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'
import VueInfiniteAutocomplete from 'vue-infinite-autocomplete'
import JwPagination from 'jw-vue-pagination'
const exampleItems = [...Array(1).keys()].map(i => ({ id: (i+1), name: 'Item ' + (i+1) }))
export default {
  name:"Products",
  metaInfo() {
      return {
        title: this.pagetitle,
        titleTemplate: '%s | The Pet Parent Store'
      }
  },
  components: {
    Swiper,
    SwiperSlide,
    StarRating,
    "vue-infinite-autocomplete": VueInfiniteAutocomplete,
    JwPagination
  },
  directives: {
    swiper: directive
  },
  data: () => ({
    exampleItems:[],
    product_img:product_img,
    product_t:product_t,
    product_t2:product_t2,
    high_quality_ingradients:high_quality_ingradients,
    high_quality_ingradients_02:high_quality_ingradients_02,
    bm_logo:bm_logo,
    foot_5:foot_5,
    thumb_up:thumb_up,
    quantity:1,
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
      loopedSlides: 3, // looped slides should be the same
      spaceBetween: 15,
      observer: true,
      observeParents: true,
      zoom: true,
      height:850,
      allowTouchMove: true,
      notNextTick: false,
      loadPrevNext: true,
      lazy: {
          loadPrevNext: true,
        },
      lazyLoading : true,
      lazyLoadingInPrevNext: true,
      grabCursor: true,
      pagination: {
          el: ".swiper-pagination"
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      }
    },
    swiperOptionThumbs: {
      loop: true,
      loopedSlides: 3, // looped slides should be the same
      spaceBetween: 15,
      centeredSlides: false,
      slidesPerView: 3,
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
    reviewFilter: false,
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
    reviewForm: form({
      name: '',
      email: '',
      rating: 0,
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
    reviewFilterForm: form({
      search: '',
      filterSort: 'DESC',
      product_id:0
      })
      .rules({
        search: 'required'
      })
      .messages({
        'search.search': 'This field is required!'
      }),
    photoFiles: [],
    faqDetail:[],
    pagetitle:'Product Page',
    readMoreActivated:[],
    reviewError:'',
    reviews:[],
    paginationReviews:[],
    currentValue: "",
    currentOptions: []
  }),
  mounted: function() {
    this.getProdcut()
    this.getFaqs(this.$route.params.id)
    this.getReviews(this.$route.params.id)
    this.getOverAllRating(this.$route.params.id)
  },
  watch: {
    product(){
      this.pagetitle = this.product.name
      this.variations = this.product.variations
      var variation_attributes = this.product.variation_attributes
      var vaarrayCollection=[]
      var _self = this
      if(variation_attributes.length>0){

        variation_attributes.filter(function(varitioonattr,vaindex){
          var vname = varitioonattr.name
          var vid = varitioonattr.id
          var subAttributeArray =[]
          _self.product.attributes.filter(function(attr,attrindex){
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
        var _this=this
        this.faqs.filter(function(val,ind){
          _this.currentOptions.push({'text':val.title,'id':ind})
        })
      }
    },
    reviewsList(){
      this.reviews = this.reviewsList
      if(this.reviews.length>10){
        for(var i=0;i<10;i++){
          this.paginationReviews.push(this.reviewsList[i])
        }
      }else{
        this.paginationReviews=this.reviews
      }
      this.exampleItems = [...Array(this.reviewsList.length).keys()].map(i => ({ id: i, name: (i+1) }))
    }
  },
  computed: {
    ...mapGetters(['product', 'catErrors','addCartItems', 'faqs','reviewsList', 'overAllRating'])
  },
  methods: {
    ...mapActions(['getProduct','addCartItem','getCartItems','addFaq','getFaqs','getReviews','addReview', 'getOverAllRating']),
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
                          quantity: Number(this.quantity),
                          variation_product_id: vid
                        }
        const cartId = localStorage.getItem('cartId')
        HTTP.post(process.env.MIX_APP_APIURL+'cart/'+cartId, itemDetails).then((response) => {
          this.getCartItems()
        })
      }
    },
    variationUpdate(e,attributeId,attnameId,typ){
      var switchTumnb=0
      var _self = this
      this.selectedattrIds.filter(function(selIds,selind){
        if(selIds.type == typ){
          _self.selectedattrIds[selind].id = attributeId
        }
      })
      var varientsArr=[]

      this.variations.filter(function(varients,varindex){
        var countMatch =0;
        varients.variation_attributes.filter(function(varientAttrs, index){
          _self.selectedattrIds.filter(function(getarrtibuteId,indx){
            if(getarrtibuteId.id == varientAttrs.attribute_id){
              countMatch++
            }
          })
        })
        if(countMatch == _self.selectedattrIds.length){
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
      var _self = this
      if (!this.faqForm.validate().errors().any()) {
        var productId = this.$route.params.id
        this.faqForm.data.product_id=productId
        this.addFaq(this.faqForm.data)

        this.$swal({
          title: "Success!",
          text: "Question is created successfully.",
          type: "success",
          timer: 2000
        })
        this.askQuestion=false
      }
    },
    openQuestion(arrayIndex){
      this.faqDetail = this.faqs[arrayIndex]
    },
    reviewImages(fileList){
      this.photoFiles = fileList
    },
    submitReview(){
      this.reviewForm.validate()
      var _self = this
      if (!this.reviewForm.validate().errors().any()) {
        const formData = new FormData()

        Object.keys(this.reviewForm.data).forEach(function(key,index) {
          formData.append(key,_self.reviewForm.data[key])
        })
        formData.append('product_id',this.$route.params.id)
        Object.keys(this.reviewForm.data).forEach(function(key,index) {
            _self.reviewForm.data[key] = ''
        })
        for(var i=0;i<this.photoFiles.length;i++){
          formData.append('images[' + i + ']', this.photoFiles[i]);
        }
        this.addReview(formData)
        this.$swal({
          title: "Success!",
          text: "Thanks for giving review.",
          type: "success",
          timer: 2000
        })
        this.writeReview=false
      }
    },
    getPercentage(overAllRating, total_reviews){
      if(overAllRating > 0 && total_reviews > 0){
        var calval = Number(overAllRating)*100
        var totalPercentage = Number(calval)/5
        return totalPercentage.toFixed(2)
      }else{
        return ''
      }
    },
    overAllRatings(overrating){
      if(overrating && overrating != null){
        return overrating.toFixed(2)
      }
    },
    closeViewer: function(){
      this.viewImg = false;
    },
    quantityPlus(){
      this.quantity = this.quantity+1
    },
    quantityMinus(){
      if(this.quantity>1){
        this.quantity = this.quantity-1
      }
    },
    submitReviewFilter(){
      this.reviewFilterForm.validate()
      if (!this.reviewFilterForm.validate().errors().any()) {
        var productId = this.$route.params.id
        HTTP.get(process.env.MIX_APP_APIURL+'rating/'+productId+'?keyword='+this.reviewFilterForm.data.search+'&type='+this.reviewFilterForm.data.filterSort).then((response) => {
          this.reviews = response.data.data
          if(this.reviews.length>10){
            for(var i=0;i<10;i++){
              this.paginationReviews.push(this.reviewsList[i])
            }
          }else{
            this.paginationReviews=this.reviews
          }
          this.exampleItems = [...Array(this.reviewsList.length).keys()].map(i => ({ id: i, name: (i+1) }))
        }).catch((errors) => {
          this.reviewError= errors.response.data.message
        })
      }
    },
    activateReadMore(ind){
      this.readMoreActivated.push(ind)
    },
    deactiveReadMore(ind){
      this.readMoreActivated.splice(this.readMoreActivated.indexOf(ind), 1)
    },
    questionPosstion(){
      var el = this.$el.getElementsByClassName("questionPosstion")[0];
      el.scrollIntoView()
    },
    reviewPosstion(){
      var el = this.$el.getElementsByClassName("reviewPosstion")[0];
      el.scrollIntoView()
    },
    handleOnSelect(selectedValue) {
      this.openQuestion(selectedValue.id)
    },
    sortRatings(event){
      if(event.target.value !=''){
        var sortby = event.target.value
        var productId = this.$route.params.id
        HTTP.get(process.env.MIX_APP_APIURL+'rating/'+productId+'?keyword=&type='+sortby).then((response) => {
          this.reviews = response.data.data
          if(this.reviews.length>10){
            for(var i=0;i<10;i++){
              this.paginationReviews.push(this.reviews[i])
            }
          }else{
            this.paginationReviews=this.reviews
          }
          this.exampleItems = [...Array(this.reviews.length).keys()].map(i => ({ id: i, name: (i+1) }))
        }).catch((errors) => {
          this.reviewError= errors.response.data.message
        })
      }
    },
    onChangePage(pageOfItems) {
      var _this = this
      this.paginationReviews=[]
      pageOfItems.filter(function(currentval,currentkey){
        _this.paginationReviews.push(_this.reviewsList[currentkey])
      })
    }
  }
}
</script>
