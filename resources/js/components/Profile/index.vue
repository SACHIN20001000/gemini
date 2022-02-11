<template>
  <div class="main_container">
    <Notification ref="notifications"/>
    <div class="free_ship_bar">
      <p>
        <img :src="ship">Free Shipping on All U.S. Orders Over <b>$49</b>
      </p>
    </div>
    <section class="st_banner">
      <div class="container_990">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-3" v-if="profileDetails && profileDetails.profile_image !=null">
                <div class="profile_banner">
                  <img :src="profileDetails.profile_image" width="120px">
                  <label class="uplod_btn">
                    <input type="file" id="myfile" name="myfile" accept="image/*" @change="uploadImage($event)">
                  </label>
                </div>
                <div class="loadingGif" v-if="imageloading">
                  <img :src="loading" width="40px">
                </div>
              </div>
              <div class="col-3" v-else>
                <img :src="store_profile">
                <label class="uplod_btn">
                  <input type="file" id="myfile" name="myfile" accept="image/*" @change="uploadImage($event)">
                </label>
                <div class="loadingGif" v-if="imageloading">
                  <img :src="paw" width="30px">
                </div>
              </div>
              <div class="col-9">
                <h1 class="st_h">Welcome back, {{profileDetails.name}}!</h1>
                <p>Welcome to your The Pet Parents Store™ profile <br>account page. Here you can manage your account<br> infos, order status and check your points.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="points">
              <span>You have</span>
              <h1>5.341 <label>points</label></h1>
              <p class="tm_p">01.13.22  |  5.23Pm  |  Redeem</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="st_info sf_1">
      <div class="container_990 bb-1">
        <h1 class="st_title">My Profile</h1>
        <div class="row">
          <div class="col-3">
            <ul class="nav st_tab_list" id="profil_info">
              <li class="nav-item" role="presentation">
                <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#st_info">Info</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#st_shipping" >Shipping Address</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#st_payment">Payment Method</button>
              </li>
            </ul>
          </div>
          <div class="col-9 br_1 ps-5">
            <div class="tab-content st_tab_content" id="profil_detail">
              <div
                class="tab-pane fade show active"
                id="st_info"
                v-if="profileDetails"
              >
                <div class="form-group">
                  <label class="lb_small">Name</label>
                  <div class="inp_edt" v-if="nameData.name==1">
                    {{shippingFrom.name}} <i @click="displayField('name')"><img :src="input_edit"></i>
                  </div>
                  <div class="inp_edt updatelive" v-else>
                    <input type="text" v-model="shippingFrom.name"> <i class="fa fa-check" @click="displayField('name')" aria-hidden="true"></i>
                    <span
                      v-if="shippingFrom.errors().has('name')"
                      v-text="shippingFrom.errors().get('name')"
                      class="errorMsg">
                    </span>
                  </div>
                </div>
                <div class="form-group readonly" v-bind:readonly="true">
                  <label class="lb_small">E-mail</label>
                  <div class="inp_edt" v-if="nameData.email==1">
                    {{shippingFrom.email}} <!--<i @click="displayField('email')"><img :src="input_edit"></i>-->
                  </div>
                  <div class="inp_edt updatelive" v-else>
                    <input type="text" v-model="shippingFrom.email"> <i class="fa fa-check" @click="displayField('email')" aria-hidden="true"></i>
                    <span
                      v-if="shippingFrom.errors().has('email')"
                      v-text="shippingFrom.errors().get('email')"
                      class="errorMsg">
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="lb_small">Password</label>
                  <div class="inp_edt mb-0" v-if="nameData.password==1">
                    ********** <i @click="displayField('password')"><img :src="input_edit"></i>
                  </div>
                  <div class="inp_edt mb-0 updatelive" v-else>
                    <input type="text" v-model="shippingFrom.password"> <i class="fa fa-check" @click="displayField('password')" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="st_shipping">
                <p class="heading">Shipping Address</p>
                <form class="add-form">
                  <input class="add-form-field" type="text" placeholder="Address" v-model="shippingFrom.address">
                  <span
                    v-if="shippingFrom.errors().has('address')"
                    v-text="shippingFrom.errors().get('address')"
                    class="errorMsg">
                  </span>
                  <input class="add-form-field" type="text" placeholder="Zip_code" v-model="shippingFrom.zip_code">
                  <span
                    v-if="shippingFrom.errors().has('zip_code')"
                    v-text="shippingFrom.errors().get('zip_code')"
                    class="errorMsg">
                  </span>
                  <input class="add-form-field" type="text" placeholder="Phone" v-model="shippingFrom.phone">
                  <span
                    v-if="shippingFrom.errors().has('phone')"
                    v-text="shippingFrom.errors().get('phone')"
                    class="errorMsg">
                  </span>
                  <input class="add-form-field" type="text" placeholder="City" v-model="shippingFrom.city">
                  <span
                    v-if="shippingFrom.errors().has('city')"
                    v-text="shippingFrom.errors().get('city')"
                    class="errorMsg">
                  </span>
                  <input class="add-form-field" type="text" placeholder="State" v-model="shippingFrom.state">
                  <span
                    v-if="shippingFrom.errors().has('state')"
                    v-text="shippingFrom.errors().get('state')"
                    class="errorMsg">
                  </span>
                  <input class="add-form-field" type="text" placeholder="Country" v-model="shippingFrom.country">
                  <span
                    v-if="shippingFrom.errors().has('country')"
                    v-text="shippingFrom.errors().get('country')"
                    class="errorMsg">
                  </span>
                  <button type="button" class="update-btn" @click="updateShipping">Update</button>
                  <!--<a class="add-icon" href="#">+</a>-->
                </form>
              </div>
              <div class="tab-pane fade" id="st_payment">
                <p class="heading">Payment Details</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="st_info sf_2">
      <div class="container_990 bb-1">
        <h1 class="st_title">My Pet Profile</h1>
        <br>
        <ul class="pet_pro_list" v-if="petprofiles">
          <li
            v-for="(pet, pkey) in petprofiles"
            :key="pkey"
          >
            <a href="#">
              <img :src="pet.image">
            </a>
            <span>{{pet.name}}</span>
          </li>
          <li>
            <label class="uplod_btn">
              <input type="button" v-on:click="addMorePet = !addMorePet">
            </label>
          </li>
        </ul>
        <div class="petForm" v-if="addMorePet">
          <label>
            <span>Name:</span> <input type="text" v-model="petform.name">
            <div class="error_validation" v-if="petform.errors().has('name')">
              {{ petform.errors().get('name') }}
            </div>
          </label>
          <label>
            <span>Type:</span>
            <select v-model="petform.type">
              <option value="dog">Dog</option>
              <option value="cat">Cat</option>
            </select>
          </label>
          <label>
            <span>Age:</span>
            <input type="number" v-model="petform.age">
          </label>
          <label class="uplod_btn upld_small">
            <input type="file" id="myfile" name="myfile" accept="image/*" @change="uploadPetImage($event)">
          </label>
          <label><button type="button" @click="addPet">Add Pet</button></label>
          <label>
            <div class="loadingGif" v-if="petloading">
              <img :src="loading" width="40px">
            </div>
          </label>
        </div>
      </div>
    </section>
    <section class="st_info mb-5">
      <div class="container_990 bb-1">
        <h1 class="st_title">My Orders</h1>
        <div class="row">
          <div class="col-3">
            <ul class="nav st_tab_list" id="profil_info">
              <li class="nav-item" role="presentation">
                <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#or_latest">Latest</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#or_all" >All</button>
              </li>
            </ul>
          </div>
          <div class="col-9 br_1 ps-5 ps_rel">
            <div class="srch_order">
              <div class="src_wrap"><i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" placeholder="Search Order">
              </div>
            </div>
            <div class="tab-content st_order_content">
              <div class="tab-pane fade show active" id="or_latest"  v-if="Orders">
                <div
                  class="tb_responsive"
                  v-for="(orderslist, olkey) in Orders"
                  :key="olkey"
                >
                  <table class="produc_table">
                    <thead>
                      <tr>
                        <th class="data_head" width=25%><span class="tb_sm">Order Date</span> <b>{{orderslist.created_at | formatDate}}</b></th>
                        <th class="data_head ord_num" width=25%>Order Number  <span>#{{orderslist.id}}</span></th>
                        <th  class="data_head" width=25%>Transaction Id:  <span class="tans_id ">{{orderslist.transaction_id}}</span></th>
                        <th  class="data_head ord_num" width=25%>Status: <span>{{orderslist.status}}</span></th>
                      </tr>
                    </thead>
                    <tbody v-if="orderslist.orderItems">
                      <tr
                        v-for="(orderItems, oikey) in orderslist.orderItems"
                        :key="oikey"
                      >
                        <td class="pt_img">
                          <router-link
                            :to="{ path: 'products/'+productSlug(orderItems.product.name)+'/'+orderItems.product.id}"
                          >
                            <img :src="orderItems.product.feature_image" width="100px">
                          </router-link>
                        </td>
                        <td class="t_size">
                          {{orderItems.product.name}}
                          <span>Princess: {{orderItems.unit_price}} | Size: {{orderItems.product_id}}</span>
                        </td>
                        <td class="t_price">
                          <span>Item Price:</span>
                          ${{orderItems.total_price}}
                        </td>
                        <td class="t_btn">
                          <button>
                          Re-Order
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="btn_or_mb">
                    <button>
                    Re-Order
                    </button>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="or_all" v-if="Orders">
                <div
                  class="tb_responsive"
                  v-for="(orderslist, olkey) in Orders"
                  :key="olkey"
                >
                  <table class="produc_table">
                    <thead>
                      <tr>
                        <th class="data_head" width=25%><span class="tb_sm">Order Date</span> <b>{{orderslist.created_at | formatDate}}</b></th>
                        <th class="data_head ord_num " width=25%>Order Number  <span>#{{orderslist.id}}</span></th>
                        <th  class="data_head" width=25%>Transaction Id: <span class="tans_id ">{{orderslist.transaction_id}}</span></th>
                        <th  class="data_head" width=25%>Status: {{orderslist.status}}</th>
                      </tr>
                    </thead>
                    <tbody v-if="orderslist.orderItems">
                      <tr
                        v-for="(orderItems, oikey) in orderslist.orderItems"
                        :key="oikey"
                      >
                        <td class="pt_img">
                          <a href="#"><img :src="orderItems.product.feature_image" width="100px"></a>
                        </td>
                        <td class="t_size">
                          {{orderItems.product.name}}
                          <span>Princess: {{orderItems.unit_price}} | Size: {{orderItems.product_id}}</span>
                        </td>
                        <td class="t_price">
                          <span>Item Price:</span>
                          ${{orderItems.total_price}}
                        </td>
                        <td class="t_btn">
                          <button>
                          Re-Order
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="btn_or_mb">
                    <button>
                    Re-Order
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<style>
  @import './profile.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import form from 'vuejs-form'
import HTTP from './../../Api/auth'
import axios from 'axios'
import Notification from '../Notification'

import loading from "../../assets/images/loading.gif"
import input_edit from "../../assets/images/input_edit.png"
import store_profile from "../../assets/images/store_profile.png"
import ship from "../../assets/images/ship.png"

export default {
  name:"Profile",
  components: {
    Notification
  },
  data: () => ({
    loading:loading,
    input_edit:input_edit,
    store_profile:store_profile,
    ship:ship,
    errorMessage:'',
    nameData:{'name':1,'email':1,'password':1},
    addMorePet:false,
    petImage:[],
    shippingFrom: form({
      name: '',
      email: '',
      password: '',
      zip_code: '',
      phone: '',
      city: '',
      state: '',
      country: ''
    })
      .rules({
        name: 'required',
        email: 'email|min:5|required',
        address: 'required',
        zip_code: 'required',
        phone: 'required',
        city: 'required',
        state: 'required',
        country: 'required'
      })
      .messages({
        'name.name': 'Name is required!',
        'email.email': 'Email is required!',
        'address.address': 'Address is required!',
        'zip_code.zip_code': 'Zip Code is required!',
        'phone.phone': 'Zip Code is required!',
        'city.city': 'City is required!',
        'state.state': 'State is required!',
        'country.country': 'Country is required!'
      }),
    petform: form({
      name: '',
      type: '',
      age: ''
    })
      .rules({
        name: 'required'
      })
      .messages({
        'name.name': 'Name is required!'
      }),
    petprofiles:[],
    profileDetails:[],
    imageloading:false,
    petloading:false
  }),
  beforeMount(){
    this.getProfile()
  },
  mounted(){
    this.getOrders()
    this.getPets()
  },
  watch: {
    accountDetails(){
      this.profileDetails=this.accountDetails
      Object.keys(this.accountDetails).reduce((formData, key) => {
           this.shippingFrom[key]= this.accountDetails[key]
      })
    },
    pets(){
      this.petprofiles = this.pets
    }
  },
  computed: {
    ...mapGetters(['accountDetails', 'accountErrors', 'upProfile', 'Orders', 'pets'])
  },
  methods: {
    ...mapActions(['getProfile','updateProfile','getOrders', 'getPets']),
    displayField(fieldOpen){
      if(this.nameData[fieldOpen]==1){
        this.nameData[fieldOpen]=0
      }else{
        this.nameData[fieldOpen]=1
        var userInfo = this.shippingFrom.data
        delete userInfo['profile_image']
        this.requestData(userInfo,'')
      }
    },
    updateShipping(){
      this.shippingFrom.validate()
      if (!this.shippingFrom.validate().errors().any()) {
        var userInfo = this.shippingFrom.data
        delete userInfo['profile_image']
        this.requestData(userInfo,'')
      }
    },
    requestData(profileData, config){
      if(config !=''){
        HTTP.post(process.env.MIX_APP_APIURL+"update", profileData,config).then((response) => {

          this.profileDetails= response.data.data
          var _this = this
          Object.keys(_this.profileDetails).reduce((formData, key) => {
              this.shippingFrom[key]= _this.profileDetails[key]
          })
          this.$refs.notifications.displayNotification('success','UserInfo','User Details is updated.')
          this.imageloading=false
        }).catch((errors) => {
          this.$refs.notifications.displayNotification('error','UserInfo',errors.response.data.message)
        })
      }else{
        HTTP.post(process.env.MIX_APP_APIURL+"update", profileData).then((response) => {
          this.profileDetails= response.data.data
          var _this = this
          Object.keys(_this.profileDetails).reduce((formData, key) => {
              this.shippingFrom[key]= _this.profileDetails[key]
          })
          this.$refs.notifications.displayNotification('success','UserInfo','User Details is updated.')
          this.imageloading=false
        }).catch((errors) => {
          this.$refs.notifications.displayNotification('error','UserInfo',errors.response.data.message)
        })
      }
    },
    petRequestData(petData, config){
      if(config !=''){
        HTTP.post(process.env.MIX_APP_APIURL+"pet/create", petData,config).then((response) => {
          this.getPetslist()
          this.addMorePet = false
          this.$refs.notifications.displayNotification('success','Pet','Pet is added.')
          this.petloading=false
        }).catch((errors) => {
          this.$refs.notifications.displayNotification('error','Pet',errors.response.data.message)
          this.petloading=false
        })
      }
    },
    uploadImage(event) {
      this.imageloading=true
      let data = new FormData();
      var _this = this
      Object.keys(this.shippingFrom.data).forEach(function(key,index) {
        data.append(key,_this.shippingFrom.data[key])
      })
      data.append('profile_image', event.target.files[0])
      let config = {
        header : {
          'Content-Type': 'multipart/form-data'
        }
      }
      this.requestData(data,config)
    },
    uploadPetImage(event){
      if(event.target.files[0]){
        this.petImage = event.target.files[0]
      }
    },
    addPet(){
      this.petloading=true
      this.petform.validate()
      if (!this.petform.validate().errors().any()) {
        let data = new FormData()
        var _this = this
        Object.keys(_this.petform.data).forEach(function(key,index) {
          data.append(key,_this.petform.data[key])
        })
        Object.keys(_this.petform.data).forEach(function(key,index) {
          _this.petform.data[key]=''
        })
        data.append('image', this.petImage)
        let config = {
          header : {
            'Content-Type': 'multipart/form-data'
          }
        }
        this.petRequestData(data,config)
      }
    },
    getPetslist(){
      HTTP.get(process.env.MIX_APP_APIURL+"pet").then((response) => {
        this.petprofiles= response.data.data
      })
    },
    productSlug(productName){
      return productName.replace(/\s+/g, '-').toLowerCase()
    }
  }
}
</script>
