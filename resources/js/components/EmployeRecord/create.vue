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
    


          <div class="input-wrapper" :class="{'has-error': passwordNoMatch}">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" v-model="form.confirmPassword" required>
            <div v-if="passwordNoMatch" class="help-block">Passwords do not match</div>
           </div>

   
      <button type="submit" :disabled="submitDisabled" class="submit-button">Submit</button>


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
        confirmPassword: ''
      },
      passwordNoMatch: true,
      submitDisabled: true
    }
  },
  methods: {
    checkPasswordMatch() {
      if (this.form.password !== this.form.confirmPassword) {
        this.passwordNoMatch = true;
        this.submitDisabled = true;
      } else {
        this.passwordNoMatch = false;
        this.submitDisabled = false;
      }
    } ,
    submitForm() {
  // Récupérer les valeurs des champs
  const name = this.form.name;
  const email = this.form.email;
  const password = this.form.password;

  // Envoyer la requête POST à l'API
  fetch('http://127.0.0.1:8000/api/employe-records', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ name, email, password })
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);

  })
  .catch(error => {
    console.log(error);
  });
}

  },
  watch: {
    form: {
      handler: 'checkPasswordMatch',
      deep: true
    }
  }
}







  </script>
  <style scoped>

.input-wrapper {
  position: relative;
  margin-bottom: 20px;
}

.input-wrapper input {
  display: block;
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border: 2px solid #ddd;
}

.input-wrapper .help-block {
  position: absolute;
  bottom: -18px;
  left: 0;
  font-size: 12px;
  color: red;
  padding: 2px 6px;
  border-radius: 4px;
  width: 100%;
 
}

.input-wrapper.error input {
  border-color: red;
}

.input-wrapper.error .help-block {
  display: block;
}


    button[type="submit"]:hover {
        background-color: #0069d9;
    }
    .submit-button {
      margin-top: 40px;
      color: #fff;
      border: none;
      padding: 8px 16px;
      cursor: pointer;
    }

    .submit-button[disabled] {
      background-color: red;
      cursor: not-allowed;
    }
    button[disabled]:hover {
        background-color: #d90041;
    }



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


    /* Style pour le message d'erreur */
    .error-message {
        color: red;
        margin-top: 10px;
    }

    .password-no-match {
  border: 1px solid red;
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





.container {
  display: flex;
  justify-content: center;
  align-items: center;
}

h1 {
  text-align: center;
}

  </style>