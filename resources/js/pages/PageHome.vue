<template>
    <div class="container ">
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2" >
            <router-link :to="{ name: 'dishes' }" class="p-3" v-for="user in users" :key="user.id">
            <div class="card card-ristoranti bg-opacity-25 col ">
                <div class="w-75 h-75 m-auto">
                    <img :src="user.image_logo" class="card-img-top p-2 h-100 w-100" alt="...">
                </div>
                <div class="card-body text-center">
                    <h2 class="card-text text-dark m-3"><router-link :to="{ name: 'dishes' }" class=" text-white">{{ user.name }}</router-link></h2>
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
        background-color: rgb(25,135,84);
    }
</style>
