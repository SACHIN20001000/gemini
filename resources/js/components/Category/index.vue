<template>
  <div class="main">
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


export default {
  name:"Category",
  data: function () {
    return {
      category:[],
    }
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
