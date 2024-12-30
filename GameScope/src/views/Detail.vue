<template>
    <div>
      <h1>Détails du Jeu</h1>
      <div v-if="game">
        <h2>{{ game.name }}</h2>
        <p><strong>Date de sortie :</strong> {{ game.released }}</p>
        <p><strong>Description :</strong> {{ game.description_raw }}</p>
        <img :src="game.background_image" alt="Image du jeu" />
      </div>
      <p v-else>Chargement...</p>
      <router-link to="/">Retour à la liste des jeux</router-link>
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
  
  <style>
  img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
  }
  </style>
  