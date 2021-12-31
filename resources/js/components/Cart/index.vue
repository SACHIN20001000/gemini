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
            type="text"
            name="qtyproduct"
            :value="cartItem.quantity"
          >
        </td>
        <td>{{cartItem.product.sale_price*cartItem.quantity}}</td>
        <td><a class="button" href="cartItem.id"> X </a></td>
      </tr>
    </table>
    <p class="totalamount">Total Cart Price: {{cartTotal}}</p>
  </div>
</template>
<style>
  @import './carts.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"


export default {
  name:"Carts",
  created(){
    if(localStorage.getItem('cartId')){
      this.getCartItems(localStorage.getItem('cartId'))
    }
  },
  computed: {
    ...mapGetters(['getCartItem','cartTotal'])
  },
  methods: {
    ...mapActions(['getCartItems'])
  }
}
</script>
