<template>
	 <img :src="menuLines" />
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
