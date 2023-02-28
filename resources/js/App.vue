<template>
  <div>
    <NavBar  />
    <router-view class="margin-top"></router-view>
  </div>
</template>

<script>
import NavBar from './components/NavBar';

export default {
    name:'App',
    components: {
        NavBar,
    },
    created() {
        this.$store.dispatch('beforeUnload');
    }
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
    .margin-top {
    padding-top: 80px;
}
</style>
