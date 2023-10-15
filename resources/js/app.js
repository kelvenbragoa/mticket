
import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import Routes from './routes';
import Recharge from './components/Recharge.vue';



const app = createApp({});
const router = createRouter({
    routes:Routes,
    history:createWebHistory(),
});



app.component('Recharge',Recharge);
app.use(router);
app.mount('#app');