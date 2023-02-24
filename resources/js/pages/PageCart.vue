<template>
    <div>
      <h2>Carrello</h2>
      <ol>
        <li v-for="dish in cart" :key="dish.id">
          <ul>
            <li>{{ dish.name }}</li>
            <li>{{ dish.price/100 }}</li>
            <li>{{ dish.quantity }}</li>
          </ul>
        </li>
      </ol>
      <p>Totale: {{ getTotal() }} €</p>
    </div>
  </template>

  <script>
  export default {
    name: 'Cart',
    methods: {
        getTotal() {
            let total = 0;
            this.cart.forEach(dish => {
                total = total + dish.price;
            });
        return total/100;
        },
    },
    computed: {
  id() {
    return this.$route.params.id;
  },
  cart() {
    return this.$store.state.cart.items.filter(item => item.quantity > 0);
  }
}
  }
  </script>
