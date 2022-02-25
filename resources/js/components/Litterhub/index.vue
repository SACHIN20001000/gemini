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
    <ul class="listcartItem" v-if="litterhubItems">
      <li
        v-for="(cartItem,keygetCartItem) in litterhubItems"
        :key="keygetCartItem"
      >
        <div
          v-if="cartItem.variationProduct"
          class="cartlabel cart_grid"
        >
           <span class="prod_img"><div class="img_ratio"><img :src="cartItem.variationProduct.image" /></div></span>
          <span class="prod_name" v-if="cartItem.product">{{cartItem.product.productName}}</span>
          <span class="prod_price" v-if="cartItem.variationProduct">{{cartItem.variationProduct.sale_price}}</span>
          <span class="prod_quant">
            {{cartItem.quantity}}
          </span>
          <span class="prod_items">{{cartItem.variationProduct.sale_price*cartItem.quantity}}</span>
        </div>
        <div
          v-else
          class="cartlabel"
        >
           <span class="prod_img"><div class="img_ratio" v-if="cartItem.product"><img :src="cartItem.product.image_path"  /></div></span>
          <span class="prod_name" v-if="cartItem.product">{{cartItem.product.productName}}</span>
          <span class="prod_price" v-if="cartItem.product">{{cartItem.product.sale_price}}</span>
          <span class="prod_quant">
            {{cartItem.quantity}}
          </span>
          <span class="prod_items" v-if="cartItem.product">{{cartItem.product.sale_price*cartItem.quantity}}</span>
        </div>
      </li>
    </ul>
  </div>
    <p class="totalamount  cart_total text-right">Total Cart Price: <span> {{getLitterhubCartTotal()}}</span></p>
  </div>
  </div>
</template>
<style>
  @import './litterhub.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import axios from 'axios';
import cart_logo from "../../assets/images/cart_logo.png"

export default {
  name:"Litterhub",
  data: function () {
    return {
      cartItemsList:{},
      updateMessage:'',
       cart_logo: cart_logo,
    }
  },
  created(){
    if(this.$route.params.cartid!='' && this.$route.params.cartkey!=''){
      var litterhubcart={'cartId':this.$route.params.cartid,'cartKey':this.$route.params.cartkey}
      this.getLitterhubCartItems(litterhubcart)
    }
  },
  watch:{
    litterhubItems(){
      /*this.chowhubItems()*/
    }
  },
  computed: {
    ...mapGetters(['litterhubItems'])
  },
  methods: {
    ...mapActions(['getLitterhubCartItems']),
    getLitterhubCartTotal(){
      var tottalAmout=0;
      if(this.litterhubItems.length>0){
        this.litterhubItems.filter((acc, cartItem) => {
          if(cartItem.variationProduct){
            tottalAmout = (cartItem.quantity * cartItem.variationProduct.sale_price) + acc;
          }else{
            if(cartItem.product){
              tottalAmout =  (cartItem.quantity * cartItem.product.sale_price) + acc;
            }
          }

        })
        return tottalAmout.toFixed(2)
      }else{
        return tottalAmout
      }
    }
  }
}
</script>
