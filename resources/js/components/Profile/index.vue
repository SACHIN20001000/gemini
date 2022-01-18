<template>
  <div class="main_container">
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
              <div class="col-3">
                <img :src="store_profile">
              </div>
              <div class="col-9">
                <h1 class="st_h">Welcome back, Susan M.!</h1>
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
    <section class="st_info">
      <div class="container_990 bb-1">
        <h1 class="st_title">My Profile</h1>
        <div class="row">
          <div class="col-3">
            <ul class="nav st_tab_list" id="profil_info">
              <li class="nav-item" role="presentation">
                <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#st_info">Infos</button>
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
              <div class="tab-pane fade show active" id="st_info">
                <div class="form-group">
                  <label class="lb_small">Name</label>
                  <div class="inp_edt" v-if="nameData==1">
                    {{accountDetails.name}} <i @click="displayField('name')"><img :src="input_edit"></i>
                  </div>
                  <div class="inp_edt" v-else>
                    <input type="text" v-model="name"> <i class="fa fa-check" @click="displayField('name')" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="lb_small">E-mail</label>
                  <div class="inp_edt">
                    {{accountDetails.email}} <i><img :src="input_edit"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="lb_small">Password</label>
                  <div class="inp_edt mb-0">
                    ********** <i><img :src="input_edit"></i>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="st_shipping">
                1
              </div>
              <div class="tab-pane fade" id="st_payment">
                2
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="st_info">
      <div class="container_990 bb-1">
        <h1 class="st_title">My Pet Profile</h1>
        <br>
        <ul class="pet_pro_list">
          <li>
            <a href="#">
              <img :src="dog1">
            </a>
            <span>Brutus</span>
          </li>
          <li>
            <a href="#">
              <img :src="dog2">
            </a>
            <span>Luna</span>
          </li>
          <li>
            <label class="uplod_btn">
              <input type="file" id="myfile" name="myfile">
            </label>
          </li>
        </ul>
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
              <div class="tab-pane fade show active" id="or_latest">
                <div class="tb_responsive">
                  <table class="produc_table">
                    <thead>
                      <tr>
                        <th class="data_head" width=25%><span class="tb_sm">Order Date</span> <b>Sept, 14 2021</b></th>
                        <th class="data_head" width=25%>Order Number #20210900001</th>
                        <th width=width=25%></th>
                        <th width=25%></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="pt_img">
                          <a href="#"><img :src="tp1"></a>
                        </td>
                        <td class="t_size">
                          Pet Parents®
                          Dog Diapers
                          <span>Princess | Size: S</span>
                        </td>
                        <td class="t_price">
                          <span>Item Price:</span>
                          S 25.00
                        </td>
                        <td class="t_btn">
                          <button>
                          Re-Order
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="pt_img">
                          <a href="#"><img :src="tp2"></a>
                        </td>
                        <td class="t_size">
                          Pet Parents®
                          Dog Diapers
                          <span>Princess | Size: S</span>
                        </td>
                        <td class="t_price">
                          <span>Item Price:</span>
                          S 25.00
                        </td>
                        <td class="t_btn">
                        </td>
                      </tr>
                      <tr>
                        <td class="pt_img">
                          <a href="#"><img :src="tp3"></a>
                        </td>
                        <td class="t_size">
                          Pet Parents®
                          Dog Diapers
                          <span>Princess | Size: S</span>
                        </td>
                        <td class="t_price">
                          <span>Item Price:</span>
                          S 25.00
                        </td>
                        <td class="t_btn">
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
              <div class="tab-pane fade" id="or_all">1
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

import tp3 from "../../assets/images/tp3.png"
import tp2 from "../../assets/images/tp2.png"
import tp1 from "../../assets/images/tp1.png"
import dog2 from "../../assets/images/dog2.png"
import dog1 from "../../assets/images/dog1.png"
import input_edit from "../../assets/images/input_edit.png"
import store_profile from "../../assets/images/store_profile.png"
import ship from "../../assets/images/ship.png"

export default {
  name:"Profile",
  data: function () {
    return {
      tp3:tp3,
      tp2:tp2,
      tp1:tp1,
      dog2:dog2,
      dog1:dog1,
      input_edit:input_edit,
      store_profile:store_profile,
      ship:ship,
      errorMessage:'',
      nameData:1,
      name:''
    }
  },
  beforeMount(){
    this.getProfile()
  },
  watch: {
    accountDetails(){
      this.name=this.accountDetails.name
    }
  },
  computed: {
    ...mapGetters(['accountDetails', 'accountErrors', 'upProfile'])
  },
  methods: {
    ...mapActions(['getProfile','updateProfile']),
    displayField(fieldOpen){
      if(fieldOpen == 'name'){
        if(this.nameData==1){
          this.nameData=0
        }else{
          this.nameData=1
          var profileData = {'name':this.name}
          this.updateProfile(profileData)
        }
      }
    }
  }
}
</script>
