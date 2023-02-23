<template>
    <div>
      <h2>Elenco piatti ristorante:</h2>
      <ul>
        <li v-for="dish in dishes" :key="dish.id">{{ dish.name }}</li>
      </ul>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        dishes: []
      };
    },
    created() {
      const userId = 1; // sostituire con l'ID dell'utente selezionato
      axios.get(`/api/restaurants/${userId}/dishes`)
        .then(response => {
          this.dishes = response.data.dishes;
        })
        .catch(error => {
          console.log(error);
        });
    }
  };
  </script>

<style>

</style>
