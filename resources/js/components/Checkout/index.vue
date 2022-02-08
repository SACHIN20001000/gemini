<template>
  <div class="main grad_bg">
    <!--<h1>Checkout</h1>-->
    <div class="checkoutform">
      <div class="twobythree">
        <div class="text-center check_logo">
        <a href="#"><img src="images/paw.png"></a>
      </div>
        <ul class="pay_steps">
          <li class="active">Information</li>
          <li>Shipping</li>
          <li>Payment</li>
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

        <div class="product_check fl_div">
          <div class="fl_left">
          <div class="pro_thumb">
            <img src="images/pro3.jpg"><span class="p_quant">2</span>
          </div>
          <div class="prod_name">
            <label>Pet Blanket</label>
            <span>Chocolate / S</span> 
          </div>
        </div>
        <div class="fl_right">
          <label class="bd">$11.99</label>
        </div>
      </div>
      <div class="coupon_cart">
        <input type="text" placeholder="Gift cards and discount code">
        <button class="btn_red">Apply</button>
      </div>

        <ul class="subtotal ">
          <li class="fl_div"><span>Sub Total:</span> <label>{{cartTotal}}</label></li>
          <li class="fl_div"><span>Tax :</span> <label> 5%</label></li>
        </ul>
        <hr>
           <p class="totalamount fl_div" v-if="cartTotal"><span>Total Cart Price:</span> <label class="m_big">{{cartTotalValue+shippingval}}</label></p>
           <hr>
        <ul class="shippingmethods">
          <li><h3 class="md_h">Shipping Methods</h3></li>
          <li><span class="checkbox"> <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,0)" value="free">
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
        <ul class="paymentmethods">
          <li><h3 class="md_h">Payment Methods</h3></li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="COD">
           <span><i class="fa fa-money" aria-hidden="true"></i> COD</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="paypal">
            <span><i class="fa fa-paypal" aria-hidden="true"></i> Paypal Gateway</span>
          </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <span class="checkbox">
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="stripe">
            <span><i class="fa fa-cc-stripe" aria-hidden="true"></i>Stripe Gateway</span>
           </span>
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
            <div class="stripeCard ">
              <label>Card Number</label>
              <div id="card-number" class="dv_input"></div>
              <label>Card Expiry</label>
              <div id="card-expiry" class="dv_input"></div>
              <label>Card CVC</label>
              <div id="card-cvc" class="dv_input"></div>
              <div id="card-error"></div>
              <div class="btn_token">
              <button id="custom-button" @click="createToken" class="btn_red">Generate Token</button>
            </div>
            </div>

          </li>
        </ul>
     <hr>
        <div class="placeorder text-right">
          <button type="button" @click='submit' class="btn_blu btn_md">Submit</button>
        </div>
      </div>
    </div>
    <div class="checkout_btn">
      <stripe-checkout      
        ref="checkoutRef"
        mode="payment"
        :pk="publishableKey"
        :line-items="lineItems"
        :success-url="successURL"
        :cancel-url="cancelURL"
        @loading="v => loading = v"
      />
      <button @click="submit" class="btn_blu btn_md">Pay now!</button>
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
import { StripeCheckout } from '@vue-stripe/vue-stripe'

export default {
  name:"Checkout",
  components: {
    StripeElementCard
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
      shippingmethods: '',
      paymentmethods: ''
    })
      .rules({
        shippingmethods: 'required',
        paymentmethods: 'required'
      })
      .messages({
        'shippingmethods.shippingmethods': 'This field is required!',
        'paymentmethods.paymentmethods': 'This field is required!'
      }),
    cartTotalValue:0,
    tax:5,
    shippingval:0,
    disableShippingForm:1,
    token: null,
    cardNumber: null,
    cardExpiry: null,
    cardCvc: null,
    publishableKey: process.env.MIX_STRIPE_PUBLISHABLE_KEY,
    loading: false,
    lineItems: [
      {
        price: 'some-price-id',
        quantity: 1,
      },
    ],
    successURL: 'http://127.0.0.1:8000/payment',
    cancelURL: 'http://127.0.0.1:8000/payment'
  }),
  watch:{
    orderResponse(){
      if (this.orderResponse) {
        this.$router.push('/payment')
      }
    },
    cartTotal(){
      this.cartTotalValue = parseFloat(Number(this.cartTotal) + Number((this.cartTotal*this.tax)/100))
    }
  },
  computed: {
    ...mapGetters(['cartTotal','orderResponse']),
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
    ...mapActions(['addOrder']),
    submit() {
      if(this.disableShippingForm==0){
        this.form.data.sh_name = this.form.data.name
        this.form.data.sh_address = this.form.data.address
        this.form.data.sh_city = this.form.data.city
        this.form.data.sh_state = this.form.data.state
        this.form.data.sh_country = this.form.data.country
        this.form.data.sh_zip_code = this.form.data.zip_code
        this.form.data.sh_phone = this.form.data.phone
        this.form.data.sh_email = this.form.data.email
        this.form.data.sh_remark = this.form.data.remark
      }
      if (this.form.validate().errors().any() || this.order_form.validate().errors().any()) return;
      /*if(this.disableShippingForm>0){
        if (this.sh_form.validate().errors().any()) return;
      }*/
      /*this.form.data.shipping =this.sh_form.data*/
      this.form.data.payment_method = this.order_form.data.paymentmethods
      this.form.data.total = Number(this.cartTotalValue) + Number(this.shippingval)
      this.form.data.shippingmethod = this.order_form.data.shippingmethods
      this.form.data.key = localStorage.getItem('cartKey')
      this.addOrder(this.form.data)
    },
    calculateShipping(e,cost){
      this.shippingval = 0
      this.shippingval = cost
    },
    isShippingFormDisabled(e) {
      if (e.target.checked) {
        this.disableShippingForm = 0
      }else{
        this.disableShippingForm = 1
      }
    },
    async createToken () {
      const { token, error } = await this.$stripe.createToken(this.cardNumber);
      if (error) {
        // handle error here
        document.getElementById('card-error').innerHTML = error.message;
        return;
      }
      console.log(token);
      /*await this.$stripe.createCharges(this.cardNumber)*/
      // handle the token
      // send it to your server
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    }
  }
}
</script>
