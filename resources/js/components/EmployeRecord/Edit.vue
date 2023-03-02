<template>
      <div>
          <Navbar />
          <div class="container">
        <h1></h1>  </div>

   
        <div class="create-form">
  <form @submit.prevent="submitForm">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" v-model="user.name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" v-model="user.email" required>
    </div>
    <button type="submit">Submit</button>
  </form>
  <div v-if="response !== null" class="response">
      <p>{{ response.message }}</p>
    </div>
</div>

  
      </div>
    </template>
    
    <script>
    import Navbar from '../Navbar.vue';
  
    export default {
      name: "EmployeRecordsEdit",
      components: {
        Navbar,
      },
      data() {
        return {
          user: {},
          response: null,
        }
      },
      async mounted() {
        const id = this.$route.params.id;
        console.log(id); // Vérifiez que l'ID est bien récupéré
        try {
          const response = await fetch(`http://127.0.0.1:8000/api/employe-records/${id}`);
          if (response.ok) {
            const data = await response.json();
            this.user = data;
          } else {
            this.user = null;
          }
        } catch (error) {
          console.log(error);
        }
      },
      methods: {
        submitForm() {
      const name = this.user.name;
      const email = this.user.email;
      const id = this.$route.params.id;
      fetch(`http://127.0.0.1:8000/api/employe-records/${id}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name, email }),
      })
        .then((response) => response.json())
        .then((data) => {
          this.response = data;
          console.log(this.response);
        })
        .catch((error) => {
          console.log(error);
        });
    },


      }
    }
  </script>
  
  
  

    <style scoped>

.response {
  background-color: #12ca4f;
  padding: 10px;
  border-radius: 5px;
  margin-top: 10px;
}

  .en-tete {
    background-color: #39AD74;
    border: 1px solid #ddd;
    color: #ffffff;
    text-align: center;
    font-family: 'Inconsolata', monospace;
    font-size: 18px;
    font-weight: bold;
    padding: 10px;
    margin-left: 20%;
    margin-right: 150px;
    margin-bottom: 20px;
    width: 60%;
  }
  
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