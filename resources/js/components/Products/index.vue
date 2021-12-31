<template>
  <div class="main">
    <p>Product</p>
    <div v-if="product">
      <div v-if="product.gallary && product.gallary.length>0">
        <img
          :src="product.gallary[0].image_path"
          :alt="product.name"
        >
      </div>
      <p>Name: {{product.name}}</p>
      <p>weight: {{product.weight}}</p>
      <p>Description:</p>
      <div>{{product.description}}</div>
      <p>Quantity: {{product.quantity}}</p>
      <p>Real Price: {{product.real_price}}</p>
      <p>Sale Price: {{product.sale_price}}</p>
    </div>
    <p>
      <a
        class="button"
        @click="addItemInCart(product.id)"
      >
        <strong>Add to Cart</strong>
      </a>
    </p>
  </div>
  <!--<vue-product-slider>
      <template slot="slider">
        <div class="slide">
          <img
            :src="imgslider1"
          >
        </div>
        <div class="slide">
          <img
            :src="imgslider2"
          >
        </div>
        <div class="slide">
          <img
            :src="imgslider3"
          >
        </div>
      </template>
      <template slot="thumbnails">
          <div class="thumb">
            <img
              :src="imgslider1"
            >
          </div>
          <div class="thumb">
            <img
              :src="imgslider2"
            >
          </div>
          <div class="thumb">
            <img
              :src="imgslider3"
            >
          </div>
      </template>
    </vue-product-slider>-->
</template>
<style>
  @import './products.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
/*import { VueProductSlider } from 'vue-product-slider'*/

/*import imgslider1 from "../../assets/images/pro1.png"
import imgslider2 from "../../assets/images/pro1.png"
import imgslider3 from "../../assets/images/pro1.png"*/

export default {
  name:"Products",
  /*components: {
      VueProductSlider
  },
  data: function () {
    return {
      itemDetails: {
        key: 1,
        product_id: 0,
        quantity: 2,
      }
    }
  },*/
  mounted(){
    this.getProdcut()
  },
  watch: {
    addCartItems(){
      this.getCartItems()
    }
  },
  computed: {
    ...mapGetters(['product', 'catErrors','addCartItems'])
  },
  methods: {
    ...mapActions(['getProduct','addCartItem','getCartItems']),
    getProdcut(){
      if (this.$route.params.id) {
        this.getProduct(this.$route.params.id)
      }
    },
    addItemInCart(proId){
      if(proId){
        const cartkey = localStorage.getItem('cartKey')
        const itemDetails= {
          key: cartkey,
          product_id: proId,
          quantity: 1,
          variation_product_id:0
        }
        this.addCartItem(itemDetails)

      }
    }
  }
}
</script>
