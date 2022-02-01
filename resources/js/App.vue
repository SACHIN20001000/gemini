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
  metaInfo: {
    title: 'The Pet parents Store',
    titleTemplate: 'The Pet parents Store'
  },
  components: {
    PETHeader,
    PETFooter
  },
  created: function(){
    this.init()
  },
  methods: {
    ...mapActions(["getToken" ,"getCartToken"]),
    init(){
      if(localStorage.getItem('token') === null || localStorage.getItem('token') =='undefined') {
        this.getToken()
      }
      if(localStorage.getItem('cartId') === null || localStorage.getItem('cartId') =='undefined') {
        this.getCartToken()
      }
    }
  }
}
</script>
