<template>
    <div class="container text-alight-center">
        <h1>I Nostri Piatti</h1>
        <div class="d-fex" v-for="dish in dishes" :key="dish.id" v-show="dish.user_id === $route.params.id">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2">
                <div class="card card-ristoranti bg-opacity-25 col ">
                    <div class="w-75 h-75 m-auto">
                        <img :src="dish.image" class="card-img-top p-2 h-100 w-100" alt="">
                    </div>
                    <div class="card-body text-center">
                        <p>{{ dish.description }}</p>
                    </div>
                    <div>
                        <p>Prezzo: {{ dish.price }} €</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dishes: []
        };
    },
    methods: {
        async loadDishes() {
            try {
                const response = await axios.get(`/api/dishes/user/${this.$route.params.id}`)
                this.dishes = response.data
            } catch (error) {
                console.log(error)
            }
        }
    },
    mounted() {
        this.loadDishes()
    }
};
</script>

<style></style>
