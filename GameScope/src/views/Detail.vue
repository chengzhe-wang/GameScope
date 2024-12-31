<template>
  <div class="detail" :style="{ backgroundImage: `url(${game ? game.background_image : ''})` }">
    <router-link to="/" class="back-button">Retour à la liste des jeux</router-link>
    <div class="detail-card">
      <h1>Détails du Jeu</h1>
      <div v-if="game">
        <h2>{{ game.name }}</h2>
        <p><strong>Date de sortie :</strong> {{ game.released }}</p>
        <p><strong>Description :</strong> {{ game.description_raw }}</p>
      </div>
      <p v-else>Chargement...</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      game: null, // Détails du jeu
    };
  },
  created() {
    this.fetchGameDetails();
  },
  methods: {
    async fetchGameDetails() {
      try {
        const apiKey = '2c3307cf4c3e486883093047f82a2b23';
        const gameId = this.$route.params.id; // Récupérer l'ID depuis l'URL
        const response = await axios.get(`https://api.rawg.io/api/games/${gameId}`, {
          params: { key: apiKey },
        });
        this.game = response.data;
      } catch (error) {
        console.error('Erreur lors de la récupération des détails du jeu :', error);
      }
    },
  },
};
</script>

<style scoped>
.detail {
  font-family: Arial, sans-serif;
  text-align: center;
  margin: 0;
  padding: 20px;
  box-sizing: border-box;
  background-size: contain; /* Change from cover to contain to reduce image size */
  background-position: center;
  min-height: 100vh;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  backdrop-filter: blur(20px);
  position: relative;
}

.detail-card {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  margin-right: 20px;
}

h1, h2 {
  color: #20232a;
}

p {
  color: #333;
}

.back-button {
  position: absolute;
  top: 20px;
  right: 20px;
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
}

.back-button:hover {
  background-color: #0056b3;
}
</style>
