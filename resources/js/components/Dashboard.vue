<template>
     <Navbar />
    <h1>Dashboard</h1>
    <button @click="getInformations">Obtenir mes informations</button>
</template>

<script>
import axiosClient from '../axios';
import Navbar from './Navbar.vue';
export default {
    name: "Dashboard",
    components: {
    Navbar,
  },
    methods: {
        getInformations() {
            axiosClient.post('/privateInformations')
                .then(res => console.log(res))
                .catch(err => console.log(err));
        }
    }
}
</script>