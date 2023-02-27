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
    background-color: rgb(255, 196, 124);
}
.container{
    background-color: rgb(255, 196, 124);
    padding-top: 4rem;
}
.card, .col{
    padding-left: 0 !important;
    padding-right: 0 !important;
}
    a {
        text-decoration: none;
        margin: 0 !important;
    }
    .card-ristoranti {
        height: 20rem;
    }
  .card{
    border: none;
    width: 300px;
    justify-content: space-between;
    background-color:rgb(255, 196, 124) ;

  }
  .card-img-top{
    object-fit: contain;
    background-color: rgb(255, 196, 124);
  }
  .section_nav {
  position: relative;
  height: 35rem;
  background-color: rgb(253,189,16);
  display: flex;
  align-items: center;
  background-image: url(https://i.pinimg.com/originals/12/48/e2/1248e2491e090960c1d4d060036185fa.jpg);
  background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  h2 {
    padding: 2rem;
    font-style: oblique;
    font-size: xx-large;
    color: rgb(253,189,16);
  }
  .hash {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: rgb(253,189,16);
    padding: 4rem;
    font-weight: bolder;
    color: white;
    font-size: 40px;
    border-top-left-radius: 80%;
  }
}
</style>
