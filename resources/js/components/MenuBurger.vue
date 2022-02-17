<template>
    <div @click="changeMenuBureger" class="Menu__burger" :class="[activeClass ? 'active' : '' ]">
        <MenuIcon />
    </div>
</template>

<script>
import MenuIcon from './icons/MenuIcon.vue';

export default {
    data: function () {
        return {
            activeClass: false,
        }
    },
    components: {
        MenuIcon,
    },
    props: {
    },
    methods: {
        changeMenuBureger() {

            this.activeClass = !this.activeClass
            this.$emit('handleBurgerClicked');
             document.body.classList.toggle('hidden_body');
        },
    }
};
</script>

<style lang="scss" scoped>

.Menu__burger {
    width: 30px;
    height: 30px;
    cursor: pointer;
}
</style>
