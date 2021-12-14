<template>
  <div class="main">
    <p>LogOut Page</p>
  </div>
</template>
<style>
  @import './register.css';
</style>
<script>

export default {
  name:"Logout",
  beforeMount(){
    localStorage.removeItem('token')
    window.location.href='/signin'
  }
}
</script>
