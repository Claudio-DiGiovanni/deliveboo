<template>
   <div class="container ">
    <select v-if="types" name="type" id="type" v-model="value" @change="filterRestaurant(value)">
        <option :value="'none'" selected>Nessun Filtro</option>
        <option v-for="typex in types" :key="typex.id" :value="typex.id" >{{ typex.name }}</option>
    </select>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2" >
            <router-link :to="{name: 'dishes', params: { id: user.id }}" class="p-3 w-75 m-auto" v-for="user in users" :key="user.id">
            <div class="card card-ristoranti bg-opacity-25 col ">
                <div class="w-75 h-75 m-auto">
                    <img :src="user.image_logo" class="card-img-top p-2 h-100 w-100" alt="...">
                </div>
                <div class="card-body text-center">
                    <h2 class="card-text text-dark m-3">{{ user.name }}</h2>
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
            types: null,
        }
    },
    methods: {
        filterRestaurant(typeId) {
            if(typeId !== 'none') {
                axios.get(`/api/filter/${typeId}`)
                    .then(response => {
                        if (response.data.success) {
                            this.users = response.data.results;
                        }
                    })
            } else {
                axios.get('/api/')
                    .then(response => {
                        if (response.data.success) {
                            this.users = response.data.results;
                            this.types = response.data.types;
                        } else {
                            this.users = 'non va un cazzo';
                        }
                    });
            }
        },
    },
    created() {
        axios.get('/api/')
            .then(response => {
                if (response.data.success) {
                    this.users = response.data.results;
                    this.types = response.data.types;
                } else {
                    this.users = 'non va un cazzo';
                }
            });
    },
}
</script>

<style lang="scss" scoped>
    a {
        text-decoration: none;
    }
    .card-ristoranti {
        height: 20rem;
        background-color: rgb(154, 234, 197);
    }
</style>
