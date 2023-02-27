<template>
    <div>
        <Navbar />
        <div class="container">
      <h1>Créer un Employer </h1>  </div>
      
 
  <div class="create-form">
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" v-model="form.name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" v-model="form.email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" v-model="form.password" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" v-model="form.confirmPassword" required>
      </div>
      <div class="form-group">
        <button type="submit">Send</button>
      </div>
    </form>
  </div>

    </div>
  </template>
  
  <script>

import Navbar from '../Navbar.vue';

    

export default {
    name: "EmployeRecordsCreate",
    components: {
    Navbar,
  } ,
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        confirmPassword: '',
      }
    }
  },
  methods: {
    submitForm() {
      // Handle form submission
    }
  }
}






  </script>
  <style scoped>



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


.create-form {
  max-width: 500px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 1rem;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}



.container {
  display: flex;
  justify-content: center;
  align-items: center;
}

h1 {
  text-align: center;
}

  </style>