<template>
  <div @mouseleave="hideMegaMenu()" class="megamenu-wrapper">
    <div class="main-categories">
      <div
        @mouseover="changeMainCategory(1)"
        :class="['main-category', isActive(1) ? 'active' : '']"
      >
        <!--<div class="icon"><img :src="mainCategory" /></div>-->
        <div class="label">Dog</div>
      </div>
      <div
        @mouseover="changeMainCategory(2)"
        :class="['main-category', isActive(2) ? 'active' : '']"
      >
       <!-- <div class="icon"><img :src="mainCategory" /></div>-->
        <div class="label">Cat</div>
      </div>
      <div
        @mouseover="changeMainCategory(3)"
        :class="['main-category', isActive(3) ? 'active' : '']"
      >
       <!-- <div class="icon"><img :src="mainCategory" /></div>-->
        <div class="label">Age</div>
      </div>
      <div
        @mouseover="changeMainCategory(4)"
        :class="['main-category', isActive(4) ? 'active' : '']"
      >
       <!-- <div class="icon"><img :src="mainCategory" /></div> -->
        <div class="label">Needs</div>
      </div>
      <div
        @mouseover="changeMainCategory(5)"
        :class="['main-category', isActive(5) ? 'active' : '']"
      >
        <!-- <div class="icon"><img :src="mainCategory" /></div> -->
        <div class="label">Brands</div>
      </div>
      <div
        @mouseover="changeMainCategory(6)"
        :class="['main-category', isActive(6) ? 'active' : '']"
      >
        <!--<div class="icon"><img :src="mainCategory" /></div>-->
        <div class="label">Pet Parents<sup>®</sup></div>
      </div>
      <!--<div
        @mouseover="changeMainCategory(7)"
        :class="['main-category', isActive(7) ? 'active' : '']"
      >
      <div class="icon"><img :src="mainCategory" /></div>
        <div class="label">Main category hello 7</div>
      </div>-->

    </div>
    <div class="sub-categories cat_grid" v-if="activeMainCategory==1" id="cat_1">
     <div class="sub-category_menu">
      <div class="menu_cols">
        <ul>
          <li><h3>Food</h3></li>
         <li><a href="#">Dry food</a></li>
         <li><a href="#">Wet food</a></li>
         <li><a href="#">Raw food</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
        <ul>
          <li><h3>Treats</h3></li>
         <li><a href="#">Biscuits & Crunchy</a></li>
         <li><a href="#">Soft & Chewy</a></li>
         <li><a href="#">Dental</a></li>
         <li><a href="#">Jerky </a></li>
         <li><a href="#">Bones & Bully Sticks</a></li>
         <li><a href="#">Freeze-Dried</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
         <ul>
          <li><h3>Toys</h3></li>
         <li><a href="#">Chew</a></li>
         <li><a href="#">Plush</a></li>
         <li><a href="#">Fetch</a></li>
         <li><a href="#">Rope & Tug</a></li>
         <li><a href="#">Interactive</a></li>
         <li><a href="#">Storage</a></li>
         <li><a href="#">Variety Packs</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
          <ul>
          <li><h3>Healthcare</h3></li>
         <li><a href="#">Dental</a></li>
         <li><a href="#">Heartworn & Worm Prevention</a></li>
         <li><a href="#">Milk Replacers</a></li>
         <li><a href="#">Ear Care</a></li>
         <li><a href="#">Eye Care</a></li>
         <li><a href="#">Calming & Anxiety</a></li>
         <li><a href="#">Vitamins</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
          <ul>
          <li><h3>Supplies</h3></li>
         <li><a href="#">Beds</a></li>
         <li><a href="#">Bowls & Feeders</a></li>
         <li><a href="#">Leashes, Collar & Harnesses</a></li>
         <li><a href="#">Crates, Pens, & Gates</a></li>
         <li><a href="#">Carriers & Travel</a></li>
         <li><a href="#">Clothing & Accessories</a></li>
         <li><a href="#">Training</a></li>
         <li><a href="#">Technology</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
      </div>
      <div class="menu_brand">
        <h3>Brands</h3>
       <ul>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
       </ul>
      </div>
        </div>

      <div class="sub-category_image" style="background: #9d8ac1;  margin: -30px 0;">
      <div class="menu_banner">
       <a href="#">
        <h2>THE
        SUPPLEMENT
        TREAT YOUR
        PUP WILL
        WANT TO EAT</h2>
        <img :src="m1">
        <a href="#">Shop</a>
       </a>
      </div>
      </div>
    </div>


    <div class="sub-categories cat_grid_6_4" v-if="activeMainCategory==2">
 <div class="sub-category_menu">
      <div class="menu_cols">
        <ul>
          <li><h3>Food</h3></li>
         <li><a href="#">Dry food</a></li>
         <li><a href="#">Wet food</a></li>
         <li><a href="#">Raw food</a></li>
         <li><a href="#">Toppings</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
        <ul>
          <li><h3>Litter</h3></li>
         <li><a href="#">Litter</a></li>
         <li><a href="#">Litter Boxes</a></li>
         <li><a href="#">Litter Accessorie</a></li>
         <li><a href="#">Waste Disposal</a></li>
         <li><a href="#">Cleaners & Deodorizers</a></li>
         <li><a href="#">Litter Enclosures</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
         <ul>
          <li><h3>Litter Enclosures</h3></li>
         <li><a href="#">Treats</a></li>
         <li><a href="#">Bowls & Feeders</a></li>
         <li><a href="#">Grooming</a></li>
         <li><a href="#">Beds</a></li>
         <li><a href="#">Healthcare</a></li>
         <li><a href="#">Flea & Tick</a></li>
         <li><a href="#">Flea & Tick</a></li>
         <li><a href="#">Trees, Condos, & Scratchers</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>

      </div>
      <div class="menu_brand">
        <h3>Brands</h3>
       <ul>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
       </ul>
      </div>
        </div>

      <div class="sub-category_image" style="background: #ebdac6;  margin: -30px 0;">
      <div class="menu_banner">
       <a href="#">
        <h2 class="h43">Quality litter
plus health
monitorinG
</h2>
        <img :src="m2" style="margin: -10px 0 70px 0;">
        <a href="#" class="btn_blu_banner">Shop</a>
       </a>
      </div>
      </div>
    </div>
    <div class="sub-categories cat_grid_6_4" v-if="activeMainCategory==3">
     <div class="sub-category_menu">
      <div class="menu_cols col_3s">
        <ul>
          <li><h3>Puppy</h3></li>
         <li><a href="#">Puppy Food</a></li>
         <li><a href="#">Puppy Treats</a></li>
         <li><a href="#">Toys</a></li>
         <li><a href="#">Bedding/Essentials</a></li>
         <li><a href="#">Potty Training</a></li>
         <li><a href="#">Walking Supplies</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
        <ul>
          <li><h3>Adult Dogr</h3></li>
         <li><a href="#">Food</a></li>
         <li><a href="#">Treats</a></li>
         <li><a href="#">Toys</a></li>
         <li><a href="#">Healthcare</a></li>
         <li><a href="#">Vitamins & Supps</a></li>
         <li><a href="#">Crates, Penns, Gates</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
         <ul>
          <li><h3>Senior Dog</h3></li>
         <li><a href="#">Senior Dog Food</a></li>
         <li><a href="#">Beds</a></li>
         <li><a href="#">Senior Dog Treats</a></li>
         <li><a href="#">Health & Wellness</a></li>
         <li><a href="#">Supplements & Vitamins</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
            <ul>
          <li><h3>Kitten</h3></li>
         <li><a href="#">Kitten Food</a></li>
         <li><a href="#">Kitten Treats</a></li>
         <li><a href="#">Toys</a></li>
         <li><a href="#">Litter & Acccessories</a></li>
         <li><a href="#">Bedding</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
        <ul>
          <li><h3>Adult Cat</h3></li>
         <li><a href="#">Food</a></li>
         <li><a href="#">Treats</a></li>
         <li><a href="#">Trees, Condos & Scratches</a></li>
         <li><a href="#">Grooming</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
         <ul>
          <li><h3>Senior Cat</h3></li>
         <li><a href="#">Senior Cat Food</a></li>
         <li><a href="#">Health & Wellness</a></li>
         <li><a href="#">Beds</a></li>
         <li><a href="#">Vitamins</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
      </div>
      <!--<div class="menu_brand">
        <h3>Brands</h3>
       <ul>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
       </ul>
      </div>-->
        </div>

      <div class="sub-category_image" style="background: #94af97;  margin: -30px 0;">
      <div class="menu_banner">
       <a href="#">
        <h2 class="h52 text-center">FOR EVERY
LIFE STAGE
</h2>
        <img :src="m3">
        <a href="#">Shop</a>
       </a>
      </div>
      </div>
    </div>
    <div class="sub-categories cat_grid_5_5" v-if="activeMainCategory==4">
     <div class="sub-category_menu">
      <div class="menu_cols">
        <ul>
          <li><h3>Needs</h3></li>
         <li><a href="#">Female Dogs in Heat</a></li>
         <li><a href="#">Separation Anxiety</a></li>
         <li><a href="#">Male Marking</a></li>
         <li><a href="#">Dog Hip & Joint Issues</a></li>
         <li><a href="#">Aggressive Chewers</a></li>
         </ul>
        <ul>
          <li><h3> <br></h3></li>
         <li><a href="#">Bladder & UTI Issues</a></li>
         <li><a href="#">Incontinence</a></li>
         <li><a href="#">Dog Diarrhea</a></li>
         <li><a href="#">Dog Potty Training</a></li>
         <li><a href="#">Dog Allergy & Itchy Skin</a></li>

        </ul>
      </div>
     <div class="menu_brand mt-8">
        <h3>Brands</h3>
       <ul>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
       </ul>
      </div>
        </div>

      <div class="sub-category_image" style="background: #95bdbf;  margin: -30px 0;">
      <div class="menu_banner text-center">
       <a href="#">
        <h2 class="h72 text-center">FOR EVERY NEED</h2>
        <img :src="m4">
        <a href="#">Shop</a>
       </a>
      </div>
      </div>
    </div>
      <div class="sub-categories grid_100" v-if="activeMainCategory==5">
       <div class="sub-category_menu">
     <div class="menu_brand brand_big">
        <h3>Brands</h3>
       <ul>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
       </ul>
      </div>
        </div>
    </div>
      <div class="sub-categories grid_3_9" v-if="activeMainCategory==6">
       <div class="sub-category_menu">
      <div class="menu_cols">
        <ul>
          <li><h3>Dogs</h3></li>
         <li><a href="#">Diapers</a></li>
         <li><a href="#">Belly Bands</a></li>
         <li><a href="#">Covrs™</a></li>
         <li><a href="#">Extendrs™</a></li>
         <li><a href="#">SoftSupps®</a></li>
         <li><a href="#">Pawtect® Pads</a></li>
         <li><a href="#">Blankets</a></li>
         <li><a href="#">Gnawtlers®</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
        <ul>
          <li><h3>Cats</h3></li>
         <li><a href="#">Diapers</a></li>
         <li><a href="#">Covrs™</a></li>
         <li><a href="#">Extendrs™</a></li>
         <li><a href="#">Extendrs™</a></li>
         <li><a href="#">Blankets</a></li>
         <li class="shop_all"><a href="#">Shop All ></a></li>
        </ul>
      </div>
      <!--<div class="menu_brand">
        <h3>Brands</h3>
       <ul>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
        <li><a href="#"><img :src="paw"></a></li>
       </ul>
      </div>-->
        </div>

      <div class="sub-category_image" style="background: #e3002b;  margin: -30px 0;">
      <div class="menu_banner text-center">
       <a href="#">
        <h2 class="h72 text-center">PET PARENTS®
</h2>
        <img :src="m5" style="margin:-20px 0 0 0">
        <!--<a href="#" class="btn_blu_banner">Shop</a>-->
       </a>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
import eventBus from "../eventBus";
import mainCategory from "../assets/images/main-category.svg"
import subCategory from "../assets/images/sub-category.svg"
import paw from "../assets/images/paw.png"
import m1 from "../assets/images/m1.png"
import m2 from "../assets/images/m2.png"
import m3 from "../assets/images/m3.png"
import m4 from "../assets/images/m4.png"
import m5 from "../assets/images/m5.png"

export default {
  name: "MegaMenu",
  data() {
    return {
      activeMainCategory: 1,
      lastX: 0,
      lastY: 0,
      direction: "",
      throttle: false,
      mainCategory:mainCategory,
      subCategory:subCategory,
      paw:paw,
      m1:m1,
      m2:m2,
      m3:m3,
      m5:m5,
      m4:m4
    };
  },
  methods: {
    hideMegaMenu() {
      eventBus.$emit("hide-mega-menu");
      this.$emit('clicked-show-detail', 'yes')
    },
    isActive(key) {
      return this.activeMainCategory === key;
    },
    mouseDirection(e) {
      if (!this.throttle) {
        this.throttle = true;
        let theta = Math.abs(
          (180 * Math.atan2(e.pageY - this.lastY, e.pageX - this.lastX)) /
            Math.PI
        );
        this.direction = theta > 75 ? "vertical" : "horizontal";
        this.lastX = e.pageX;
        this.lastY = e.pageY;
        setTimeout(() => {
          this.throttle = false;
        }, 50);
      }
    },
    changeMainCategory(index) {
      if (this.direction === "vertical") {
        this.activeMainCategory = index;
      }
    },
  },
  mounted() {
    window.addEventListener("mousemove", this.mouseDirection);
  },
  beforeDestroy() {
    window.removeEventListener("mousemove", this.mouseDirection);
  },
};
</script>

<style scoped>
.megamenu-wrapper {
  border: 1px solid #a4a4a4;
  border-top: none;
  max-width: min(100% - 70px,1280px);
  width: 100%;
  margin: 0 auto;
  min-height: 400px;
  background: #fff;
  display: grid;
  padding: 30px 0px;
  grid-template-columns: 200px 3fr;
  grid-template-rows: 1fr;
  gap: 0px 0px;
  position: absolute;
  top: 100%;
  grid-template-areas: ". .";
}
.menu_brand ul {
    list-style: none;
    padding: 10px 0 0 0;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.mt-8 {
    margin-top: 80px;
}
.menu_brand ul li a img {
    max-width: 100%;
}
.menu_brand ul li a {
    display: inline-block;
    width: 50px;
    height: 50px;
    padding: 9px;
    border: 1px solid rgba(0,0,0,.2);
}
.grid_100 {grid-template-columns: auto !important; }
h2.h43 {
    font-size: 43px !important;
    text-transform: uppercase;
    max-width: 400px;
    line-height: .8 !important;
}
.menu_brand.brand_big a {
    width: 84px !important;
    height: 84px !important;
}
.main-category>.label {
    color: #9d9d9c;
    font-weight: 700;
    padding: 0 10px;
    font-size: 20px;
}
h2.h52.text-center {
    font-size: 52px;
    max-width: 300px;
    margin: 0 auto;
    line-height: .8;
}
.main-category.active>.label {
    background:#706f6f;
    color: #fff;
}
h2.h72 {
    font-size: 72px !important;
    margin-top: -20px;
}
.grid_3_9 {
    grid-template-columns: 3fr 7fr !important;
}
.main-category {
    position: relative;
}
.main-category:before {
    content: "";
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
    border-left: 6px solid #00b7bc;
    position: absolute;
    right: -6px;
}
.menu_cols ul h3,.menu_brand h3 {
    font-size: 20px;
    color: #9d9d9c;
    font-weight: 700;
    text-decoration: underline;
}
.menu_cols li a {
    font-size: 16px;
    font-weight: 300;
    text-decoration: none;
    color: #898989;
}
li.shop_all a {
    font-size: 12px;
    font-weight: 600;
    color: #00b7bc;
}
.main-categories {
    border-right: 1px solid rgba(0,0,0,.2);
        padding: 20px 0 20px 45px;
}

.cat_grid_5_5 {
    grid-template-columns: 4fr 6fr !important;
}
.main-category {
  display: flex;
  cursor: pointer;
  margin: 20px 0;
  flex-direction: row;
  align-items: center;
}
.menu_cols.col_3s {
    flex-wrap: wrap;
}

.menu_cols.col_3s >ul {
    max-width: 30.33%;
    width: 100%;
}

.main-category .icon {
  margin-right: 15px;
}

.main-category.active {
  background: #efefef;
}
.menu_banner {

    height: 100%;
    position: relative;
    padding: 30px 20px;
}
.menu_banner img + a {
    display: block;
    background: #e3002b;
    padding: 4px;
    color: #fff;
    text-align: center;
    max-width: 100px;
    border-radius: 50px;
    margin: 10px auto;
    position: absolute;
    bottom: 35px;
    left: 0;
    right: 0;
}

.sub-categories {
  display: grid;
  grid-template-columns: 4fr 1fr;
  gap: 10px;
  padding:0  0 0 25px;
}
.menu_cols>ul {
    flex-grow: 1;
}
.cat_grid {
    grid-template-columns: 4fr 200px !important;
}
.cat_grid_6_4 {
    grid-template-columns: 5.5fr 4.5fr !important;
}
.sub-category {
  cursor: pointer;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.menu_cols {
    display: flex;
    gap: 20px;
}
.sub-category .label {
  margin-top: 15px;
}
.menu_cols ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.menu_banner h2 {
        font-size: 24px;
        color: #fff;
        font-weight: 700;
        line-height: 1;
}
.menu_banner img {
    max-width: 100%;
    margin: 20px 0;
}
a.btn_blu_banner {
    background: #00b7bc !important;
    bottom: 20px !important;
}
.menu_banner a{text-decoration: none;}
.menu_brand.brand_big ul {
    gap: 30px;
}
.menu_cols li a:hover {
    text-decoration: underline;
}
</style>
