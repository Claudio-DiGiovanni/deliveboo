<template>
    <div class="container">
        <div>
            <h1>Ordine completato con successo</h1>
            <p>Grazie, {{ order.customer_name }}. L'ordine numero {{ order.id }} verrà consegnato il prima possibile all'indirizzo {{ order.address }} </p>
        </div>


    </div>

</template>

<script>
export default {
    data() {
        return {
            order: {},
        }
    },
    methods: {
    async loadOrder() {
        try {
        await axios.get(`/api/order/${this.$route.params.orderId}`)
            .then(response => {
                this.order =  response.data.orderRecap;
            })
        } catch (error) {
        console.log(error)
        }
    },
    },
    mounted() {
        this.loadOrder()
    }

}
</script>

<style>

</style>
