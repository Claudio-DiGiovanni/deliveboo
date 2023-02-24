<template>
    <div class="container text-alight-center">
        <h1>I Nostri Piatti</h1>
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2">
                <div v-for="dish in dishes" :key="dish.id" v-show="dish.user_id === $route.params.id" class="p-3">
                    <div class="card card-ristoranti bg-opacity-25 col">
                        <div class="container_img">
                            <img :src="dish.image" class="card-img-top p-2 h-100 w-100" alt="" />
                        </div>
                        <div class="card_body">
                        Descrizione: {{ dish.description }}
                        <div>
                            Prezzo: {{ dish.price / 100 }} €
                        </div>
                        <form action="/action_page.php">
                            <label for="quantity">Quantità:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="5">
                            <input type="submit">
                        </form>
                        </div>

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
            dishes: [],
        };
    },
    methods: {
        async loadDishes() {
            try {
                const response = await axios.get(
                    `/api/dishes/user/${this.$route.params.id}`
                );
                this.dishes = response.data;
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
        this.loadDishes();
    },
};
</script>

<style lang="scss" scoped>
.card_body {
    margin-bottom: 1rem;
}
.card{
    position: relative;
    perspective: 1000px;
    border: none !important;
}
.card-ristoranti {
    height: 100%;
}
.container_img{
    width: 100%;
    transform: rotate(0deg);
    backface-visibility: hidden;
    transition: transform 0.4s linear;
    img{
        width: 100%;
    }
}
.card_body{
    padding: 1rem;
    color: white;
    position: absolute;
    top: 0;

    width: 100%;
    height: 100%;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: transform 0.4s linear;
    overflow: hidden;
}
.card:hover .container_img{
    transform: rotateY(-180deg);
}
.card:hover .card_body{
    transform: rotateY(0deg);
    transition: 1s;
    background-color: black;

}
</style>
