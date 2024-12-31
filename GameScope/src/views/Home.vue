// Home.vue
<template>
  <div class="home">
    <header>
      <h1>Welcome to Game Library</h1>
      <p>Select where you want to go:</p>
    </header>
    <nav>
      <ul>
        <li><router-link to="/game">Game</router-link></li>
        <li><router-link to="/about">About</router-link></li>
      </ul>
    </nav>
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
  padding: 0;
  box-sizing: border-box;
  background-color: #f0f0f0;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

header {
  background-color: #20232a;
  color: #61dafb;
  padding: 20px;
  width: 100%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

nav ul {
  list-style-type: none;
  padding: 0;
  margin: 10px 0;
  display: flex;
  justify-content: center;
  gap: 15px;
}

nav a {
  text-decoration: none;
  color: #61dafb;
  font-weight: bold;
}

nav a:hover {
  color: #ffffff;
}

.side-section {
  display: flex;
  justify-content: space-around;
  margin-top: 20px;
  width: 80%;
}

.latest-news, .upcoming-games {
  border: 1px solid #61dafb;
  padding: 20px;
  width: 45%;
  box-sizing: border-box;
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.latest-news h2, .upcoming-games h2 {
  margin-top: 0;
  color: #20232a;
}
</style>
