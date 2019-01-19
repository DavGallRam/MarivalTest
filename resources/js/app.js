

require('./bootstrap');

window.Vue = require('vue');

Vue.component('usuarios-component', require('./components/usuariosComponent.vue').default);
Vue.component('registro-component', require('./components/RegistroComponent.vue').default);
Vue.component('mi-component', require('./components/MiComponent.vue').default);

const app = new Vue({
    el: '#app'
});

  
