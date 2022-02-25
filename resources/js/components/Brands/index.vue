<template>
  <div class="main">
    <p>Brands</p>
  </div>
</template>
<style>
  @import './brand.css';
</style>
<script>


export default {
  name:"Brands",
  data: function () {
    return {
      title:'Brands',
    }
  },
  created(){
    console.log(this.$route.params.brandid);
  },
  methods: {

  }
}
</script>
