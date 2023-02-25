<template>
    <div>
        <Navbar />
        <div class="esspacement">
        <h1>login</h1>
        
        <form @submit.prevent="login">
            <label>email</label>
            <input type="email" name="email" v-model="email">
            <label>password</label>

            <input type="password" name="password" v-model="password">
            <button type="submit">Se connecter</button>
        </form>
    </div>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';
import store from '../store';
export default {
    components: {
    Navbar,
  },
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.post('api/login', {
                email: this.email,
                password: this.password
            })
                .then(res => {
                    store.state.user.token = res.data.token;
                    console.log(store.state.user.token);
                    this.$router.push('/')
                })
                .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>

.esspacement {
        padding-left: 20px;
        padding-right: 80px;
    }
    /* Style pour le conteneur du formulaire */
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #9dabeb;
        border-radius: 5px;
        background-color: #f2f2f2;
        box-shadow: 0 0 10px rgba(0, 0, 0, 1.1);
    }

    /* Style pour les labels */
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    /* Style pour les inputs */
    input {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 3px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        outline: none; 
    }

    input:focus {
        box-shadow: inset 0 0 5px #2C73D2, 0 0 5px #2C73D2;
    }

    /* Style pour le bouton */
    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    /* Style pour le bouton lorsqu'il est survolé */
    button[type="submit"]:hover {
        background-color: #0069d9;
    }

    /* Style pour le message d'erreur */
    .error-message {
        color: red;
        margin-top: 10px;
    }


</style>