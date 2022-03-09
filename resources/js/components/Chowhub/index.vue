<template>
  <div class="main">
     <div class="container_max">
    <div class="cart_head">
              <img
              :src="cart_logo"
              alt="cart_logo"
              />
          </div>
          <div class="row">
      <div class="col-md-12">
        <ul class="cart_header cart_grid">
        <li>Image</li>
        <li class="pr_tile">Product Name</li>
        <li>Price</li>
        <li>Quantity</li>
        <li>Total Price</li>
        <li>Action</li>
        </ul>

      </div>
    <ul class="listcartItem" v-if="chowhubItems">
      <li
        v-for="(cartItem,keygetCartItem) in chowhubItems"
        :key="keygetCartItem"
      >
        <div
          v-if="cartItem.variationProduct"
          class="cartlabel cart_grid"
        >
           <span class="prod_img"><div class="img_ratio"><img :src="cartItem.variationProduct.image" /></div></span>
          <span class="prod_name" >{{cartItem.product.productName}}</span>
          <span class="prod_price">{{cartItem.variationProduct.sale_price}}</span>
          <span class="prod_quant">
            {{cartItem.quantity}}
          </span>
          <span class="prod_items">{{cartItem.variationProduct.sale_price*cartItem.quantity}}</span>
        </div>
        <div
          v-else
          class="cartlabel"
        >
           <span class="prod_img"><div class="img_ratio"><img :src="cartItem.product.image_path"  /></div></span>
          <span class="prod_name" >{{cartItem.product.productName}}</span>
          <span class="prod_price">{{cartItem.product.sale_price}}</span>
          <span class="prod_quant">
            {{cartItem.quantity}}
          </span>
          <span class="prod_items">{{cartItem.product.sale_price*cartItem.quantity}}</span>
        </div>
      </li>
    </ul>
  </div>
    <p class="totalamount  cart_total text-right">Total Cart Price: <span> {{getChowhubCartTotal()}}</span></p>
  </div>
  </div>
</template>
<style>
  @import './chowhub.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import axios from 'axios';
import cart_logo from "../../assets/images/cart_logo.png"

export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{},
      updateMessage:'',
       cart_logo: cart_logo,
    }
  },
  created(){
    if(window.cartid!='' && window.cartkey!=''){
      var chowhubcart={'cartId':window.cartid,'cartKey':window.cartkey}
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
