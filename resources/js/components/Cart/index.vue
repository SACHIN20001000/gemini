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

    <ul class="listcartItem " v-if="getCartItem">
      <li
        v-for="(cartItem,keygetCartItem) in getCartItem"
        :key="keygetCartItem"
      >
        <div 
          v-if="cartItem.variationProduct"
          class="cartlabel cart_grid"
        >
          <span class="prod_img"><div class="img_ratio"><img :src="cartItem.variationProduct.image" /></div></span>
          <span class="prod_name">{{cartItem.product.productName}}</span>
          <span class="prod_price">{{cartItem.variationProduct.sale_price}}</span>
          <span class="prod_quant">
            <input
              type="number"
              name="qtyproduct"
              :value="cartItem.quantity"
              v-on:blur="updateQuantity($event,cartItem.id)"
            >
          </span>
          <span class="prod_items">{{cartItem.variationProduct.sale_price*cartItem.quantity}}</span>
          <span class="prod_remove">
            <a
              class="button"
              href="javascript:;" @click="showAlert(cartItem.id)"
            >
              X
            </a>
          </span>
        </div>
        <div
          v-else
          class="cartlabel"
        >
          <span class="prod_img"><div class="img_ratio"><img :src="cartItem.product.image_path" /></div></span>
          <span class="prod_name">{{cartItem.product.productName}}</span>
          <span class="prod_price">{{cartItem.product.sale_price}}</span>
          <span class="prod_quant">
            <input
              type="number"
              name="qtyproduct"
              :value="cartItem.quantity"
              v-on:blur="updateQuantity($event,cartItem.id)"
            >
          </span>
          <span class="prod_items">{{cartItem.product.sale_price*cartItem.quantity}}</span>
          <span class="prod_remove">
            <a
              class="button"
              href="javascript:;" @click="showAlert(cartItem.id)"
            >
              X
            </a>
          </span>
        </div>
      </li>
    </ul>
       </div>
       <div class="row update_row">
        <div class="col-md-7">
          <div class="btn_left">
            <a href="#" class="btn_blu">Continue Shopping</a>
            <a href="#" class="btn_red">Check Out <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
         <div class="col-md-5">          
          <div class="btn_right text-right">
            <a href="#" class="btn_blu_blank">Update Cart</a>
          </div>
        </div>
       </div>

    <p class="totalamount cart_total">Total Cart Price: <span>{{cartTotal}}</span></p>
    <div class="proccedtocheckout1 text-right">
      <p class="msg_offer">YOU ARE $13.01 AWAY FROM FREE SHIPPING</p>
      <div class="msg_blu"> <span class="btn_blu">FREE 3 DAY SHIPPING ON U.S. ORDERS OVER $45</span></div>
      <router-link class="btn_red"
        :to="{ path: 'checkout'}"
      >
        Proceed To Checkout <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
      </router-link>
      <div class="pay_type">
      <a href="#">
       <img
            :src="cart_pay"
            alt="cart_pay"
            />
          </a>
        </div>
    </div>
    <div class="proccedtocheckout">
      <p>{{updateMessage}}</p>
    </div>
    </div>
  </div>
</template>
<style>
  @import './carts.css';
</style>
<script>
import cart_logo from "../../assets/images/cart_logo.png"
import cart_pay from "../../assets/images/pay.png"
import {mapActions,mapGetters} from "vuex"
import axios from 'axios';

export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{},
      cart_logo: cart_logo,
      cart_pay: cart_pay,
      updateMessage:''
    }
  },
  created(){
    if(localStorage.getItem('cartId')){
      this.getCartItems(localStorage.getItem('cartId'))
    }
  },
  watch:{
    deleteCartItem(){
      this.getCartItems()
    },
    getCartItem(){
      this.cartItemsList = this.getCartItem
    },
    addCartItems(){
      this.getCartItems()
    }
  },
  computed: {
    ...mapGetters(['getCartItem','cartTotal','deleteCartItem','addCartItems'])
  },
  methods: {
    ...mapActions(['getCartItems','removeCartItem','addCartItem']),
    showAlert(cartId){
      this.$swal('Are you sure?').then((result) => {
        this.removeCartItem(cartId)
      })
    },
    updateQuantity(e,cartItemId){
      const _this = this
      const catkey = localStorage.getItem('cartKey')
      let itemDetails = {}
      this.getCartItem.filter(function (cartitem,itemId) {
        if(cartitem.id == cartItemId ){
          if(cartitem.variationProduct){
            itemDetails = {
              key: catkey,
              product_id: cartitem.product_id,
              quantity: e.target.value,
              variation_product_id: cartitem.variationProduct.id,
            }
          }else {
            itemDetails = {
              key: catkey,
              product_id: cartitem.product_id,
              quantity: e.target.value,
              variation_product_id: 0,
            }
          }
        }
      })
      /*this.addCartItem(itemDetails)*/
      const cartId = localStorage.getItem('cartId')
      axios.post(process.env.MIX_APP_APIURL+'cart/'+cartId, itemDetails).then(res => {
        this.updateMessage = res.data.message;
        this.getCartItems()
      })
    }
  }
}
</script>
