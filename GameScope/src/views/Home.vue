<template>
  <div class="home">
    <div class="auth-buttons">
      <button>S'inscrire</button>
      <button>Se connecter</button>
    </div>
    <h1>Welcome to Game Library</h1>
    <p>Select where you want to go:</p>
    <div class="navigation-buttons">
      <router-link to="/game"><button>Accéder à la liste des jeux </button></router-link>
      <router-link to="/about"><button>A propos</button></router-link>
    </div>
    <div class="side-section">
      <section class="latest-news">
        <h2>Latest News</h2>
        <!-- Content will be added here -->
      </section>
      <section class="upcoming-games">
        <h2>Upcoming Games</h2>
        <!-- Content will be added here -->
      </section>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style scoped>
.home {
  font-family: Arial, sans-serif;
  text-align: center;
  margin: 0;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f0f0f0;
  min-height: 100vh;
  position: relative;
}

.auth-buttons {
  position: absolute;
  top: 20px;
  right: 20px;
}

.auth-buttons button {
  margin: 0 5px;
  padding: 10px 20px;
  font-size: 14px;
  cursor: pointer;
}

h1 {
  color: #20232a;
}

p {
  color: #333;
}

.navigation-buttons {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.navigation-buttons button {
  margin: 0 10px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.side-section {
  display: flex;
  justify-content: center; /* Center the sections */
  margin-top: 20px;
  width: 100%; /* Ensure it takes the full width */
}

.latest-news, .upcoming-games {
  border: 1px solid #61dafb;
  padding: 20px;
  width: 45%;
  max-width: 400px; /* Set a maximum width */
  box-sizing: border-box;
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  margin: 0 10px; /* Add margin between the sections */
}

.latest-news h2, .upcoming-games h2 {
  margin-top: 0;
  color: #20232a;
}

button {
  margin: 10px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
</style>
