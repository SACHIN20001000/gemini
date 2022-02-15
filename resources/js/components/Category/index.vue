<template>
  <div class="main">
       <div class="Menu">
        <MenuBurger :handleBurgerClicked="clickBurger" />
        <MenuShadow :isActive="isActive" :handleShadowClicked="clickShadow" />
        <div class="Menu__panel-wrapper"
            :class="{'isActive': isActive}"
            :style="[style_wrapperStyle, isActive ? style_wrapperActiveStyle : {}]"
        >
        <!-- prev -->
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
    <div v-if="category">
      <img
        :src="category.feature_image"
        alt="category.name"
      >
      <p>{{category.name}}</p>
    </div>
    <div class="productList">
      <ul v-if="productsByCategory">
        <li v-for="(productsbycat, pbckey) in productsByCategory"  :key="pbckey">
          <span v-for="(gallary,gkey) in productsbycat.gallary"  :key="gkey">
            <span v-if="gkey<1">
              <img :src="gallary.image_path" />
            </span>
          </span>
          <span>
            <router-link
              :to="{ path: '/products/'+productSlug(productsbycat.name)+'/'+productsbycat.id}"
            >
              {{productsbycat.name}}
            </router-link>
          </span>
          <span>
            Price: {{productsbycat.sale_price}}
          </span>
        </li>
      </ul>
    </div>
  </div>
</template>
<style>
  @import './category.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import demoData from '../../demo-data.js';

import functionalityStyle from '../mixins/functionalityStyle.mixin';
import panelControl from '../mixins/panelControl.mixin';
import contentControl from '../mixins/contentControl.mixin';

import RightArrowIcon from '../icons/RightArrowIcon.vue';
import LeftArrowIcon from '../icons/LeftArrowIcon.vue';
import MenuBurger from '../MenuBurger.vue';
import MenuShadow from '../MenuShadow.vue';
import MenuPanel from '../MenuPanel.vue';

export default {
  name:"Category",
  mixins: [
      functionalityStyle,
      panelControl,
      contentControl,
  ],
  components: {
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
      category:[],
      isActive: false,
      isTranslating: false
    }
  },
  mounted() {
        this.content_currentItem = this.source;
  },
  created(){
    this.getCategories()
  },
  watch:{
    categories(){
      if (this.$route.params.slug) {
        this.category = this.singleCategory(this.$route.params.slug)
        this.getProductsByCategory(this.category.id)
      }
    },
    list() {
      this.content_currentItem = this.source
    }
  },
  computed: {
    ...mapGetters(['categories', 'catErrors','productsByCategory']),
    currentItemHasParent() {
            return this.content_parentStack.length >= 1
    },
    prevItemHasParent() {
        return this.content_parentStack.length >= 2
    }
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
            this.setTranslating(false);

            // homing
            this.panel_homingPosition();
            this.content_homingItemAfterBack();
        }, this.menuSwitchSpeed);
    },

    // utils
    setTranslating(status) {
        this.isTranslating = status;
    }
  }
}
</script>
<style>
  .viewport-warning {
    display: none !important;
}

.lv_0 a, .lv_0 {
    font-size: 30px;
    font-weight: 700;
    color: #9d9d9c !important;
}
.bottom_menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: block;
    clear: both;
    position: absolute;
    bottom: 40px;
}
.Menu__list
{padding:  0 20px !important;}

 .Menu__list li {  padding: 0!important;}
.bottom_menu ul li a {
    font-size: 18px;
    text-decoration: none;
    color: #9d9d9c;
    padding:  0 20px;
    font-weight: 300;
    line-height: 41px;
}
.lv_0:before {
    content: "";
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-left: 10px solid #00b3ba;
    position: absolute;
    right: 17px;
}
li.Menu__item.lv_1:before {
    content: "";
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    border-left: 7px solid #00b3ba;
    position: absolute;
    right: 17px;
}
.Menu__header .arrow {
    display: none !important;
}
.Menu__panel {
    padding-top: 30px;
}
.Menu__header {
    padding: 20px !important;
    font-size: 24px !important;
    font-weight: 700;
    margin: 30px 0 0 0 !important;
    color: #9d9d9c !important;
}
.bottom_menu ul li a img {
    margin-right: 10px;
    display: inline-block;
}
.lv_0:after ,li.Menu__item.lv_1:after{
    content: "";
    flex-grow: 1;
    height: 1px;
    background: #ededed;
    margin-left: 10px;
}
.lv_0 a, .lv_0 {
    font-size: 24px;
    font-weight: 700;
    color: #9d9d9c !important;
    margin: 30px 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between;

}
li.Menu__item.lv_1 a, li.Menu__item.lv_1 {
    font-size: 18px;
    color: #9d9d9c;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between;
    font-weight: 500;
    line-height: 1.9 !important;
    height: auto;
}
  </style>

