<template>
  <div class="main">
    <p>Category</p>
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
