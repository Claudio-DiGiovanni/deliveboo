<template>
    <div class="container ">
        <div class="row row-cols-lg-4 row-cols-md-4 row-cols-sm-2">
            <router-link :to="{ name: 'dishes' }" class="m-3" v-for="user in users" :key="user.id">
            <div class="card card-ristoranti col">
                <div>
                    <img :src="user.image_logo" class="card-img-top w-100 p-2" alt="...">
                </div>
                <div class="card-body text-center">
                    <h2 class="card-text text-white m-3"><router-link :to="{ name: 'dishes' }" class=" text-white">{{ user.name }}</router-link></h2>
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

<style lang="scss" scoped>
    a {
        text-decoration: none;
    }
    .card-ristoranti {
        height: 20rem;
    }
</style>
