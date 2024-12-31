<template>
  <div class="auth-container">
    <h1>{{ isLogin ? 'Connexion' : 'Inscription' }}</h1>

    <!-- Formulaire de connexion -->
    <form v-if="isLogin" @submit.prevent="handleLogin">
      <div class="form-group">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" v-model="username" required />
      </div>
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" v-model="password" required />
      </div>
      <button type="submit">Se connecter</button>
    </form>

    <!-- Formulaire d'inscription -->
    <form v-if="!isLogin" @submit.prevent="handleRegister">
      <div class="form-group">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" v-model="username" required />
      </div>
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" v-model="password" required />
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirmer le mot de passe :</label>
        <input type="password" id="confirmPassword" v-model="confirmPassword" required />
      </div>
      <button type="submit">S'inscrire</button>
    </form>

    <div v-if="errorMessage" class="error">{{ errorMessage }}</div>

    <p>
      <span v-if="isLogin">Pas encore de compte ? <a href="#" @click="toggleForm">Inscrivez-vous</a></span>
      <span v-if="!isLogin">Vous avez déjà un compte ? <a href="#" @click="toggleForm">Connectez-vous</a></span>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLogin: true, // Par défaut, afficher le formulaire de connexion
      username: '',
      password: '',
      confirmPassword: '',
      errorMessage: '',
    };
  },
  methods: {
    toggleForm() {
      this.isLogin = !this.isLogin;
      this.errorMessage = ''; // Réinitialiser les erreurs lorsque l'on change de formulaire
    },
    async handleLogin() {
      try {
        const response = await fetch('http://localhost:8000/api/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            username: this.username,
            password: this.password,
          }),
        });

        const data = await response.json();

        if (response.ok) {
          // Connexion réussie, rediriger ou afficher un message
          this.$router.push('/dashboard');
        } else {
          this.errorMessage = data.message || 'Nom d\'utilisateur ou mot de passe incorrect.';
        }
      } catch (error) {
        this.errorMessage = 'Erreur de connexion, veuillez réessayer plus tard.';
      }
    },
    async handleRegister() {
      if (this.password !== this.confirmPassword) {
        this.errorMessage = 'Les mots de passe ne correspondent pas.';
        return;
      }

      try {
        const response = await fetch('http://localhost:8000/api/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            username: this.username,
            password: this.password,
          }),
        });

        const data = await response.json();

        if (response.ok) {
          // Inscription réussie, rediriger vers la page de connexion
          this.$router.push('/login');
        } else {
          this.errorMessage = data.message || 'Erreur lors de l\'inscription.';
        }
      } catch (error) {
        this.errorMessage = 'Erreur de connexion, veuillez réessayer plus tard.';
      }
    },
  },
};
</script>

<style scoped>
/* Style du formulaire */
.auth-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

button {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  background-color: #28a745;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #218838;
}

.error {
  color: red;
  margin-top: 10px;
  text-align: center;
}

p {
  text-align: center;
}

a {
  color: #007bff;
  cursor: pointer;
}

a:hover {
  text-decoration: underline;
}
</style>
