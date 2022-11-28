import Vue from 'vue';
import vuetify from './vuetify';
import VueRouter from 'vue-router'
import layout from './components/Layout.vue';
import productsPage from './components/ProductsPage.vue';
import manageProducts from './components/ManageProducts.vue';

Vue.config.productionTip = false;

Vue.use(VueRouter);

const routes = [
  { path: '/', component: productsPage },
  { path: '/manageProducts', component: manageProducts }
  ];

const router = new VueRouter({
  mode:'history',
  routes,
});

new Vue({
  el: '#app',
  router,
  vuetify,
  components: { layout }
});