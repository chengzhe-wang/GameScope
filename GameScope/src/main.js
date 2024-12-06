import { createApp } from 'vue'
import App from './App.vue'
import router from './router';

const app = createApp(App);

// Utiliser Vue Router
app.use(router);

app.mount('#app')
