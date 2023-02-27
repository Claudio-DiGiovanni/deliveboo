<template>
    <div class="container">
        <div v-if="order">
            <h1>Ordine completato con successo</h1>
            <p>Grazie, {{ order.customer_name }}. L'ordine numero {{ order.id }} verrà consegnato il prima possibile all'indirizzo {{ order.address }} </p>
        </div>
    </div>

</template>

<script>
export default {
  data() {
    return {
      order: null,
    }
  },
  methods: {
    async loadOrder() {
  await axios.get('/api/get-order-id')
    .then(function(response) {
      const order_id = response.data.order_id;
      try {
        axios.get(`/api/order/${order_id}`)
          .then(function(response) {
            const orderx = response.data.orderRecap;
            this.order = orderx;
            console.log('4',this.order);
          }.bind(this));
      } catch (error) {
        console.log(error);
      }
    }.bind(this))
    .catch(function(error) {
      console.log(error);
    }.bind(this));
}
  },
  mounted() {
    this.loadOrder();
}
}
</script>

<style>

</style>
