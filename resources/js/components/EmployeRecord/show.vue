<template>
  <navbar />
  <div class="container">
 
  <div>
    <h1>Details de l'employé</h1>
    <div v-if="user" class="card">
      <h2 class="card-header">L'employer </h2>
      <div class="card-body">
      <p><strong>Nom:</strong> {{ user.name }}</p>
      <p><strong>Email:</strong> {{ user.email }}</p>
    </div>
    </div>
    <div v-else  class="error-message">
      <p>Cet utilisateur n'existe pas</p>
    </div>
  </div>

  </div>
</template>

<script>
import Navbar from '../Navbar.vue';

export default {
  name: "EmployeRecordsShow",
    components: {
    Navbar,
  },
  data() {
    return {
      user: null,
    };
  },
  async mounted() {
    const id = this.$route.params.id;
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
};
</script>
<style scoped>
.container {
  max-width: 800px;
  margin: 0 auto;
}

.error-message {
  color: red;
  font-size: 24px;
  text-align: center;
  margin-top: 50px;
}

.card {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  margin-top: 50px;
}

.card-header {
  background-color: #007bff;
  color: #fff;
  padding: 20px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.card-body {
  padding: 20px;
  font-size: 18px;
}

.card-body p {
  margin-bottom: 10px;
}

.btn {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #0062cc;
}
</style>
