<template>
    <div class="container">
        <div class="row row-cols-3">
            <router-link :to="{ name: 'dishes' }" class="" v-for="user in users" :key="user.id">
            <div class="card col m-4" style="width: 18rem;">
                <img :src="user.image_logo" class="card-img-top h-75" alt="...">
                <div class="card-body text-center">
                    <h2 class="card-text"><router-link :to="{ name: 'dishes' }">{{ user.name }}</router-link></h2>
                </div>
            </div>
        </router-link>
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

<style></style>
