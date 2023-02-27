<template>
  <div>
    <NavBar />
    <router-view></router-view>
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
</style>
