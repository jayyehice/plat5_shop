import Vue from 'vue';
import vuetify from './vuetify';
import layout from './components/Layout.vue';


Vue.config.productionTip = false;


new Vue({
  el: '#app',
  vuetify,
  components: { layout }
});