<template>
  <div class="main">
    <h1>Order List</h1>
    <table class="ordertable">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>address</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
        <th>Zip Code</th>
        <th>Order Cost</th>
        <th>Created At</th>
      </tr>
      <tbody>
        <tr
          v-for="(Order,orderkey) in Orders"
          :key="orderkey"
        >
          <td>{{Order.name}}</td>
          <td>{{Order.email}}</td>
          <td>{{Order.address}}</td>
          <td>{{Order.city}}</td>
          <td>{{Order.state}}</td>
          <td>{{Order.country}}</td>
          <td>{{Order.zip_code}}</td>
          <td>${{Order.total_price}}</td>
          <td>{{Order.created_at}}</td>
        </tr>
      </tbody>
    </table>
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
