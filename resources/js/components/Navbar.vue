<template>
  <nav class="navbar">

    <div class="navbar-menu" :class="{ 'is-active': isMenuActive }">
      <div class="navbar-start is-flex">
        <router-link class="navbar-item" :to="'/'" exact :class="{ 'is-active': $route.path === '/' }">Dashboard</router-link>
      </div>

      <div class="navbar-end is-flex">
        <router-link class="navbar-item" :to="'/login'" exact :class="{ 'is-active': $route.path === '/login' }">Login</router-link>
        <router-link class="navbar-item" :to="'/register'" exact :class="{ 'is-active': $route.path === '/register' }">Register</router-link>
        <router-link class="navbar-item" :to="'/employe-records'" exact :class="{ 'is-active': $route.path === '/employe-records' }">Employer records</router-link>

      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      isMenuActive: false,
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuActive = !this.isMenuActive;
    },
  },
}
</script>

<style scoped>
.navbar {
  background-color: #2C73D2;
  color: #FBEAFF;
  height: 50px;
  display: flex;
  align-items: center;
}

.navbar-brand {
  display: inline-block ;
  align-items: center;
  padding: 0.5rem 1rem;
}

.navbar-burger {
  display: none;
  cursor: pointer;
  color: #fff;
}

.navbar-item {
  padding: 0.5rem 1rem;
  color: #fff;
  text-decoration: none;
}

.navbar-item.is-active {
  background-color: #008E9B;
  color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
}

.is-flex {
  display: inline-block ;
}

@media screen and (max-width: 768px) {
  .navbar-burger {
    display: block;
  }

  .navbar-menu {
    display: none;
  }

  .is-active .navbar-menu {
    display: block;
  }
}
</style>
