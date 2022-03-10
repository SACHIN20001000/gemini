<template>
  <div class="max_1070">
    <h2 class="store_title rd_label">Store Location</h2>
<div class="line_devide"></div>
    <div class="row flex_stores">
     <div class="store_open">
      <div class="store_info">
       <h1>Ankeny, IA</h1> 
       <div class="store_box">
         <div class="store-img">
          <img
            :src="store1"
            alt="Pro1"
          >
         </div>
         <div class="store-info">
           <label>The Pet Parent Store</label>
           <p>1595 NE 69th Place, Suite 92 - 50021 </p>
           <div class="st_loc">
            <a href ="#">Directions</a> 
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
export default {
  name:"Store",
  data: function () {
    return {
      imgPro1: imgPro1,
      store1: store1
    }
  }
}
</script>

<style scoped>
.home{
  background-color: skyblue ;
  height: 500px;
}
</style>
 