<template>
  <div class="main">
    <p>Blog</p>
    <div
      v-if="singlePage"
      class="main"
    >
      <img
        :src="singlePage.feature_image"
        alt="singlePage.title"
      >
      <p>{{singlePage.title}}</p>
      <div>
        {{singlePage.content}}
      </div>
    </div>
  </div>
</template>
<style>
  @import './blog.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"

export default {
  name:"Blog",
  created(){
    if (this.$route.params.slug) {
      this.getPage(this.$route.params.slug)
    }
  },
  computed: {
    ...mapGetters(['singlePage', 'pageErrors'])
  },
  methods: {
    ...mapActions(['getPage'])
  }
}
</script>
