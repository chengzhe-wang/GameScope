<template>
  <div id="app">
    <nav>
      <router-link to="/home">Accueil</router-link>
      <router-link to="/about">À propos</router-link>
      <router-link to="/game">Jeux</router-link>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>
