<template>
    <div>
        <Navbar />
        <div class="container">
      <h1>Liste des utilisateurs</h1>  </div>
      <table class="user-table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="user in users" :key="user.id">
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td>
        <div class="button-group">
          <button>show</button>
          <button>edit</button>
          <button>delete</button>
        </div>
      </td>
    </tr>
  </tbody>
</table>

    </div>
  </template>
  
  <script>

import Navbar from '../Navbar.vue';

    



  export default {
    name: "Index",
    components: {
    Navbar,
  },
  data() {
    return {
      users: []
    };
  },
  created() {
    fetch('http://127.0.0.1:8000/api/employe-records')
      .then(response => response.json())
      .then(data => this.users = data)
      .catch(error => console.error(error));
  }
}

  </script>
  <style scoped>


button {
  background-color: #4CAF50; /* Couleur de fond */
  color: white; /* Couleur de texte */
  border: none; /* Pas de bordure */
  padding: 8px 16px; /* Espacement intérieur */
  text-align: center; /* Centrer le texte */
  text-decoration: none; /* Pas de soulignement */
  display: inline-block; /* Affichage en ligne */
  font-size: 14px; /* Taille de police */
  margin: 4px 2px; /* Marge autour du bouton */
  cursor: pointer; /* Curseur pointer */
  border-radius: 3px; /* Arrondi du bord */
  transition-duration: 0.4s; /* Durée de transition */
}

button:hover {
  background-color: #3e8e41; /* Couleur de fond hover */
  color: white; /* Couleur de texte hover */
}

    .button-group {
  display: flex;
  justify-content: center;
}

.button-group button {
  margin: 0 5px;
}

  .user-table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

.user-table th, .user-table td {
  text-align: left;
  padding: 12px;
  border: 1px solid #ddd;
}

.user-table th {
  background-color: #f2f2f2;
  color: #333;
  font-size: 18px;
}

.user-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.user-table tr:hover {
  background-color: #f5f5f5;
}

.user-table td:first-child {
  font-weight: bold;
  text-transform: uppercase;
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