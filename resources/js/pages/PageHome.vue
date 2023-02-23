<template>
    <div class="container">
        <div>
            <router-link :to="{ name: 'dishes' }" class="row row-col-lg-4">
                <div class="card m-4" v-for="user in users" :key="user.id" style="width: 18rem;">
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
