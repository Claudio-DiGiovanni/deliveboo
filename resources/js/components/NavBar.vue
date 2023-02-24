<template>
  <div class="container_nav">
    <nav class="navbar navbar-expand-md">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link :to="{ name: 'home' }" class="nav-link"
                >Deliveroo</router-link
              >
            </li>
            
          </ul>
          <div class="nav-item">
              <button>Collabora con noi</button>
              
              <button>Registrati</button>
            
            </div>
            
        </div>
      </div>
    </nav>
    <section class="section_nav">
      <h2>I piatti che ami, a domicilio</h2>
      <div class="hash">#aCasaTuaConDeliveroo</div>
    </section>
  </div>
</template>

<script>
export default {};
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
  background-color: rgb(13, 244, 209);
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
button{
    border: none;
    background-color: white;
    padding: .5rem;
    border-radius:.5rem ;
}
</style>
