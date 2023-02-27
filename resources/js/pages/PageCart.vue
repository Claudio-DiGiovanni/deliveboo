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
      <button class="btn btn-primary text-light"><router-link :to="{ name: 'payment' }">Paga</router-link></button>
    </div>
  </template>

  <script>
  export default {
    name: "Cart",
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
    },
  };
  </script>
