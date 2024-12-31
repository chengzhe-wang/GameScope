<template>
  <div class="detail" :style="{ backgroundImage: `url(${game ? game.background_image : ''})` }">
    <router-link to="/game" class="back-button">Retour à la liste des jeux</router-link>
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

/* Detail Page Styles */
.detail {
  text-align: center;
  padding: 20px;
  min-height: 100vh;
  background-size: contain;
  background-position: center;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  backdrop-filter: blur(20px);
  position: relative;
  background-color: #2b2b2b; /* Change background color to dark gray */
}

.detail-card {
  background-color: rgba(43, 43, 43, 0.8);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  margin-right: 20px;
}

.back-button {
  background-color: #f5c518;
  color: #1b1b1b;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
}

.back-button:hover {
  background-color: #e5b518;
}
</style>
