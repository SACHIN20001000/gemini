<template>
  <div class="main">
    <p>Login Page</p>
    <form>
      <template>
        <p>{{accountDetails.email}}</p>
        <div class="errorMsg" v-if="accountErrors && accountErrors != null && accountErrors != ''">{{accountErrors}} </div>
      </template>
    </form>
  </div>
</template>
<style>
  @import './profile.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"

export default {
  name:"Profile",
  beforeMount(){
    this.getProfile()
  },
  computed: {
    ...mapGetters(['accountDetails', 'accountErrors'])
  },
  methods: {
    ...mapActions(['getProfile'])
  }
}
</script>
