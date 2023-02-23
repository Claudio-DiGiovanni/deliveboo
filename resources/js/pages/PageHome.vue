<template>
    <div class="container">
        <div class="container">
        <div class="card" v-for="user in users" :key="user.id" style="width: 18rem;">
            <img :src="user.image_logo" class="card-img-top" alt="...">
            <div class="card-body">
                <h2 class="card-text"><router-link :to="{ name: 'dishes' }">{{ user.name }}</router-link></h2>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: null,
        }
    },
    created() {
        axios.get('/api/')
            .then(response => {
                if (response.data.success) {
                    this.users = response.data.results;
                } else {
                    this.users = 'non va un cazzo';
                }
            })
    }
}
</script>

<style>

</style>
