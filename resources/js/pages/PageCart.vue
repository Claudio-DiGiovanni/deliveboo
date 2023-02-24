<template>
    <div>
      <h2>Carrello</h2>
      <ul>
        <li v-for="dish in cart" :key="dish.id">
          {{ dish.name }} - {{ dish.price }} €
        </li>
      </ul>
      <p>Totale: {{ total }} €</p>
    </div>
  </template>

  <script>
  export default {
    name: 'Cart',
    computed: {
    cart() {
      return this.$store.state.cart.items;
    },
      total () {
        return this.$store.state.total
      }
    }
  }
  </script>
