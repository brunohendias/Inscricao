require('./bootstrap');

window.Vue = require('vue').default;

// Mascara para inputs
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)

Vue.component('App', require('./App.vue').default);

const app = new Vue({
    el: '#app',
});
