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

import {mapGetters,mapActions} from "vuex"
export default {
  name: "App",
  components: {
    PETHeader,
    PETFooter
  },
  created: function(){
    this.init()
  },
  watch:{
    tokenStatus(){
      if(localStorage.getItem('cartKey') === null || localStorage.getItem('cartKey') =='undefined') {
        this.getCartToken()
      }
    }
  },
  computed: {
    ...mapGetters(['tokenStatus','tokenError'])
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
