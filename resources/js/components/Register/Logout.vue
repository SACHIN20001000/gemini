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
  created(){
    localStorage.removeItem('token')
    localStorage.removeItem('userauth')
    window.location.href='/signin'
  }
}
</script>
