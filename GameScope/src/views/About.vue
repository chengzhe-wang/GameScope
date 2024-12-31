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
.about {
  font-family: Arial, sans-serif;
  text-align: center;
  margin: 0;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f0f0f0;
  min-height: 100vh;
}

h1 {
  color: #20232a;
}

p {
  color: #333;
}

button {
  margin: 10px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
</style>
