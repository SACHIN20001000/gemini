<template>
  <div class="main">
    <Notification ref="notifications"/>
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

      <ul class="listcartItem " v-if="cartItemsList">
        <li
          v-for="(cartItem,keygetCartItem) in cartItemsList"
          :key="keygetCartItem"
        >
          <div
            v-if="cartItem.variationProduct"
            class="cartlabel cart_grid"
          >
            <span class="prod_img"><div class="img_ratio"><img :src="cartItem.variationProduct.image" /></div></span>
            <span class="prod_name">
              {{cartItem.product.productName}}
              <span v-if="cartItem.variationProduct && cartItem.variationProduct.variation_attributes_name_id">
                <ul class="itenVarient">
                  <li
                    v-for="(varientItem, vikey) in cartItem.variationProduct.variation_attributes_name_id"
                    :key="vikey"
                  >
                    {{getVarientName(cartItem.product.attributes,varientItem.attribute_id)}}
                  </li>
                </ul>
              </span>
            </span>
            <span class="prod_price">${{cartItem.variationProduct.sale_price}}</span>
            <span class="prod_quant">
              <input
                type="number"
                name="qtyproduct"
                v-model="cartItemsList[keygetCartItem].quantity"
              >
            </span>
            <span class="prod_items">${{currencyFormat(cartItem.variationProduct.sale_price*cartItem.quantity)}} </span>
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
            <span class="prod_price">${{cartItem.product.sale_price}}</span>
            <span class="prod_quant">
              <input
                type="number"
                name="qtyproduct"
                v-model="cartItemsList[keygetCartItem].quantity"
              >
            </span>
            <span class="prod_items">${{cartItem.product.sale_price*cartItem.quantity}}</span>
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
              <router-link
                :to="{ path: '/'}"
                class="btn_blu"
              >
                Continue Shopping
              </router-link>
              <router-link
                :to="{ path: 'checkout'}"
                class="btn_red"
              >
                Check Out <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </router-link>
            </div>
          </div>
           <div class="col-md-5">
            <div class="btn_right text-right" v-if="btnUpdateCart">
              <a href="javascript:;" @click="updateCart" class="btn_blu_blank">Update Cart</a>
            </div>
            <div class="btn_right text-right" v-else>
              <img :src="loading" width="30">
            </div>
          </div>
         </div>

      <p class="totalamount cart_total">Total Cart Price: <span>${{cartTotal}}</span></p>
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
    </div>
  </div>
</template>
<style>
  @import './carts.css';
</style>
<script>
import cart_logo from "../../assets/images/cart_logo.png"
import cart_pay from "../../assets/images/pay.png"
import loading from "../../assets/images/loading.gif"

import {mapActions,mapGetters} from "vuex"
import axios from 'axios';
import Notification from '../Notification'
export default {
  name:"Carts",
  components: {
    Notification
  },
  data: function () {
    return {
      cartItemsList:{},
      cart_logo: cart_logo,
      cart_pay: cart_pay,
      btnUpdateCart:true,
      loading:loading
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
    currencyFormat(priceVal){
      return priceVal.toFixed(2)
    },
    updateCart(){
      const _this = this
      this.btnUpdateCart=false
      const catkey = localStorage.getItem('cartKey')
      let itemDetails = []
      this.cartItemsList.filter(function (cartitem,itemId) {
        if(cartitem.variationProduct){
          itemDetails.push({
            key: catkey,
            product_id: cartitem.product_id,
            quantity: Number(cartitem.quantity),
            variation_product_id: cartitem.variationProduct.id,
          })
        }else {
          itemDetails.push({
            key: catkey,
            product_id: cartitem.product_id,
            quantity: Number(cartitem.quantity),
            variation_product_id: 0,
          })
        }
      })
      var cartItems = {'cartitems':itemDetails}
      const cartId = localStorage.getItem('cartId')
      axios.post(process.env.MIX_APP_APIURL+'cart/update/'+cartId, cartItems).then(res => {
        this.updateMessage = res.data.message;
        this.$refs.notifications.displayNotification('success','Cart Updated','Cart is updated.')
        this.btnUpdateCart=true
        axios.get(process.env.MIX_APP_APIURL+'cart/'+cartId+'?key='+catkey).then((response) => {
          this.cartItemsList = response.data.data
        })
      })
    },
    getVarientName(attrArrs,attId){
      var attname=''
      attrArrs.filter(function(val,ind){
        if(val.id == attId){
          attname=val.name
        }
      })
      return attname
    }
  }
}
</script>
