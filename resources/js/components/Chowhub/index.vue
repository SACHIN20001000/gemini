<template>
  <div class="main">
    <p>Cart Details</p>
    <table width="100%" class="headingcart">
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
      </tr>
    </table>
    <ul class="listcartItem" v-if="chowhubItems">
      <li
        v-for="(cartItem,keygetCartItem) in chowhubItems"
        :key="keygetCartItem"
      >
        <div
          v-if="cartItem.variationProduct"
          class="cartlabel"
        >
          <span><img :src="cartItem.variationProduct.image" width="100px" /></span>
          <span>{{cartItem.product.productName}}</span>
          <span>{{cartItem.variationProduct.sale_price}}</span>
          <span>
            {{cartItem.quantity}}
          </span>
          <span>{{cartItem.variationProduct.sale_price*cartItem.quantity}}</span>
        </div>
        <div
          v-else
          class="cartlabel"
        >
          <span><img :src="cartItem.product.image_path" width="100px" /></span>
          <span>{{cartItem.product.productName}}</span>
          <span>{{cartItem.product.sale_price}}</span>
          <span>
            {{cartItem.quantity}}
          </span>
          <span>{{cartItem.product.sale_price*cartItem.quantity}}</span>
        </div>
      </li>
    </ul>
    <p class="totalamount">Total Cart Price: {{getChowhubCartTotal()}}</p>
  </div>
</template>
<style>
  @import './chowhub.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import axios from 'axios';

export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{},
      updateMessage:''
    }
  },
  created(){
    if(this.$route.params.cartid!='' && this.$route.params.cartkey!=''){
      var chowhubcart={'cartId':this.$route.params.cartid,'cartKey':this.$route.params.cartkey}
      this.getChowhubCartItems(chowhubcart)
    }
  },
  watch:{
    chowhubItems(){
      /*this.chowhubItems()*/
    }
  },
  computed: {
    ...mapGetters(['chowhubItems'])
  },
  methods: {
    ...mapActions(['getChowhubCartItems']),
    getChowhubCartTotal(){
      if(this.chowhubItems.length>0){
        return this.chowhubItems.reduce((acc, cartItem) => {
          if(cartItem.variationProduct){
            return (cartItem.quantity * cartItem.variationProduct.sale_price) + acc;
          }else{
            return (cartItem.quantity * cartItem.product.sale_price) + acc;
          }

        }, 0).toFixed(2);
      }
    }
  }
}
</script>
