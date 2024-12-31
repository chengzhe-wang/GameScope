<template>
    <div class="container">
      <h1>Connexion</h1>
  
      <form @submit.prevent="handleLogin">
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
  
        <button type="submit">Se connecter</button>
  
        <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
      </form>
  
      <div class="back-to-home">
        <router-link to="/">Retour à l'accueil</router-link>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: '',
        errorMessage: '',
      };
    },
    methods: {
      async handleLogin() {
        try {
          if (!this.email || !this.password) {
            this.errorMessage = 'Veuillez remplir tous les champs.';
            return;
          }
  
          const response = await fetch('http://127.0.0.1:8000/api/login', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              email: this.email,
              password: this.password,
            }),
          });
  
          if (response.ok) {
            const data = await response.json();
            if (data.message === 'Connexion réussie !') {
              this.errorMessage = '';
              this.$router.push('/game');
            } else {
              this.errorMessage = 'Une erreur inattendue est survenue.';
            }
          } else {
            const errorData = await response.json();
            this.errorMessage = errorData.error || 'Adresse e-mail ou mot de passe incorrect.';
          }

        } catch (error) {
          this.errorMessage = 'Une erreur inattendue est survenue.';
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
