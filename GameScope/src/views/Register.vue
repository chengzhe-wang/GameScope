<template>
    <div class="container">
      <h1>Inscription</h1>

      <form @submit.prevent="handleRegister">

        <div class="form-group">
          <label for="username">Pseudo</label>
          <input
            type="username"
            id="username"
            v-model="username"
            placeholder="Entrez votre pseudo"
            required
          />
        </div>

        <div class="form-group">
          <label for="email">Adresse e-mail</label>
          <input
            type="email"
            id="email"
            v-model="email"
            placeholder="Entrez votre e-mail"
            required
          />
        </div>

        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input
            type="password"
            id="password"
            v-model="password"
            placeholder="Entrez votre mot de passe"
            required
          />
        </div>

        <button type="submit">Soumettre</button>

        <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
      </form>

      <div class="back-to-home">
        <router-link to="/">Retour à l'accueil</router-link>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: 'RegisterVue',
  data() {
    return {
      username: '',
      email: '',
      password: '',
      roles: 'ROLE_USER',
      errorMessage: '',
    };
  },
  methods: {
    async handleRegister() {
      try {

        const response = await fetch('http://127.0.0.1:8000/api/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            username: this.username,
            email: this.email,
            password: this.password,
            roles: [this.roles],
          }),
        });

        if (!response.ok) {
            const errorData = await response.json();
            this.errorMessage = errorData.error || 'Une erreur est survenue.';
            return; // Stop execution after setting the error message
        }

        const data = await response.json();
        console.log('Utilisateur enregistré :', data);


        this.$router.push('/game');
      } catch (error) {

        this.errorMessage = error.message || 'Erreur lors de l’envoi des données.';
        console.error(error);
      }
    },
  },
};

  </script>

<style scoped>
/* Style global pour centrer la page */
.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: #ffffff;
  font-family: Arial, sans-serif;
}

/* Titre principal */
h1 {
  text-align: center;
  color: #333333;
  margin-bottom: 20px;
  font-size: 24px;
}

/* Formulaire */
form {
  display: flex;
  flex-direction: column;
}

/* Champs de formulaire */
.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #555555;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  transition: border-color 0.2s ease-in-out;
}

input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Bouton */
button {
  background-color: #007bff;
  color: #ffffff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 10px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

/* Message d'erreur */
.error-message {
  color: #ff0000;
  font-size: 14px;
  margin-top: 10px;
  text-align: center;
}

/* Lien de retour */
.back-to-home {
  margin-top: 20px;
  text-align: center;
}

.back-to-home a {
  color: #007bff;
  text-decoration: none;
  transition: color 0.2s ease-in-out;
}

.back-to-home a:hover {
  color: #0056b3;
}
</style>
