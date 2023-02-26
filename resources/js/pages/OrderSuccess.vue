<template>
    <div class="container">
        <div v-if="success">
            <h1>Ordine completato con successo</h1>
            <p>Grazie, {{ order.customer_name }}. L'ordine numero {{ order.id }} verrà consegnato il prima possibile all'indirizzo {{ order.address }} </p>
        </div>
        <div v-else>
            <h2>Qualcosa è andato storto</h2>
        </div>

    </div>

</template>

<script>
export default {
    props: ['success', 'order'],

}
</script>

<style>

</style>
