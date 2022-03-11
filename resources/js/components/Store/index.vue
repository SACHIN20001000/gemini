<template>
  <div class="max_1070">
    <h2 class="store_title rd_label">Store Location</h2>
<div class="line_devide"></div>
    <div class="row flex_stores" v-if="stores">
      <div
        class="store_open"
        v-for="(store,skey) in stores"
        :key="skey"
      >
      <div class="store_info">
       <h1>{{store.city}}, {{store.state}}</h1>
       <div class="store_box">
         <div class="store-img" v-if="store.gallary">
          <img
            :src="store.gallary[0].image_path"
            alt="Pro1"
          >
         </div>
         <div class="store-info">
           <label>{{store.name}}</label>
           <p>{{store.address}} - {{store.zip_code}} </p>
           <div class="st_loc">
            <a :href="store.direction_link" target="_blank">Directions</a>
           </div>
         </div>
       </div>
      </div>
     </div>
     <div class="st-soon">
       <div class="soon-text">
         <h1>Comming Soon</h1>
       </div>
     </div>
    </div>

  </div>
</template>
<style>
  @import './store.css';
</style>
<script>
  import imgPro1 from "../../assets/images/pro1.png"
  import store1 from "../../assets/images/store-1.jpg"

  import {mapActions,mapGetters} from "vuex"

export default {
  name:"Store",
  data: function () {
    return {
      imgPro1: imgPro1,
      store1: store1
    }
  },
  created(){
    this.getStores()
  },
  computed: {
    ...mapGetters(['stores'])
  },
  methods: {
    ...mapActions(['getStores']),
  }
}
</script>

<style scoped>
.home{
  background-color: skyblue ;
  height: 500px;
}
</style>
