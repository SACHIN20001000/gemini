<template>
  <div>
    <div class="main_container">
      <PETHeader/>
      <router-view />
      <PETFooter/>
    </div>
  </div>
</template>

<script>
import PETHeader from "./components/Header"
import PETFooter from "./components/Footer"

import {mapActions} from "vuex"
export default {
  name: "App",
  components: {
    PETHeader,
    PETFooter
  },
  created: function(){
    this.init()
    this.getCartToken()
  },
  methods: {
    ...mapActions(["getToken" ,"getCartToken"]),
    init(){
      if(localStorage.getItem('token') === null || localStorage.getItem('token') =='undefined') {
        this.getToken()
      }
    }
  }
}
</script>
