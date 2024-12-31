import { createRouter, createWebHistory } from 'vue-router';

// Importer les composants des pages
import Home from '@/views/Home.vue';
import About from '@/views/About.vue';
import Game from '@/views/Game.vue';
import Detail from '@/views/Detail.vue';
import App from '@/App.vue';

const routes = [
  {
    path: '/home',
    name: 'Home',
    component: Home,
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  {
    path: '/game',
    name: 'Game',
    component: Game,
  },
  { path: '/game/:id', 
    name: 'Detail', 
    component: Detail },
  {
    path: '/',
    name: 'App',
    component: App,
  },
];

const router = createRouter({
  history: createWebHistory(), // Utilise le mode historique du navigateur
  routes,
});

export default router;
