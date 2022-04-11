<template>
  <div class="main" id="mainCart">
    <div class="free_ship_bar">
      <p>
        <img :src="ship">
        Free Shipping on All U.S. Orders Over <b>$49</b>
      </p>
    </div>
    <section class="color_title red">
      <div class="nav_width"><h1>My Cart</h1></div>
    </section>
    <section class="cart_banner">
      <div class="nav_width">
        <div class="banner_grid">
          <div class="wel-come">
            <h2>Welcome back Susan M.!</h2>
          </div>
          <div class="wel-come-p">
            <p>You have 5,341 points, do you want to use them? </p>
          </div>
          <div class="wel-come-stat">
            <div class="stat_box">
              <h3>Redeem <span>5,341</span> Point</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

  <div class="container_max">
  <h1 class="cart_title">Your Shopping Cart</h1>
  <div class="cart_grids"  v-if="chowhubItems">
    <div class="cart_cols cart_header">
      <div class="cr_title text-left">Item</div>
      <div class="cr_title text-center">Price</div>
      <div class="cr_title text-center">Quantity</div>
      <div class="cr_title text-right pe-8">Total Price</div>
    </div>
      <div
      class="cart_grids"
        v-for="(cartItem,keygetCartItem) in chowhubItems"
        :key="keygetCartItem"
      >
        <div v-if="cartItem.variationProduct" class="cart_cols cart_body">
          <div class="cr_data gd-img">
            <div class="pr-img">
              <img :src="cartItem.variationProduct.image" />
            </div>
            <div class="pr-details">
              <label>{{cartItem.product.productName}} </label>
            </div>
          </div>

          <div class="cr_data it-price">
            <h2><span>Item Price:</span><div>${{cartItem.variationProduct.sale_price}}</div></h2>
          </div>
          <div class="cr_data cr-number">
            <div class="col-auto quantity_select quant_3">
              {{cartItem.quantity}}
            </div>
          </div>
          <div class="cr_data cr-total text-right pe-8">
            <h2>
              ${{currencyFormat(cartItem.variationProduct.sale_price*cartItem.quantity)}}
            </h2>
          </div>
        </div>
        <div class="cart_cols cart_body" v-else>
          <div class="cr_data gd-img">
            <div class="pr-img">
              <img :src="cartItem.product.image_path" />
            </div>
            <div class="pr-details">
              <label>{{cartItem.product.productName}}</label>
            </div>
          </div>
          <div class="cr_data it-price">
            <h2><span>Item Price:</span><div>${{cartItem.product.sale_price}}</div></h2>
          </div>
          <div class="cr_data cr-number">
            <div class="col-auto quantity_select quant_3">
              {{chowhubItems[keygetCartItem].quantity}}
            </div>
          </div>
          <div class="cr_data cr-total text-right pe-8">
            <h2>
              ${{cartItem.product.sale_price*cartItem.quantity}}
            </h2>
          </div>
        </div>
      </div>
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
import ship from "../../assets/images/ship.png"

export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{},
      updateMessage:'',
       cart_logo: cart_logo,
       ship: ship,
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
      var tottalAmout=0;
      if(this.chowhubItems.length>0){
        this.chowhubItems.filter((chuwhubVal, cartItemInd) => {
          if(chuwhubVal.variationProduct){
            tottalAmout = tottalAmout+(chuwhubVal.quantity * chuwhubVal.variationProduct.sale_price);
          }else{
            if(chuwhubVal.product){
              tottalAmout =  tottalAmout+(chuwhubVal.quantity * chuwhubVal.product.sale_price);
            }
          }

        })
        return tottalAmout.toFixed(2)
      }else{
        return tottalAmout
      }
    },
    currencyFormat(priceVal){
      return priceVal.toFixed(2)
    }
  }
}
</script>
