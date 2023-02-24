<template>
    <div class="bg_img">
        <div class="container text-alight-center">
            <h1 class="text-center text-white p-4">I Nostri Piatti</h1>
            <div class="container ">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2">
                    <div v-for="dish in dishes" :key="dish.id" v-show="dish.user_id === $route.params.id" class="p-3">
                        <div class="card card-ristoranti-2 bg-opacity-25 p-0 col">
                            <div class="container_img">
                                <img :src="dish.image" class="card-img-top h-100 w-100" alt="" />
                            </div>
                            <div class="card_body">
                                Descrizione: {{ dish.description }}
                                <div>
                                    Prezzo: {{ dish.price / 100 }} €
                                </div>
                                <form class="text-center"> <!-- FORM PER INSERIRE QUANTITA' -->
                                <label class="text-center" for="quantita">Quantità:</label>
                                <div class="number-input">
                                    <button type="button" @click="incrementaQuantita()"><i class="fa-solid fa-plus"></i></button>
                                    <div class="quantity">
                                        {{ quantita }}
                                    </div>
                                    <button type="button" @click="decrementaQuantita()"><i class="fa-solid fa-minus"></i></button>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

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
        incrementaQuantita() {  //gestione quantità piatto con + -
            this.quantita++;
        },
        decrementaQuantita() {  //gestione quantità piatto con + -
            if (this.quantita > 0) {
                this.quantita--;
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

.card {
    position: relative;
    perspective: 1000px;
    border: none !important;
}

.card-ristoranti {
    height: 100%;
}

.container_img {
    width: 100%;
    transform: rotate(0deg);
    backface-visibility: hidden;
    transition: transform 0.6s linear;

    img {
        width: 100%;
    }
}

.card_body {
    padding: 1rem;
    color: white;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: transform 0.6s linear;
    overflow: hidden;
}

.card:hover .container_img {
    transform: rotateY(-180deg);
}

.card:hover .card_body {
    transform: rotateY(0deg);
    transition: 1.5s;
    background-color: black;
}

.bg_img {
    background-image: url(https://blendofbites.com/wp-content/uploads/2021/01/varity-of-fast-food-on-black-table-2048x1365.jpg);
    background-size: cover;
}

.card-ristoranti-2 {
    background: transparent;
}

.number-input {
    //gestione quantità piatto con + -
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row-reverse;
    justify-content: center;
    align-items: center;
}

.number-input input {
    //gestione quantità piatto con + -
    width: 40px;
    font-size: 18px;
    text-align: center;
    border: none;
    background-color: transparent;
}

.number-input .quantity {
    //gestione quantità piatto con + -
    width: 60px;
    /* larghezza del campo di input */
}
</style>
