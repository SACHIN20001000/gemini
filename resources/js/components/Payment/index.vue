<template>
  <div class="main">

<div class="thanks">
  <div>
  <img src="images/paw.png">
  <h1>Thank <span>You!</span></h1>
</div>
</div>

  <!--<div class="container_max">
    <h1 class="page_title">Order List</h1>
    <table class="ordertable table_style1">
      <thead>
      <tr>
        <th>Transaction Id</th>
        <th>Email</th>
        <th>address</th>
        <th>Items</th>
        <th>Payment Method</th>
        <th>Shipping Method</th>
        <th>Items count</th>
        <th>Order Cost</th>
        <th>Created At</th>
      </tr>
    </thead>
      <tbody>
        <tr
          v-for="(Order,orderkey) in Orders"
          :key="orderkey"
        >
          <td>{{Order.transaction_id}}</td>
          <td>{{Order.user.email}}</td>
          <td>{{Order.user.address}}</td>
          <td>
            <ul class="itemList">
              <li v-for="(orderItem, oikey) in Order.orderItems"  :key="oikey">
                {{orderItem.product_id}} ({{orderItem.quantity}})
              </li>
            </ul>
          </td>
          <td>{{Order.payment_method}}</td>
          <td>{{Order.shippingmethod}}</td>
          <td>{{Order.item_count}}</td>
          <td>${{Order.grand_total}}</td>
          <td>{{Order.created_at}}</td>
        </tr>
      </tbody>
    </table>
  </div>-->
  </div>
</template>
<style>
  @import './payments.css';
</style>
<script>
import {mapGetters,mapActions} from "vuex"

export default {
  name:"Payments",
  created(){
    this.getOrders()
  },
  computed: {
    ...mapGetters(['Orders'])
  },
  methods:{
    ...mapActions(['getOrders'])
  }
}
</script>
