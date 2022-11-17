import Vue from 'vue';
import vuetify from './vuetify';
import VueRouter from 'vue-router';
import layout from './components/Layout.vue';
import productsPage from './components/ProductsPage.vue';
import login from './components/Login.vue';
import register from './components/Register.vue';
import personalManage from './components/PersonalManage.vue';

Vue.config.productionTip = false;
Vue.use(VueRouter);

const routes = [
    { path: '/', component: productsPage, meta: { keepAlive: true } },
    { path: '/products', component: productsPage, meta: { keepAlive: true } },
    { path: '/login', component: login, meta: { keepAlive: true } },
    { path: '/register', component: register, meta: { keepAlive: true } },
    { path: '/personalManage', component: personalManage, meta: { keepAlive: true } },
];

const router = new VueRouter({
    routes,
});

new Vue({
    el: '#app',
    vuetify,
    router,
    components: { layout }
});