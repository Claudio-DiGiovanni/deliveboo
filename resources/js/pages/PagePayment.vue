<template>
  <div class="container">
    <form action="POST" @submit.prevent="createOrder">
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
            <!-- <VueBraintree
    authorization="sandbox_tvdhk234_gdnp6hdtyqk5mwj4"
    @success="onSuccess"
    @error="onError"
></VueBraintree> -->
            <button type="submit" class="m-2 btn btn-success">Crea Ordine</button>
    </form>
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
  </div>
</template>

<script>
//import VueBraintree from 'vue-braintree';

export default{
    components: {
       // VueBraintree,
    },
    data() {
        return {
            customer_name: "",
            email: "",
            address: "",
            cart: this.$route.params.cart,
            popupVisibility: false,
        }
    },
    methods: {
        createOrder() {
            const payload = {
                customer_name: this.customer_name,
                email: this.email,
                address: this.address,
                cart: this.cart,
            };
            console.log(this.cart)
            console.log(payload)
            this.$store.dispatch("createOrder", payload)
                .then(() => {
                    this.customer_name = "";
                    this.email = "";
                    this.address = "";
                    this.popupVisibility = true;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        onSuccess (payload) {
      let nonce = payload.nonce;
      // Do something great with the nonce...
    },
    onError (error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    },
    }
}
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
}

</style>
