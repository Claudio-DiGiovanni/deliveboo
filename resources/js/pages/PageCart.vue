<template>
    <div>
      <h2>Carrello</h2>
      <ol>
        <li v-for="dish in cart" :key="dish.id">
          <ul>
            <li>{{ dish.name }}</li>
            <li>{{ dish.price/100 }}</li>
            <li>
              <button @click="decrementItem(dish)">-</button>
              {{ dish.quantity }}
              <button @click="incrementItem(dish)">+</button>
            </li>
            <li>
              <button @click="removeFromCart(dish)">Rimuovi</button>
            </li>
          </ul>
        </li>
      </ol>
      <p>Totale: {{ cartTotal/100 }} €</p>
      <button @click="clearCart">Svuota il carrello</button>
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
            <button @click="showPopup()" type="submit">Crea Ordine</button>
                <div class="background" :class="popupVisibility ? 'd-flex' : 'd-none'">
                    <div class="popup">
                        <h5 class="w-100 text-center mb-3">Ordine Completato</h5>
                        <router-link :to="{ name: 'order'}">
                            <button class="btn btn-success">Vedi ordine</button>
                        </router-link>
                        <router-link :to="{ name: 'home'}">
                            <button class="btn btn-success">Torna alla Home</button>
                        </router-link>
                    </div>
                </div>
            </form>
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
  .background{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba($color: #000000, $alpha: .4);
    display: none;
    justify-content: center;
    align-items: center;
    .popup{
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
