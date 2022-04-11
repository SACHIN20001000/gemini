<template>
  <div class="main" id="mainCart">
    <Notification ref="notifications"/>
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
<div class="cart_grids"  v-if="cartItemsList">
  <div class="cart_cols cart_header">
    <div class="cr_title text-left"><span class="desk_only">Item </span><span class="mobil_only">Items(s) Added to Your Cart</span></div>
    <div class="cr_title text-left">How to Get it</div>
    <div class="cr_title text-center">Unit Price</div>
    <div class="cr_title text-center">Quantity</div>
    <div class="cr_title text-right pe-8">Item Total</div>
  </div>
    <div
    class="cart_grids"
      v-for="(cartItem,keygetCartItem) in cartItemsList"
      :key="keygetCartItem"
    >
      <div v-if="cartItem.variationProduct" class="cart_cols cart_body">
        <div class="cr_data gd-img">
          <div class="pr-img">
            <img :src="cartItem.variationProduct.image" />
          </div>
          <div class="pr-details">
            <label>{{cartItem.product.productName}} </label>
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
          </div>
        </div>
        <div class="cr_data get-item">
          <p><input type="radio" checked> <label>In-Store</label></p>
          <p><input type="radio"> <label>Curbside</label></p>
          <p><input type="radio"> <label>Ship</label></p>
        </div>
        <div class="cr_data it-price">
          <h2><span>Item Price:</span><div>${{cartItem.variationProduct.real_price}}</div></h2>
        </div>
        <div class="cr_data cr-number">
          <div class="col-auto quantity_select quant_3">
            <div class="number-input md-number-input">
              <button @click="stepDown(cartItem.product.id)" class="minus">-</button>
              <input
                class="quantity"
                min="0"
                name="qtyproduct"
                :id="'prodcutqytid_'+cartItem.product.id"
                v-model="cartItemsList[keygetCartItem].quantity"
                type="number"
                @onchange="changeRange($event)"
              >
              <button @click="stepUp(cartItem.product.id)" class="plus">+</button>
            </div>
          </div>
        </div>
        <div class="cr_data cr-total text-right pe-8">
          <h2>
            ${{currencyFormat(cartItem.variationProduct.real_price*cartItem.quantity)}}
            <a href="javascript:;" @click="showAlert(cartItem.id)">remove item</a>
          </h2>
        </div>
      </div>
      <div  class="cart_cols cart_body" v-else>
        <div class="cr_data gd-img">
          <div class="pr-img">
            <img :src="cartItem.product.image_path" />
          </div>
          <div class="pr-details">
            <label>{{cartItem.product.productName}}</label>
          </div>
        </div>
        <div class="cr_data get-item">
          <p><input type="radio" checked> <label>In-Store</label></p>
          <p><input type="radio"> <label>Curbside</label></p>
          <p><input type="radio"> <label>Ship</label></p>
        </div>
        <div class="cr_data it-price">
          <h2><span>Item Price:</span><div>${{cartItem.product.real_price}}</div></h2>
        </div>
        <div class="cr_data cr-number">
          <div class="col-auto quantity_select quant_3">
            <div class="number-input md-number-input">
              <button onclick="stepDown(cartItem.product.id)" class="minus">-</button>
              <input
                class="quantity"
                min="0"
                :id="'prodcutqytid_'+cartItem.product.id"
                name="qtyproduct"
                v-model="cartItemsList[keygetCartItem].quantity"
                type="number"
              >
              <button  @click="stepUp(cartItem.product.id)" class="plus">+</button>
            </div>
          </div>
        </div>
        <div class="cr_data cr-total text-right pe-8">
          <h2>
            ${{cartItem.product.real_price*cartItem.quantity}}
            <a href="javascript:;" @click="showAlert(cartItem.id)">remove item</a>
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="cart_detal">
  <div class="cr-banner">
    <img :src="cart_banner" class="desk_only">
    <img :src="mobi_banner" class="mobil_only">
  </div>

    <div class="cart_detail_box">
    <ul class="ct_listing">
      <div>
        <li>
        <p>Merchandise Total <label>${{cartTotal}}</label></p>
        <p>Additional Savings <label>-</label></p>
        </li>

        <li>
        <p>Points Used <label>-</label></p>
        </li>
        <li>
        <p>Shipping <label>-</label></p>
        <p>Estimated Tax<label>-</label></p>
        </li>
        <li>
        <p>Total<label class="lb_total">${{cartTotal}}</label></p>
        </li>
      </div>
    </ul>
    <div class="btn-flex">
     <a href="/" class=" btn btn_grey">Keep Shopping</a>
     <a href="/checkout" class="btn_blu">Continue to Chckout</a>
    </div>

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
import cart_banner from "../../assets/images/cart-banner.jpg"
import mobi_banner from "../../assets/images/mobi_cart.jpg"
import ship from "../../assets/images/ship.png"

import {mapActions,mapGetters} from "vuex"
import axios from 'axios';
import Notification from '../Notification'

export default {
  name:"Carts",
  elsub:'#mainCart',
  components: {
    Notification
  },
  data: function () {
    return {
      cartItemsList:{},
      cart_logo: cart_logo,
      ship: ship,
      cart_pay: cart_pay,
      cart_banner: cart_banner,
      mobi_banner: mobi_banner,
      loading:loading
    }
  },
  created(){
    /*if(localStorage.getItem('cartId')){
      this.getCartItems(localStorage.getItem('cartId'))
    }*/
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
    updateCart(itemDetails){
      var cartItems = {'cartitems':itemDetails}
      const cartId = localStorage.getItem('cartId')
      const catkey = localStorage.getItem('cartKey')
      axios.post(process.env.MIX_APP_APIURL+'cart/update/'+cartId, cartItems).then(res => {
        this.updateMessage = res.data.message;
        this.getCartItems()
        this.$refs.notifications.displayNotification('success','Cart Updated','Cart is updated.')
        /*axios.get(process.env.MIX_APP_APIURL+'cart/'+cartId+'?key='+catkey).then((response) => {
          this.cartItemsList = response.data.data
        })*/
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
    },
    stepDown(proid){
      var prodcutqytid = 'prodcutqytid_'+proid
      if(this.$el.querySelector("#"+prodcutqytid).value>1){
        this.$el.querySelector("#"+prodcutqytid).stepDown()
        const _this = this
        const catkey = localStorage.getItem('cartKey')
        let itemDetails = []
        this.cartItemsList.filter(function (cartitem,itemId) {
          if(cartitem.product_id==proid && cartitem.quantity>0){
            if(cartitem.variationProduct){
              itemDetails.push({
                key: catkey,
                product_id: cartitem.product_id,
                quantity: Number(cartitem.quantity)-1,
                variation_product_id: cartitem.variationProduct.id,
              })
            }else {
              itemDetails.push({
                key: catkey,
                product_id: cartitem.product_id,
                quantity: Number(cartitem.quantity)-1,
                variation_product_id: 0,
              })
            }
          } else{
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
          }
        })
        this.updateCart(itemDetails)
      }
    },
    stepUp(proid){
      var prodcutqytid = 'prodcutqytid_'+proid
      this.$el.querySelector("#"+prodcutqytid).stepUp()
      const _this = this
      const catkey = localStorage.getItem('cartKey')
      let itemDetails = []
      this.cartItemsList.filter(function (cartitem,itemId) {
        if(cartitem.product_id==proid){
          if(cartitem.variationProduct){
            itemDetails.push({
              key: catkey,
              product_id: cartitem.product_id,
              quantity: Number(cartitem.quantity)+1,
              variation_product_id: cartitem.variationProduct.id,
            })
          }else {
            itemDetails.push({
              key: catkey,
              product_id: cartitem.product_id,
              quantity: Number(cartitem.quantity)+1,
              variation_product_id: 0,
            })
          }
        } else{
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
        }
      })
      this.updateCart(itemDetails)
    }
  }
}
</script>
