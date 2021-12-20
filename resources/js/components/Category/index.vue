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
  created(){
    console.log('I ma here----')
    console.log(this.$route.params.id)
    if (this.$route.params.id) {
      this.getCategory(this.$route.params.id)
    }
  },
  computed: {
    ...mapGetters(['category', 'catErrors'])
  },
  methods: {
    ...mapActions(['getCategory'])
  }
}
</script>
