<template>
	 <!-- <img :src="menuLines" /> -->
   <span class="menu_lines">
     <span></span>
     <span></span>
     <span></span>
   </span>
</template>

<script>
import menuLines from "../../assets/images/menu_lines.svg"
export default {
 data: function () {
    return {
      menuLines: menuLines
    }
  }
};
</script>

<style lang="scss" scoped>

.svg {
	width: 100%;
	height: 100%;
}
</style>
