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
import PETHeader from "./components/Header";
import PETFooter from "./components/Footer";
export default {
  name: "App",
  components: {
    PETHeader,
    PETFooter
  },
}
</script>
