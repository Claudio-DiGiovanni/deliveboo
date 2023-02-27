<template>
    <div class="container_section">
        <section class="section_nav">
      <h2>I piatti che ami, a domicilio</h2>
      <div class="hash">#aCasaTuaConDeliveBoo</div>
    </section>
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
  .section_nav {
  position: relative;
  height: 20rem;
  background-color: rgb(13, 244, 209);
  display: flex;
  align-items: center;
  background-image: url(https://thumbs.dreamstime.com/b/deliveroo-cargo-box-city-strasbourg-france-apr-near-parked-bicycle-cafe-terrace-restaurant-background-to-deliver-92371752.jpg);
  background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  h2 {
    padding: 2rem;
    font-style: oblique;
    font-size: xx-large;
    color: rgb(13, 244, 209);
  }
  .hash {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: rgb(13, 244, 209);
    padding: 4rem;
    font-weight: bolder;
    color: white;
    font-size: 40px;
    border-top-left-radius: 80%;
  }
}
</style>
