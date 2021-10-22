<template>
  <div class="child">
    <p>This is the Product Component</p>
    <button v-on:click="clickevent('Product')">Product button</button>
  </div>
</template>
<script>
export default {
  name: "Product",
  methods: {
    clickevent(name) {
      console.log(name);
    },
  },
};
</script>

<style scoped>
.child {
  background-color: greenyellow;
  height: 200px;
  width: 200px;
  padding: 30px;
  margin: 20px;
}
</style>