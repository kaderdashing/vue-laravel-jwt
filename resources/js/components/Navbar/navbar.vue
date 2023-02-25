<template>
    <div class="p-4">
        <router-link :to="'/'">Dashboard</router-link> || 
        <router-link :to="'/login'">Login</router-link> ||
        <router-link :to="'/register'">Register</router-link>

    </div>
</template>

<script>
export default {
    name: 'Navbar',
}
</script>

<style scoped>
  div {
        background-color: cornflowerblue;
        color: white;
    }
</style>
