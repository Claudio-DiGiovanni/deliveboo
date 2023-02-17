<template>
  <div>
    <AdminHome />
    <router-view></router-view>
  </div>
</template>

<script>
import AdminHome from './components/AdminHome';

export default {
    name:'App',
    components:{
        AdminHome,
    }
}
</script>

<style>

</style>
