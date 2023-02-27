<template>
     <div>
    <h1>I Nostri Piatti</h1>
    <div v-for="dish in dishes" :key="dish.id" v-show="dish.user_id === $route.params.id">
      <h2>{{ dish.name }}</h2>
      <p>{{ dish.description }}</p>
      <p>Prezzo: {{ dish.price }} €</p>
      <button @click="addToCart(dish)">Aggiungi al carrello</button>
    </div>
  </div>
  </template>

  <script>
  import store from '../store';
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
    },
    addToCart(dish) {
        this.$store.dispatch("addToCart", dish);
},
    },
    mounted() {
    this.loadDishes()
    }
  };
  </script>

<style>

</style>
