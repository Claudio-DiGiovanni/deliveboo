<template>
  <div class="container_nav">
    <nav class="navbar navbar-expand-md">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{ name: 'home' }" class="nav-link"
                >DeliveBoo</router-link
              >
            </li>

          </ul>
          <div class="nav-item d-flex">
              <router-link :to="{ name: 'cart' }"><button>Carrello <strong v-if="cartQuantity !== 0">{{ cartQuantity }}</strong></button></router-link>
              <a class="mx-5" href="/admin"><button>Collabora con noi</button></a>
            </div>
        </div>
      </div>
    </nav>

  </div>
</template>

<script>
export default {
    computed: {
        cartQuantity() {
            return this.$store.getters.cartQuantity;
        }
    }
};
</script>

<style lang="scss" scoped>
.navbar-collapse{
    justify-content: space-between;
}

.nav-link {
  color: white;
  font-weight: bold;
  font-size: 2rem;
}
.navbar {
  background-color: rgba(92, 201, 188, 1);
}

button{
    border: none;
    background-color: white;
    padding: .5rem;
    border-radius:.5rem ;
}
</style>
