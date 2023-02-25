require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';
import Register from './components/Register.vue';





createApp({
    components: {
        Register,
        Login,
        Dashboard
    }
}).use(router).mount('#app')