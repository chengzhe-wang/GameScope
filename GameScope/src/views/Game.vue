<template>
    <div>
      <h1>Liste des Jeux</h1>
  
      <input 
        type="text" 
        v-model="searchQuery" 
        @input="fetchGames" 
        placeholder="Rechercher un jeu..." 
      />
  
      <div v-if="games.length > 0" class="game-grid">
        <div v-for="game in games" :key="game.id" class="game-item">
          <router-link :to="{ name: 'Detail', params: { id: game.id } }">
            <img :src="game.background_image" :alt="game.name" class="game-image" />
          </router-link>
          <p>{{ game.name }} ({{ game.released }})</p>
        </div>
      </div>
      <p v-else>Aucun jeu trouvé.</p>
  
      <div class="pagination">
        <button @click="previousPage" :disabled="page === 1">Page précédente</button>
        <span>Page {{ page }}</span>
        <button @click="nextPage">Page suivante</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        games: [], // Liste des jeux pour la page actuelle
        page: 1, // Page actuelle
        pageSize: 20, // Nombre de jeux par page
        searchQuery: '', // Requête de recherche
      };
    },
    created() {
      this.fetchGames();
    },
    methods: {
      async fetchGames() {
        try {
          const apiKey = '2c3307cf4c3e486883093047f82a2b23';
          const response = await axios.get('https://api.rawg.io/api/games', {
            params: {
              key: apiKey,
              page: this.page,
              page_size: this.pageSize,
              search: this.searchQuery,
            },
          });
          this.games = response.data.results;
        } catch (error) {
          console.error('Erreur lors de la récupération des jeux :', error);
          this.games = [];
        }
      },
      nextPage() {
        this.page++;
        this.fetchGames();
      },
      previousPage() {
        if (this.page > 1) {
          this.page--;
          this.fetchGames();
        }
      },
    },
  };
  </script>
  
  <style>
  /* Grille de jeux */
  .game-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
  }
  
  .game-item {
    text-align: center;
    width: 200px;
  }
  
  /* Image des jeux */
  .game-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .game-image:hover {
    transform: scale(1.05);
  }
  
  /* Barre de recherche */
  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  /* Pagination */
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  
  .pagination button {
    margin: 0 10px;
    padding: 5px 10px;
    font-size: 16px;
  }
  
  .pagination span {
    font-size: 18px;
    font-weight: bold;
  }
  </style>
  