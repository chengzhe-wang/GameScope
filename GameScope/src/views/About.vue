<template>
  <div class="about">
    <h1>À propos</h1>
    <p>Ceci est la page à propos.</p>
    <button @click="goHome">Revenir à l'accueil</button>
    <button @click="goToGames">Accéder à la liste des jeux</button>
  </div>
</template>

<script>
export default {
  name: 'About',
  methods: {
    goHome() {
      this.$router.push('/home');
    },
    goToGames() {
      this.$router.push('/game');
    }
  }
};
</script>

<style scoped>
/* General Styles */
body {
  font-family: 'Roboto', sans-serif;
  background-color: #1b1b1b;
  color: #ffffff;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

h1, h2 {
  color: #f5c518;
  margin: 0;
}

p {
  color: #cccccc;
  margin: 0;
}

button {
  background-color: #f5c518;
  color: #1b1b1b;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #e5b518;
}

.auth-buttons, .liked-games-button, .back-button {
  position: absolute;
  top: 40px; /* Move down */
  right: 20px;
}

.auth-buttons button, .liked-games-button button, .back-button {
  margin: 0 5px;
  padding: 10px 20px;
  font-size: 14px;
  cursor: pointer;
}

/* About Page Styles */
.about {
  text-align: center;
  padding: 20px;
  min-height: 100vh;
  background-color: #2b2b2b; /* Change background color to dark gray */
}

button {
  margin: 10px;
}
</style>
