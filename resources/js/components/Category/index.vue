<template>
  <div class="main">
    <p>Category</p>
    <div v-if="category">
      <img
        :src="category.feature_image"
        alt="category.name"
      >
      <p>{{category.name}}</p>
    </div>
  </div>
</template>
<style>
  @import './profile.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"

export default {
  name:"Category",
  data: function () {
    return {
      category:[]
    }
  },
  created(){
    this.getCategories()
  },
  watch:{
    categories(){
      if (this.$route.params.slug) {
        this.category = this.singleCategory(this.$route.params.slug)
        /*this.getCategory(this.$route.params.slug)*/
      }
    }
  },
  computed: {
    ...mapGetters(['categories', 'catErrors'])
  },
  methods: {
    ...mapActions(['getCategories']),
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
    }
  }
}
</script>
