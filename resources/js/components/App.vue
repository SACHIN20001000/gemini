<template>
  <div>
    <notifications group="foo" />
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "App"
}
</script>
