<template>
  <div class="main">
    <h1>Checkout</h1>
    <div class="checkoutform">
      <div class="twobythree">
        <ul class="listItem">
          <li><h3>Billing Address</h3></li>
          <li>
            <label>First Name:</label>
            <input name="text" v-model='form.name' placeholder="Full Name">
            <span v-if="form.errors().has('name')">
              {{ form.errors().get('name') }}
            </span>
          </li>
          <li>
            <label>Address:</label>
            <input name="text" v-model='form.address' placeholder="Address">
            <span v-if="form.errors().has('address')">
              {{ form.errors().get('address') }}
            </span>
          </li>
          <li>
            <label>City:</label>
            <input name="text" v-model='form.city' placeholder="City">
            <span v-if="form.errors().has('city')">
              {{ form.errors().get('city') }}
            </span>
          </li>
          <li>
            <label>State:</label>
            <input name="text" v-model='form.state' placeholder="State">
            <span v-if="form.errors().has('state')">
              {{ form.errors().get('state') }}
            </span>
          </li>
          <li>
            <label>Country:</label>
            <input name="text" v-model='form.country' placeholder="Country">
            <span v-if="form.errors().has('country')">
              {{ form.errors().get('country') }}
            </span>
          </li>
          <li>
            <label>Zip:</label>
            <input name="text" v-model='form.zip_code' placeholder="Zip">
            <span v-if="form.errors().has('zip_code')" >
              {{ form.errors().get('zip_code') }}
            </span>
          </li>
          <li>
            <label>Phone:</label>
            <input name="text" v-model='form.phone' placeholder="Phone">
            <span v-if="form.errors().has('phone')">
              {{ form.errors().get('phone') }}
            </span>
          </li>
          <li>
            <label>Email:</label>
            <input name="text" v-model='form.email' placeholder="Email">
            <span v-if="form.errors().has('email')">
              {{ form.errors().get('email') }}
            </span>
          </li>
          <li>
            <label>Remark:</label>
            <input name="text" v-model='form.remark' placeholder="Remark">
            <span v-if="form.errors().has('remark')">
              {{ form.errors().get('remark') }}
            </span>
          </li>
        </ul>
        <hr />
        <ul class="listItem">
          <li><h3>Shipping Address</h3></li>
          <li><input type="checkbox" class="samebillingaddress" v-on:click="isShippingFormDisabled($event)" /> Use same address in shipping address.</li>
        </ul>
        <ul class="listItem" v-if="disableShippingForm>0">
          <li>
            <label>First Name:</label>
            <input name="text" v-model='form.sh_name' placeholder="Full Name">
            <span v-if="form.errors().has('sh_name')">
              {{ form.errors().get('sh_name') }}
            </span>
          </li>
          <li>
            <label>Address:</label>
            <input name="text" v-model='form.sh_address' placeholder="Address">
            <span v-if="form.errors().has('sh_address')">
              {{ form.errors().get('sh_address') }}
            </span>
          </li>
          <li>
            <label>City:</label>
            <input name="text" v-model='form.sh_city' placeholder="City">
            <span v-if="form.errors().has('sh_city')">
              {{ form.errors().get('sh_city') }}
            </span>
          </li>
          <li>
            <label>State:</label>
            <input name="text" v-model='form.sh_state' placeholder="State">
            <span v-if="form.errors().has('sh_state')">
              {{ form.errors().get('sh_state') }}
            </span>
          </li>
          <li>
            <label>Country:</label>
            <input name="text" v-model='form.sh_country' placeholder="Country">
            <span v-if="form.errors().has('sh_country')">
              {{ form.errors().get('sh_country') }}
            </span>
          </li>
          <li>
            <label>Zip:</label>
            <input name="text" v-model='form.sh_zip_code' placeholder="Zip">
            <span v-if="form.errors().has('sh_zip_code')" >
              {{ form.errors().get('sh_zip_code') }}
            </span>
          </li>
          <li>
            <label>Phone:</label>
            <input name="text" v-model='form.sh_phone' placeholder="Phone">
            <span v-if="form.errors().has('sh_phone')">
              {{ form.errors().get('sh_phone') }}
            </span>
          </li>
          <li>
            <label>Email:</label>
            <input name="text" v-model='form.sh_email' placeholder="Email">
            <span v-if="form.errors().has('sh_email')">
              {{ form.errors().get('sh_email') }}
            </span>
          </li>
          <li>
            <label>Remark:</label>
            <input name="text" v-model='form.sh_remark' placeholder="Remark">
            <span v-if="form.errors().has('sh_remark')">
              {{ form.errors().get('sh_remark') }}
            </span>
          </li>
        </ul>
      </div>
      <div class="onebythree">
        <ul class="subtotal">
          <li>Sub Total: {{cartTotal}}</li>
          <li>Tax : 5%</li>
        </ul>
        <ul class="shippingmethods">
          <li><h3>Shipping Methods</h3></li>
          <li>
            <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,0)" value="free">
            &nbsp; Free Shipping (7 day delivery, cost $0)
            <span class="error_validation" v-if="order_form.errors().has('shippingmethods')">
              {{ order_form.errors().get('shippingmethods') }}
            </span>
          </li>
          <li>
            <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,10)" value="express">
            &nbsp; Express Shipping (1 day delivery, cost $10)
            <span class="error_validation" v-if="order_form.errors().has('shippingmethods')">
              {{ order_form.errors().get('shippingmethods') }}
            </span>
          </li>
          <li>
            <input type="radio" v-model='order_form.shippingmethods' name="shippingmethods" @change="calculateShipping($event,5)" value="standard">
            &nbsp; Standard Shipping (3 day delivery, cost $5)
            <span class="error_validation" v-if="order_form.errors().has('shippingmethods')">
              {{ order_form.errors().get('shippingmethods') }}
            </span>
          </li>
        </ul>
        <ul class="paymentmethods">
          <li><h3>Payment Methods</h3></li>
          <li>
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="COD">
            &nbsp; COD
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="paypal">
            &nbsp; Paypal Gateway
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
          </li>
          <li>
            <input type="radio" v-model='order_form.paymentmethods' name="paymentmethods" value="stripe">
            &nbsp; Stripe Gateway
            <span class="error_validation" v-if="order_form.errors().has('paymentmethods')">
              {{ order_form.errors().get('paymentmethods') }}
            </span>
            <div class="stripeCard">
              <label>Card Number</label>
              <div id="card-number"></div>
              <label>Card Expiry</label>
              <div id="card-expiry"></div>
              <label>Card CVC</label>
              <div id="card-cvc"></div>
              <div id="card-error"></div>
              <button id="custom-button" @click="createToken">Generate Token</button>
            </div>

          </li>
        </ul>
        <p class="totalamount" v-if="cartTotal">Total Cart Price: {{cartTotalValue+shippingval}}</p>
        <div class="placeorder">
          <button type="button" @click='submit'>Submit</button>
        </div>
      </div>
    </div>
    <div>
      <stripe-checkout
        ref="checkoutRef"
        mode="payment"
        :pk="publishableKey"
        :line-items="lineItems"
        :success-url="successURL"
        :cancel-url="cancelURL"
        @loading="v => loading = v"
      />
      <button @click="submit">Pay now!</button>
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
