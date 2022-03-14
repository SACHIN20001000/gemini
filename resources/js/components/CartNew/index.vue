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

      <ul class="listcartItem">
        <li>
          <div
            class="cartlabel"
          >
            <span class="prod_img"><div class="img_ratio"><img width="50px" :src="itemImg" /></div></span>
            <span class="prod_name">Pet Parents® Pawtect® Pads (2pack) of Washable Premium Pee Pads</span>
            <span class="prod_price">$89.99</span>
            <span class="prod_quant">
              <input
                type="number"
                name="qtyproduct"
                value="2"
              >
            </span>
            <span class="prod_items">$20</span>
            <span class="prod_remove">
              <a
                class="button"
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
              <a
                href="/"
                class="btn_blu"
              >
                Continue Shopping
              </a>
              <a
                href="/checkout"
                class="btn_red"
              >
                Check Out <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
           <div class="col-md-5">
            <div class="btn_right text-right">
              <a href="javascript:;" class="btn_blu_blank">Update Cart</a>
            </div>
          </div>
         </div>

      <p class="totalamount cart_total">Total Cart Price: <span>$55.00</span></p>
      <div class="proccedtocheckout1 text-right">
        <p class="msg_offer">YOU ARE $13.01 AWAY FROM FREE SHIPPING</p>
        <div class="msg_blu"> <span class="btn_blu">FREE 3 DAY SHIPPING ON U.S. ORDERS OVER $45</span></div>
        <a class="btn_red"
          href="/checkout"
        >
          Proceed To Checkout <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
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
import itemImg from "../../assets/images/dog1.png"

export default {
  name:"Carts",
  data: function () {
    return {
      cartItemsList:{},
      cart_logo: cart_logo,
      cart_pay: cart_pay,
      itemImg: itemImg,
      btnUpdateCart:true,
      loading:loading
    }
  }
}
</script>
