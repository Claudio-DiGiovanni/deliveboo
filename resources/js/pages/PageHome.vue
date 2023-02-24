<template>
    <div class="container_section">
        <div class="container ">
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2" >
            <router-link :to="{name: 'dishes', params: { id: user.id }}" class="p-3 w-75 m-auto" v-for="user in users" :key="user.id">
            <div class="card card-ristoranti bg-opacity-25 col ">
                <div class="w-100 h-75 m-auto">
                    <img :src="user.image_logo" class="card-img-top  h-100 w-100" alt="...">
                </div>
                <div class="card-body text-center">
                    <h2 class="card-text text-dark">{{ user.name }}</h2>
                </div>
            </div>
        </router-link>
        </div>
    </div>
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

<style lang="scss" scoped>
.container_section{
    background-color: bisque;
}
.container{
    background-color: bisque;
    padding-top: 4rem;
}
.card, .col{
    padding-left: 0 !important;
    padding-right: 0 !important;
}
    a {
        text-decoration: none;
    }
    .card-ristoranti {
        height: 20rem;
    }
  .card{
    border: none;
    width: 300px;
    justify-content: space-between;
    background-color: bisque ;
   
  }
  .card-img-top{
    object-fit: contain;
    background-color: bisque ;
  }
</style>
