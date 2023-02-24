<template>
    <div class="container">
        <ul>
            <li v-for="user in users" :key="user.id"><router-link :to="{name: 'dishes', params: { id: user.id }}" class="nav-link">{{ user.name }}</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: null,
        }
    },
    created() {
        axios.get('/api/')
            .then(response => {
                if (response.data.success) {
                    this.users = response.data.results;
                } else {
                    this.users = 'non va un cazzo';
                }
            })
    }
}
</script>

<style>

</style>
