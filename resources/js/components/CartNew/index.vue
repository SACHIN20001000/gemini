<template>
  <div class="main">
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
<div class="cart_grids">
  <div class="cart_cols cart_header">
    <div class="cr_title text-left"><span class="desk_only">Item </span><span class="mobil_only">Items(s) Added to Your Cart</span></div>
    <div class="cr_title text-left">How to Get it</div>
    <div class="cr_title text-center">Unit Price</div>
    <div class="cr_title text-center">Quantity</div>
    <div class="cr_title text-right pe-8">Item Total</div>
  </div>
  <div class="cart_cols cart_body">
    <div class="cr_data gd-img">
      <div class="pr-img">
        <img  :src="itemImg">
      </div>
      <div class="pr-details">
        <label>Pet Parents® Dog Diapers </label>
        <span>Princess | Size: S</span>
      </div>
    </div>
    <div class="cr_data get-item">
      <p><input type="radio"> <label>In-Store</label></p>
      <p><input type="radio"> <label>Curbside</label></p>
      <p><input type="radio"> <label>Ship</label></p>
    </div>
    <div class="cr_data it-price">
    <h2><span>Item Price:</span><div>$25.00</div></h2>
    </div>
          <div class="cr_data cr-number">
            <div class="col-auto quantity_select quant_3">
            <!-- <label for="staticEmail2" class="sr-only">Quantity</label>    -->
            <div class="number-input md-number-input">
            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">-</button>
            <input class="quantity" min="0" name="quantity" value="1" type="number">
            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">+</button>
            </div>
            </div>
          </div>
          <div class="cr_data cr-total text-right pe-8">
            <h2>$50.00<a href="#">remove item</a></h2>
          </div>
  </div>
   <div class="cart_cols cart_body">
    <div class="cr_data gd-img">
      <div class="pr-img">
        <img  :src="itemImg">
      </div>
      <div class="pr-details">
        <label>Pet Parents® Dog Diapers </label>
        <span>Princess | Size: S</span>
      </div>
    </div>
    <div class="cr_data get-item">
      <p><input type="radio"> <label>In-Store</label></p>
      <p><input type="radio"> <label>Curbside</label></p>
      <p><input type="radio"> <label>Ship</label></p>
    </div>
    <div class="cr_data it-price">
    <h2><span>Item Price:</span><div>$25.00</div></h2>
    </div>
          <div class="cr_data cr-number">
            <div class="col-auto quantity_select quant_3">
            <!-- <label for="staticEmail2" class="sr-only">Quantity</label>    -->
            <div class="number-input md-number-input">
            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">-</button>
            <input class="quantity" min="0" name="quantity" value="1" type="number">
            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">+</button>
            </div>
            </div>
          </div>
          <div class="cr_data cr-total text-right pe-8">
            <h2>$50.00<a href="#">remove item</a></h2>
          </div>
  </div>
</div>

<div class="cart_detal">
  <div class="cr-banner">
    <img :src="cart_banner">
  </div>

    <div class="cart_detail_box">
    <ul class="ct_listing">
      <div>
        <li>
        <p>Merchandise Total <label>$106.98</label></p>
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
        <p>Total<label class="lb_total">$106.98</label></p>
        </li>
      </div>
    </ul>
    <div class="btn-flex">
     <a href="#" class=" btn btn_grey">Keep Shopping</a> 
     <a href="#" class="btn_blu">Continue to Chckout</a> 
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
import itemImg from "../../assets/images/m1.png"
import cart_banner from "../../assets/images/cart-banner.jpg"

export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{},
      cart_logo: cart_logo,
      cart_pay: cart_pay,
      itemImg: itemImg,
      cart_banner: cart_banner,
      btnUpdateCart:true,
      loading:loading
    }
  }
}
</script>
