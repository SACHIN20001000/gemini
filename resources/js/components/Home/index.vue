<template>
  <div class="main">
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
        <div class="col-md-6 treat_bg">
          <a href="#">
            <img
              :src="imgTreats"
              alt="Treats"
            >

            <h2>Treats</h2>
          </a>
        </div>
        <div class="col-md-6 food_bg">
          <a href="#">
            <img
              :src="imgFood"
              alt="Food"
            >
            <h2>Food</h2>
          </a>
        </div>
        <div class="col-md-6 litter_bg">
          <a href="#">
            <img
              :src="imgLitter"
              alt="Litter"
            >
            <h2>Litter</h2>
          </a>
        </div>
        <div class="col-md-6 toy_bg">
          <a href="#">
            <img
              :src="imgToys"
              alt="Toys"
            >
            <h2>Toys</h2>
          </a>
        </div>
        </div>
      </div>
    </section>
    <section class="product_slider">
      <div class="container_max">
        <div class=" row regular slider margin_row">
          <slick
            ref="slick"
            :options="slickOptions"
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
            @lazyLoadError="handleLazeLoadError">
            <a href="http://placehold.it/2000x1000">
              <img :src="imgSl1" alt="">
              <h3>PetAlive Ear Dr. Dog & Cat Ear Drops</h3>
            </a>
            <a href="http://placehold.it/2000x1000">
              <img :src="imgSl2" alt="">
              <h3>PetAlive Ear Dr. Dog & Cat Ear Drops</h3>
            </a>
            <a href="http://placehold.it/2000x1000">
              <img :src="imgSl3" alt="">
              <h3>PetAlive Ear Dr. Dog & Cat Ear Drops</h3>
            </a>
            <a href="http://placehold.it/2000x1000">
              <img :src="imgSl1" alt="">
              <h3>PetAlive Ear Dr. Dog & Cat Ear Drops</h3>
            </a>
            <a href="http://placehold.it/2000x1000">
              <img :src="imgSl2" alt="">
              <h3>PetAlive Ear Dr. Dog & Cat Ear Drops</h3>
            </a>
            <a href="http://placehold.it/2000x1000">
              <img :src="imgSl3" alt="">
              <h3>PetAlive Ear Dr. Dog & Cat Ear Drops</h3>
            </a>
          </slick>
        </div>
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
import imgTreats from "../../assets/images/treats.png"
import imgFood from "../../assets/images/food.png"
import imgLitter from "../../assets/images/litter.png"
import imgToys from "../../assets/images/toys.png"
import imgSl1 from "../../assets/images/sl1.jpg"
import imgSl2 from "../../assets/images/sl2.jpg"
import imgSl3 from "../../assets/images/sl3.jpg"
import Slick from 'vue-slick'

export default {
  name:"Home",
  components: { Slick },
  data: function () {
    return {
      imgShip: imgShip,
      imgPro1: imgPro1,
      imgTreats: imgTreats,
      imgFood: imgFood,
      imgLitter: imgLitter,
      imgToys: imgToys,
      imgSl1: imgSl1,
      imgSl2: imgSl2,
      imgSl3: imgSl3,
      slickOptions: {
        slidesToShow: 3,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
  },
  methods: {
    next() {
        this.$refs.slick.next()
    },
    prev() {
        this.$refs.slick.prev();
    },
    reInit() {
      this.$nextTick(() => {
        this.$refs.slick.reSlick();
      });
    },
    handleAfterChange(event, slick, currentSlide) {
      console.log('handleAfterChange', event, slick, currentSlide);
    },
    handleBeforeChange(event, slick, currentSlide, nextSlide) {
      console.log('handleBeforeChange', event, slick, currentSlide, nextSlide);
    },
    handleBreakpoint(event, slick, breakpoint) {
      console.log('handleBreakpoint', event, slick, breakpoint);
    },
    handleDestroy(event, slick) {
      console.log('handleDestroy', event, slick);
    },
    handleEdge(event, slick, direction) {
      console.log('handleEdge', event, slick, direction);
    },
    handleInit(event, slick) {
      console.log('handleInit', event, slick);
    },
    handleReInit(event, slick) {
      console.log('handleReInit', event, slick);
    },
    handleSetPosition(event, slick) {
      console.log('handleSetPosition', event, slick);
    },
    handleSwipe(event, slick, direction) {
      console.log('handleSwipe', event, slick, direction);
    },
    handleLazyLoaded(event, slick, image, imageSource) {
      console.log('handleLazyLoaded', event, slick, image, imageSource);
    },
    handleLazeLoadError(event, slick, image, imageSource) {
      console.log('handleLazeLoadError', event, slick, image, imageSource);
    }
  }
}
</script>
