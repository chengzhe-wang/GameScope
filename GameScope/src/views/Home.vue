<template>
  <div class="home">
    <div class="auth-buttons">
      <router-link to="/register"><button>S'inscrire</button></router-link>
      <router-link to="/login"><button>Se connecter</button></router-link>
    </div>
    <div class="welcome-section">
      <h1 class="title">Welcome to Game Library</h1>
      <div class="navigation-buttons">
        <router-link to="/game"><button>Accéder à la liste des jeux </button></router-link>
        <router-link to="/about"><button>A propos</button></router-link>
      </div>
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

/* Home Page Styles */
.home {
  text-align: center;
  padding: 20px;
  min-height: 100vh;
  position: relative;
  background-color: #2b2b2b; /* Change background color to dark gray */
}

.welcome-section {
  border: 2px solid #000000; /* Add black border */
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
}

.title {
  font-family: 'Pacifico', cursive; /* Use a more attractive font */
  font-size: 3em;
  color: #f5c518;
  margin-bottom: 20px;
}

.navigation-buttons {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.navigation-buttons button {
  margin: 0 10px;
}

.side-section {
  display: flex;
  justify-content: center;
  margin-top: 20px;
  width: 100%;
}

.latest-news, .upcoming-games {
  border: 1px solid #f5c518;
  padding: 20px;
  width: 45%;
  max-width: 400px;
  background-color: #2b2b2b;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  margin: 0 10px;
}
</style>

<!-- Add the link to the Google Fonts API -->
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
