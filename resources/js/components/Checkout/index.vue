<template>
  <div class="main grad_bg">
    <Notification ref="notifications"/>
    <!--<h1>Checkout</h1>-->
    <div class="checkoutform">
      <div class="twobythree">
        <div class="text-center check_logo">
          <a
            href="/"
          >
            <img :src="paw">
          </a>
      </div>
        <ul class="pay_steps">
          <li>
            <a
              href="/"
            >
              Information
            </a>
          </li>
          <li>
            <a
              href="/cart"
            >
              Cart
            </a>
          </li>
          <li class="active">Payment</li>
        </ul>
          <!--<fieldset class="legend_body">
          <legend>Express checkout</legend>
          <div class="row pay_btns ">
           <div class="col btn_purp"><a href="#">Shop Pay</a></div>
           <div class="col btn_yelo"><a href="#">PayPal</a></div>
           <div class="col btn_black"><a href="#">Gpay</a></div>
          </div>
          </fieldset>-->
          <div class="or">Contact Information</div>
        <ul class="listItem form_list">
          <li><div class="col-md-12"><h3>Billing Address</h3></div></li>
          <li>
            <div class="col-md-12">
              <label>First Name:</label>
              <input name="text" v-model='form.name' placeholder="Full Name">
              <span v-if="form.errors().has('name')">
                {{ form.errors().get('name') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Address:</label>
              <input name="text" v-model='form.address' placeholder="Address">
              <span v-if="form.errors().has('address')">
                {{ form.errors().get('address') }}
              </span>
           </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>City:</label>
              <input name="text" v-model='form.city' placeholder="City">
              <span v-if="form.errors().has('city')">
                {{ form.errors().get('city') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-4">
              <label>State:</label>
              <input name="text" v-model='form.state' placeholder="State">
              <span v-if="form.errors().has('state')">
                {{ form.errors().get('state') }}
              </span>
            </div>
            <div class="col-md-4">
              <label>Country:</label>
              <input name="text" v-model='form.country' placeholder="Country">
              <span v-if="form.errors().has('country')">
                {{ form.errors().get('country') }}
              </span>
            </div>
             <div class="col-md-4">
              <label>Zip:</label>
              <input name="text" v-model='form.zip_code' placeholder="Zip">
              <span v-if="form.errors().has('zip_code')" >
                {{ form.errors().get('zip_code') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Phone:</label>
              <input name="text" v-model='form.phone' placeholder="Phone">
              <span v-if="form.errors().has('phone')">
                {{ form.errors().get('phone') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Email:</label>
              <input name="text" v-model='form.email' placeholder="Email">
              <span v-if="form.errors().has('email')">
                {{ form.errors().get('email') }}
              </span>
            </div>
          </li>
          <li>
          <div class="col-md-12">
              <label>Remark:</label>
              <input name="text" v-model='form.remark' placeholder="Remark">
              <span v-if="form.errors().has('remark')">
                {{ form.errors().get('remark') }}
              </span>
          </div>
          </li>
        </ul>
        <ul class="listItem form_list border_tb">
          <li style="margin-bottom: 0; ">
            <div class="col-md-12">
             <h3>Shipping Address</h3>
            </div>
          </li>
          <li class="check_list">
             <div class="col-md-12">
              <span class="checkbox">
            <input type="checkbox" class="samebillingaddress" v-on:click="isShippingFormDisabled($event)" /> <span>Use same address in shipping address.</span>
            </span>
           </div>
           </li>
        </ul>
        <ul class="listItem form_list" v-if="disableShippingForm>0">
          <li>
            <div class="col-md-12">
              <label>First Name:</label>
              <input name="text" v-model='form.sh_name' placeholder="Full Name">
              <span v-if="form.errors().has('sh_name')">
                {{ form.errors().get('sh_name') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Address:</label>
              <input name="text" v-model='form.sh_address' placeholder="Address">
              <span v-if="form.errors().has('sh_address')">
                {{ form.errors().get('sh_address') }}
              </span>
          </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>City:</label>
              <input name="text" v-model='form.sh_city' placeholder="City">
              <span v-if="form.errors().has('sh_city')">
                {{ form.errors().get('sh_city') }}
              </span>
             </div>
          </li>
          <li>
            <div class="col-md-4">
              <label>State:</label>
              <input name="text" v-model='form.sh_state' placeholder="State">
              <span v-if="form.errors().has('sh_state')">
                {{ form.errors().get('sh_state') }}
              </span>
            </div>
            <div class="col-md-4">
              <label>Country:</label>
              <input name="text" v-model='form.sh_country' placeholder="Country">
              <span v-if="form.errors().has('sh_country')">
                {{ form.errors().get('sh_country') }}
              </span>
            </div>

            <div class="col-md-4">
              <label>Zip:</label>
              <input name="text" v-model='form.sh_zip_code' placeholder="Zip">
              <span v-if="form.errors().has('sh_zip_code')" >
                {{ form.errors().get('sh_zip_code') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Phone:</label>
              <input name="text" v-model='form.sh_phone' placeholder="Phone">
              <span v-if="form.errors().has('sh_phone')">
                {{ form.errors().get('sh_phone') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Email:</label>
              <input name="text" v-model='form.sh_email' placeholder="Email">
              <span v-if="form.errors().has('sh_email')">
                {{ form.errors().get('sh_email') }}
              </span>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <label>Remark:</label>
              <input name="text" v-model='form.sh_remark' placeholder="Remark">
              <span v-if="form.errors().has('sh_remark')">
                {{ form.errors().get('sh_remark') }}
              </span>
            </div>
          </li>
        </ul>
      </div>
      <div class="onebythree">
        <div v-if="cartItems">
          <div
            class="mb_2"
            v-for="(cartItem,cikey) in cartItems"
            :key="cikey"
          >
            <div v-if="cartItem.variationProduct" class="fl_div product_check">
              <div class="fl_left">
                <div class="pro_thumb">
                  <img :src="cartItem.variationProduct.image"><span class="p_quant">{{cartItem.quantity}}</span>
                </div>
                <div class="prod_name">
                  <label>{{cartItem.product.productName}}</label>
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
              <div class="fl_right">
                <label class="bd">${{cartItem.variationProduct.sale_price*cartItem.quantity}}</label>
                <span v-if="cartItem.discountPrice">${{cartItem.discountPrice*cartItem.quantity}}</span>
              </div>
            </div>
            <div v-else>
              <div class="fl_left">
                <div class="pro_thumb">
                  <img :src="cartItem.product.image_path"><span class="p_quant">{{cartItem.quantity}}</span>
                </div>
                <div class="prod_name">
                  <label>{{cartItem.product.productName}}</label>
                  <span>Chocolate / S</span>
                </div>
              </div>
              <div class="fl_right">
                <label class="bd">${{cartItem.product.sale_price*cartItem.quantity}}</label>
                <span v-if="cartItem.discountPrice">${{cartItem.discountPrice*cartItem.quantity}}</span>
              </div>
            </div>
          </div>
        </div>
      <div class="coupon_cart">
        <input type="text" placeholder="Gift cards and discount code" v-model='coupon_form.name'>
        <span class="applycodebtn" v-if="loadingCopon">
          <button type="button" class="btn_red" @click="applyCode">
            Apply
          </button>
        </span>
        <span v-else class="applycodebtn">
          <img :src="loading" width="30">
        </span>

        <span class="error_validation" v-if="coupon_form.errors().has('name')">
          {{ coupon_form.errors().get('name') }}
        </span>
        <span class="error_validation" v-if="couponCodeInfo && couponCodeInfo.message">
          {{couponCodeInfo.message}}
        </span>
      </div>

        <ul class="subtotal ">
          <li class="fl_div"><span>Sub Total:</span> <label>{{cartTotal}}</label></li>
          <li class="fl_div"><span>Tax :</span> <label> 5%</label></li>
        </ul>
        <hr>
        <ul class="shippingmethods">
          <li><h3 class="md_h">Shipping Methods</h3></li>
          <li><span class="checkbox">
            <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,0)" value="free" checked="checked">
            <span> Shipping (7 day delivery, cost $0)</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('shippingmethods')">
              {{ order_form.errors().get('shippingmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,10)" value="express">
            <span>Express Shipping (1 day delivery, cost $10)</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('shippingmethods')">
              {{ order_form.errors().get('shippingmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,5)" value="standard">
           <span> Standard Shipping (3 day delivery, cost $5)</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('shippingmethods')">
              {{ order_form.errors().get('shippingmethods') }}
            </span>
          </li>
        </ul>
        <hr>
           <p class="totalamount fl_div" v-if="cartTotal"><span>Total Cart Price:</span> <label class="m_big">${{this.form.data.total}}</label></p>
        <hr>
        <ul class="paymentmethods">
          <li><h3 class="md_h">Payment Methods</h3></li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' @change="activePaymentMode('COD')" name="paymentmethods" value="COD">
           <span><i class="fa fa-money" aria-hidden="true"></i> COD</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' @change="activePaymentMode('gpay')" name="paymentmethods" value="gpay">
            <span><i class="fa fa-paypal" aria-hidden="true"></i>Gpay</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' @change="activePaymentMode('apple')" name="paymentmethods" value="apple">
            <span><i class="fa fa-paypal" aria-hidden="true"></i>Apple Pay</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="card" @change="activePaymentMode('card')" checked="checked">
            <span><i class="fa fa-cc-stripe" aria-hidden="true"></i>Card (Debit/Credit)</span>
           </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
            <div class="stripeCard" v-if="paymentMode">
              <label>Card Number</label>
              <div id="card-number" class="dv_input"></div>
              <label>Card Expiry</label>
              <div id="card-expiry" class="dv_input"></div>
              <label>Card CVC</label>
              <div id="card-cvc" class="dv_input"></div>
              <div id="card-error"></div>
            </div>
          </li>
        </ul>
     <hr>
        <div class="placeorder text-right btn_load">
          <p class="load_img" v-if="loadingDisplay">
            <img :src="loading">
          </p>
          <button type="button" @click='paymentProcessed' class="btn_blu btn_md">Submit</button>
        </div>
      <hr>
      <div class="successMsg" v-if="transactionResponse && transactionResponse.length>0">
        <p>{{transactionResponse.message}}. Transaction ID : {{transactionResponse.transaction_id}}</p>
      </div>
      <div class="errorMsg" v-if="tranerror">
        <p>{{tranerror}}</p>
      </div>
      </div>
    </div>
  </div>
</template>
<style>
  @import './checkout.css';
</style>
<script>
import {mapGetters,mapActions} from "vuex"
import form from 'vuejs-form'
import { StripeElementCard } from '@vue-stripe/vue-stripe'
import HTTP from './../../Api/auth'
import loading from "../../assets/images/loading.gif"
import paw from "../../assets/images/paw.png"
import Notification from '../Notification'

export default {
  name:"Checkout",
  components: {
    StripeElementCard,
    Notification
  },
  data: () => ({
    form: form({
      name: '',
      address: '',
      city: '',
      state: '',
      country: '',
      zip_code: '',
      phone:'',
      email:'',
      remark:'',
      sh_name: '',
      sh_address: '',
      sh_city: '',
      sh_state: '',
      sh_country: '',
      sh_zip_code: '',
      sh_phone:'',
      sh_email:'',
      sh_remark:''
    })
      .rules({
        name: 'required',
        address: 'required',
        city: 'required',
        state: 'required',
        country: 'required',
        zip_code: 'required',
        phone: 'required',
        email: 'email|min:5|required',
        remark: 'required',
        sh_name: 'required',
        sh_address: 'required',
        sh_city: 'required',
        sh_state: 'required',
        sh_country: 'required',
        sh_zip_code: 'required',
        sh_phone: 'required',
        sh_email: 'email|min:5|required',
        sh_remark: 'required'
      })
      .messages({
        'name': 'This field is required!',
        'address.address': 'This field is required!',
        'city.city': 'This field is required!',
        'state.state': 'This field is required!',
        'country.country': 'This field is required!',
        'zip_code.zip_code': 'This field is required!',
        'phone.phone': 'This field is required!',
        'email.email': 'Email field must be an email',
        'remark.remark': 'This field is required!',
        'sh_name.sh_name': 'This field is required!',
        'sh_address.sh_address': 'This field is required!',
        'sh_city.sh_city': 'This field is required!',
        'sh_state.sh_state': 'This field is required!',
        'sh_country.sh_country': 'This field is required!',
        'sh_zip_code.sh_zip_code': 'This field is required!',
        'sh_phone.sh_phone': 'This field is required!',
        'sh_email.sh_email': 'Email field must be an email',
        'sh_remark.sh_remark': 'This field is required!'
      }),
    order_form: form({
      shippingmethods: 'free',
      paymentmethods: 'card',
      discountCode:'',
      discountAmount:0
    })
      .rules({
        shippingmethods: 'required',
        paymentmethods: 'required'
      })
      .messages({
        'shippingmethods.shippingmethods': 'This field is required!',
        'paymentmethods.paymentmethods': 'This field is required!'
      }),
    coupon_form: form({
      name: ''
    })
      .rules({
        name: 'required'
      })
      .messages({
        'name.name': 'This field is required!'
      }),
    tax:5,
    disableShippingForm:1,
    token: null,
    cardNumber: null,
    cardExpiry: null,
    cardCvc: null,
    transactionResponse:[],
    tranerror:'',
    paymentMode:true,
    couponCodeInfo:[],
    CouponCode:[],
    loading:loading,
    paw:paw,
    loadingDisplay:false,
    loadingCopon:true,
    cartItems:[]
  }),
  created(){
    this.getProfile()
    this.getCartItems()
    this.cartTotalInfo()
  },
  watch:{
    transaction(){
      this.transactionResponse=this.transaction
    },
    accountDetails(){
      if(this.accountDetails){
        var _this = this
        Object.keys(_this.accountDetails).forEach(function(key,index) {
          if(key!='id' && key!='profile_image' && key!='created_at' ){
            _this.form.data[key] = _this.accountDetails[key]
          }
        })
      }
    },
    cartTotal(){
      if(this.cartTotal){
        var cartTotalValue = Number(this.cartTotal) + Number((this.cartTotal*this.tax)/100)
        this.form.data.total=cartTotalValue.toFixed(2)
      }
    },
    getCartItem(){
      this.cartItems = this.getCartItem
    }
  },
  computed: {
    ...mapGetters(['cartTotal','transaction','accountDetails','getCartItem']),
    stripeElements () {
      return this.$stripe.elements()
    }
  },
  mounted () {
    this.cardNumber = this.stripeElements.create('cardNumber', { style })
    this.cardNumber.mount('#card-number')
    this.cardExpiry = this.stripeElements.create('cardExpiry', { style })
    this.cardExpiry.mount('#card-expiry')
    this.cardCvc = this.stripeElements.create('cardCvc', { style })
    this.cardCvc.mount('#card-cvc')
    const style = {
      base: {
        color: 'black',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '14px',
        '::placeholder': {
          color: '#aab7c4',
        },
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a',
      },
    }
  },
  beforeDestroy () {
    this.cardNumber.destroy();
    this.cardExpiry.destroy();
    this.cardCvc.destroy();
  },
  methods:{
    ...mapActions(['generatePay','getProfile','getCartItems','removeCartItem']),
    calculateShipping(e,cost){
      var shippingval = Number(this.form.data.total)+cost
      this.form.data.total = shippingval.toFixed(2)
    },
    activePaymentMode(modekey){
      if(modekey == 'card'){
        this.paymentMode=true
      }else{
        this.paymentMode=false
      }
    },
    isShippingFormDisabled(e) {
      if (e.target.checked) {
        this.disableShippingForm = 0
      }else{
        this.disableShippingForm = 1
      }
    },
    applyCode(){
      if (this.coupon_form.validate().errors().any()) return;
      this.loadingCopon=false
      HTTP.post(process.env.MIX_APP_APIURL+'coupon', this.coupon_form.data).then((response) => {
        this.CouponCode=response.data.data
        this.couponCodeInfo =[]
        if(this.CouponCode.apply_to =='specific_product'){
          this.couponSpecificProducts(this.CouponCode)
        }else if (this.CouponCode.apply_to =='specific_category') {
          this.couponSpecificCategory(this.CouponCode)
        }else {
          this.couponEntireOrder(this.CouponCode)
        }
        this.loadingCopon=true
      }).catch((errors) => {
        this.couponCodeInfo = errors.response.data
        this.$refs.notifications.displayNotification('error','Coupon Code',this.couponCodeInfo.message)
        this.loadingCopon=true
      })
    },
    paymentProcessed () {
      this.loadingDisplay=true
      var _this = this
      if(this.disableShippingForm==0){
        Object.keys(_this.form.data).forEach(function(key,index) {
          if(!key.includes('sh_')){
            _this.form.data['sh_'+key] = _this.form.data[key]
          }
        })
      }
      if (this.form.validate().errors().any() || this.order_form.validate().errors().any()){
        this.loadingDisplay=false
        return;
      }else{
        this.form.data.payment_method = this.order_form.data.paymentmethods
        this.form.data.shippingmethod = this.order_form.data.shippingmethods
        this.form.data.discountCode = this.order_form.data.discountCode
        this.form.data.discountAmount = this.order_form.data.discountAmount
        this.form.data.key = localStorage.getItem('cartKey')
        if(this.order_form.data.paymentmethods == 'card'){
          this.cardPayment()
        }else if (this.order_form.data.paymentmethods == 'gpay') {
          this.gPay()
        }else if (this.order_form.data.paymentmethods == 'apple') {
          this.ApplePay()
        }else{
          this.codPayment()
        }
      }
    },
    cartTotalInfo(){
      if(this.cartTotal){
        var cartTotalValue = Number(this.cartTotal) + Number((this.cartTotal*this.tax)/100)
        this.form.data.total = cartTotalValue.toFixed(2)
      }
      if(this.accountDetails){
        var _this = this
        Object.keys(_this.accountDetails).forEach(function(key,index) {
          if(key!='id' && key!='profile_image' && key!='created_at' ){
            _this.form.data[key] = _this.accountDetails[key]
          }
        })
      }
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
    async cardPayment(){
      const { token, error } = await this.$stripe.createToken(this.cardNumber);
      if (error) {
        document.getElementById('card-error').innerHTML = error.message;
        this.$refs.notifications.displayNotification('error','Card','This card is invalid.')
        return;
      } else {
        var totalAmount = this.form.data.total
        var finalPrice = totalAmount*100
        var transactionArray = {
                                "name": this.form.data.name,
                                "email": this.form.data.email,
                                "address": this.form.data.address,
                                "zip_code": this.form.data.zip_code,
                                "city": this.form.data.city,
                                "state": this.form.data.state,
                                "country": this.form.data.country,
                                "product_id": localStorage.getItem('cartId'),
                                "strip_token": token.id,
                                "amount": finalPrice,
                                "currency": "INR"
                              }
        HTTP.post(process.env.MIX_APP_APIURL+'payment', transactionArray).then((response) => {
          this.transactionResponse=response.data
          if(this.transactionResponse.transaction_id){
            this.form.data.transaction_id = this.transactionResponse.transaction_id
            this.createOrder(this.form.data)
          }
        }).catch((errors) => {
          this.$refs.notifications.displayNotification('error','Payment','Payment is not received.')
          this.tranerror = errors+'Something was wrong!'
        })
      }
    },
    codPayment(){
      this.createOrder(this.form.data)
    },
    ApplePay(){
      this.codPayment()
    },
    gPay(){
      this.codPayment()
    },
    createOrder(orderInfo){
      const cartId = localStorage.getItem('cartId')
      HTTP.post(process.env.MIX_APP_APIURL+'checkout/'+cartId, orderInfo).then((response) => {
        this.$refs.notifications.displayNotification('success','Payment','Payment is received.')
        this.loadingDisplay=false
        this.removeCartItem()
        window.location.href="/payment"
      }).catch((errors) => {
        this.$refs.notifications.displayNotification('error','Payment',errors.response.data.message)
        this.loadingDisplay=false
      }) 
    },
    couponEntireOrder(couponDetails){
      if(couponDetails.count>0){
        this.order_form.data.discountCode=couponDetails.code

        if(couponDetails.type == 'percentage'){
          var discountVal = Number(this.form.data.total*couponDetails.value)/100
          if(this.form.data.total>discountVal){
            this.order_form.data.discountAmount=discountVal
            var doscountprice = Number(this.form.data.total)-Number(discountVal)
            this.form.data.total = doscountprice.toFixed(2)
            this.$refs.notifications.displayNotification('success','Coupon Code','Coupon Code is applied.')
            this.loadingDisplay=false
          }else{
            this.$refs.notifications.displayNotification('error','Coupon Code','This Coupon Code is exceeded the limit!')
            this.loadingDisplay=false
          }
        }else{
          var discountVal = Number(couponDetails.value)
          if(this.form.data.total>discountVal){
            this.order_form.data.discountAmount=discountVal
            var doscountprice = Number(this.form.data.total)-Number(couponDetails.value)
            this.form.data.total = doscountprice.toFixed(2)
            this.$refs.notifications.displayNotification('success','Coupon Code','Coupon Code is applied.')
            this.loadingDisplay=false
          }else{
            this.$refs.notifications.displayNotification('error','Coupon Code','This Coupon Code is exceeded the limit!')
            this.loadingDisplay=false
          }
        }
      }else{
        this.$refs.notifications.displayNotification('error','Coupon Code','This Coupon Code is exceeded the limit!')
        this.loadingDisplay=false
      }
    },
    couponSpecificCategory(couponDetails){
      var _this = this
      var categoryIds=[]
      var applyCodeORNot=0
      couponDetails.category_id.filter(function(cid,cind){
        categoryIds.push(Number(cid))
      })
      this.order_form.data.discountCode=couponDetails.code
      if(couponDetails.type == 'percentage'){
        this.cartItems.filter(function(cartitem,ciind){
          if(categoryIds.includes(cartitem.product.category_id)){
            _this.productPercentageDiscount(cartitem,couponDetails,ciind)
            applyCodeORNot=1
          }
        })
        this.$refs.notifications.displayNotification('success','Coupon Code','Coupon Code is applied.')
        this.loadingDisplay=false
      }else {
        this.cartItems.filter(function(cartitem,ciind){
          if(categoryIds.includes(cartitem.product.category_id)){
            _this.productFixedDiscount(cartitem,couponDetails,ciind)
            applyCodeORNot=1
          }
        })
        if(applyCodeORNot>0){
          this.$refs.notifications.displayNotification('success','Coupon Code','Coupon Code is applied.')
        }else{
          this.$refs.notifications.displayNotification('error','Coupon Code','This code is not valid')
        }
        this.loadingDisplay=false
      }
    },
    couponSpecificProducts(couponDetails){
      var _this = this
      var applyCodeORNot=0
      var productIds=[]
      couponDetails.product_id.filter(function(pid,pind){
        productIds.push(Number(pid))
      })
      this.order_form.data.discountCode=couponDetails.code
      if(couponDetails.type == 'percentage'){
        this.cartItems.filter(function(cartitem,ciind){
          if(productIds.includes(cartitem.product_id)){
            _this.productPercentageDiscount(cartitem,couponDetails,ciind)
            applyCodeORNot=1
          }
        })
        if(applyCodeORNot>0){
          this.$refs.notifications.displayNotification('success','Coupon Code','Coupon Code is applied.')
        }else{
          this.$refs.notifications.displayNotification('error','Coupon Code','This code is not valid')
        }
        this.loadingDisplay=false
      }else{
        this.cartItems.filter(function(cartitem,ciind){
          if(productIds.includes(cartitem.product_id)){
            _this.productFixedDiscount(cartitem,couponDetails,ciind)
            applyCodeORNot=1
          }
        })
        if(applyCodeORNot>0){
          this.$refs.notifications.displayNotification('success','Coupon Code','Coupon Code is applied.')
        }else{
          this.$refs.notifications.displayNotification('error','Coupon Code','This code is not valid')
        }
        this.loadingDisplay=false
      }
    },
    productPercentageDiscount(cartitem,couponDetails,ciind){
      if(cartitem.variationProduct){
        var discountVal = Number(cartitem.variationProduct.sale_price*couponDetails.value)/100
        var discountPrice = discountVal.toFixed(2)
        if(cartitem.variationProduct.sale_price>discountPrice){
          var multiPrice = discountPrice*cartitem.quantity
          var formatAfterDiscount = multiPrice.toFixed(2)
          var totalformat = this.form.data.total-Number(formatAfterDiscount)
          this.form.data.total = totalformat.toFixed(2)

          this.order_form.data.discountAmount=Number(this.order_form.data.discountAmount)+Number(formatAfterDiscount)
          var afterDiscount = Number(cartitem.variationProduct.sale_price)-Number(discountPrice)

          this.cartItems[ciind].discountPrice=formatAfterDiscount
        }
      }else{
        var discountVal = Number(cartitem.product.sale_price*couponDetails.value)/100
        if(cartitem.product.sale_price>discountVal){
          var discountPrice = discountVal.toFixed(2)
          var multiPrice = discountPrice*cartitem.quantity
          var formatAfterDiscount = multiPrice.toFixed(2)
          var totalformat = this.form.data.total-Number(formatAfterDiscount)
          this.form.data.total = totalformat.toFixed(2)

          this.order_form.data.discountAmount=Number(this.order_form.data.discountAmount)+Number(formatAfterDiscount)
          var afterDiscount = Number(cartitem.product.sale_price)-Number(discountPrice)
          this.cartItems[ciind].discountPrice=formatAfterDiscount
        }
      }
    },
    productFixedDiscount(cartitem,couponDetails,ciind){
      if(cartitem.variationProduct){
        var discountVal = Number(cartitem.variationProduct.sale_price)-Number(couponDetails.value)
        if(discountVal>0){
          var discountPrice = couponDetails.value.toFixed(2)
          var multiPrice = discountPrice*cartitem.quantity
          var formatAfterDiscount = multiPrice.toFixed(2)
          var totalformat = this.form.data.total-Number(formatAfterDiscount)
          this.form.data.total = totalformat.toFixed(2)
          this.order_form.data.discountAmount=Number(this.order_form.data.discountAmount)+Number(formatAfterDiscount)

          this.cartItems[ciind].discountPrice=formatAfterDiscount
        }
      }else{
        var discountVal = Number(cartitem.product.sale_price)-Number(couponDetails.value)
        if(discountVal>0){
          var discountPrice = couponDetails.value.toFixed(2)
          var multiPrice = discountPrice*cartitem.quantity
          var formatAfterDiscount = multiPrice.toFixed(2)
          var totalformat = this.form.data.total-Number(formatAfterDiscount)
          this.form.data.total = totalformat.toFixed(2)
          this.order_form.data.discountAmount=Number(this.order_form.data.discountAmount)+Number(formatAfterDiscount)

          this.cartItems[ciind].discountPrice=formatAfterDiscount
        }
      }
    }
  }
}
</script>
