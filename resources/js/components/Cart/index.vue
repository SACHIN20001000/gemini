<template>
  <div class="main">
    <p>Cart</p>
    <table width="100%" class="headingcart">
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Action</th>
      </tr>
    </table>
    <ul class="listcartItem" v-if="getCartItem">
      <li
        v-for="(cartItem,keygetCartItem) in getCartItem"
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
            <input
              type="number"
              name="qtyproduct"
              :value="cartItem.quantity"
              v-on:blur="updateQuantity($event,cartItem.id)"
            >
          </span>
          <span>{{cartItem.variationProduct.sale_price*cartItem.quantity}}</span>
          <span>
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
          <span><img :src="cartItem.product.image_path" width="100px" /></span>
          <span>{{cartItem.product.productName}}</span>
          <span>{{cartItem.product.sale_price}}</span>
          <span>
            <input
              type="number"
              name="qtyproduct"
              :value="cartItem.quantity"
              v-on:blur="updateQuantity($event,cartItem.id)"
            >
          </span>
          <span>{{cartItem.product.sale_price*cartItem.quantity}}</span>
          <span>
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
    <p class="totalamount">Total Cart Price: {{cartTotal}}</p>
    <div class="proccedtocheckout">
      <router-link
        :to="{ path: 'checkout'}"
      >
        Proceed To Checkout
      </router-link>
    </div>
    <div class="proccedtocheckout">
      <p>{{updateMessage}}</p>
    </div>
  </div>
</template>
<style>
  @import './carts.css';
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
