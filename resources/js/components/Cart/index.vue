<template>
  <div class="main">
    <p>Cart</p>

    <table width="100%">
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Action</th>
      </tr>
      <tr
        v-for="(cartItem,keygetCartItem) in getCartItem"
        :key="keygetCartItem"
      >
        <td>Image</td>
        <td>{{cartItem.product.productName}}</td>
        <td>{{cartItem.product.sale_price}}</td>
        <td>
          <input
            type="number"
            name="qtyproduct"
            :value="cartItem.quantity"
            v-on:blur="updateQuantity($event,cartItem.id)"
          >
        </td>
        <td>{{cartItem.product.sale_price*cartItem.quantity}}</td>
        <td>
          <a
            class="button"
            href="javascript:;" @click="showAlert(cartItem.id)"
          >
            X
          </a>
        </td>
      </tr>
    </table>
    <p class="totalamount">Total Cart Price: {{cartTotal}}</p>
    <div class="proccedtocheckout">
      <router-link
        :to="{ path: 'checkout'}"
      >
        Proceed To Checkout
      </router-link>
    </div>
  </div>
</template>
<style>
  @import './carts.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"


export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{}
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
      this.$swal('Are you sure?'+cartId).then((result) => {
        this.removeCartItem(cartId)
      })
    },
    updateQuantity(e,cartItemId){
      const _this = this
      const catkey = localStorage.getItem('cartKey')
      let itemDetails = {}
      this.getCartItem.filter(function (cartitem,itemId) {
        if(cartitem.id == cartItemId ){
          itemDetails = {
            key: catkey,
            product_id: cartitem.product_id,
            quantity: e.target.value,
            variation_product_id: 0,
          }
        }
      })
      this.addCartItem(itemDetails)
    }
  }
}
</script>
