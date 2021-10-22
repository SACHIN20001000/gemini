<template>
<div class="home" >
  <p>This is the homepage</p>
<Users/>
<Products/>
</div>

</template>
<script>
import Users from './Users'
import Products from './Product'


export default {
  name:"Home",
  components:{
    Users,
    Products

  }
}
</script>

<style scoped>
.home{
  background-color: skyblue ;
  height: 500px;
}
</style>