<template>
    <div class="text-center">
        <h2>Carrello</h2>
        <div class="container-shop d-flex text-center row row-cols-3 justify-content-center">
            <div class="card card-carrello m-3" v-for="dish in cart" :key="dish.id">
            <div class="card-body col">
                <h5 class="card-title">{{ dish.name }}</h5>
                <p class="card-text">{{ dish.price / 100 }}</p>
                <div class="m-2">
                    <button @click="decrementItem(dish)" class="btn btn-light">-</button>
                        {{ dish.quantity }}
                <button @click="incrementItem(dish)" class="btn btn-light">+</button>
                </div>
                <div>
                    <button @click="removeFromCart(dish)" class="btn btn-danger">Rimuovi</button>
                </div>
            </div>
        </div>
        </div>
        <div class="text-center">
            <p>TOTALE: {{ cartTotal / 100 }} </p>
        </div>
        <div class="">
            <form @submit.prevent="createOrder" method="POST">
            <div class="form-group">
                <label for="customer_name">Nome</label>
                <input type="text" id="customer_name" v-model="customer_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="address">Indirizzo di consegna</label>
                <input type="text" id="address" v-model="address" required>
            </div>
            <div>
                <button @click="showPopup()" type="submit" class="m-2 btn btn-success">Crea Ordine</button>
            </div>
            <div>
                <button @click="clearCart" class="m-2 btn btn-warning">Svuota il carrello</button>
            </div>
            <div class="background" :class="popupVisibility ? 'd-flex' : 'd-none'">
                <div class="popup">
                    <h5 class="w-100 text-center mb-3">Ordine Completato</h5>
                    <router-link :to="{ name: 'order' }">
                        <button class="btn btn-success">Vedi ordine</button>
                    </router-link>
                    <router-link :to="{ name: 'home' }">
                        <button class="btn btn-success">Torna alla Home</button>
                    </router-link>
                </div>
            </div>
        </form>
        </div>
        <button class="btn btn-primary"><router-link :to="{ name: 'payment' }">Paga</router-link></button>
    </div>
</template>

<script>
export default {
    name: "Cart",
    data() {
        return {
            customer_name: "",
            email: "",
            address: "",
            popupVisibility: false,
        };
    },
    computed: {
        id() {
            return this.$route.params.id;
        },
        cart() {
            return this.$store.getters.cartItems;
        },
        cartTotal() {
            return this.$store.getters.cartTotal;
        },
    },
    methods: {
        removeFromCart(dish) {
            this.$store.commit("REMOVE_ITEM", dish);
        },
        incrementItem(dish) {
            this.$store.commit("INCREMENT_ITEM_QUANTITY", dish);
        },
        decrementItem(dish) {
            this.$store.commit("DECREMENT_ITEM_QUANTITY", dish);
        },
        clearCart() {
            this.$store.commit("CLEAR_CART");
        },
        createOrder() {
            const payload = {
                customer_name: this.customer_name,
                email: this.email,
                address: this.address,
                cart: this.cart,
            };
            this.$store.dispatch("createOrder", payload)
                .then(() => {
                    this.customer_name = "";
                    this.email = "";
                    this.address = "";
                })
                .catch(error => {
                    console.error(error);
                });
        },
        showPopup() {
            this.popupVisibility = true;
        },
    },
};
</script>
<style lang="scss" scoped>
.background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba($color: #000000, $alpha: .4);
    display: none;
    justify-content: center;
    align-items: center;

    .popup {
        z-index: 999;
        padding: 5rem;
        background-color: whitesmoke;
        border: 2px solid grey;
        border-radius: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .card-carrello {
        width: 18rem;;
    }
}
</style>
