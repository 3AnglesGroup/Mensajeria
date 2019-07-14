/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

let router = new Router({
    routes: [
       {
            path:'/',
            name:'/',
            component: require('./dashboard/Index').default
        },
       {
            path:'/paquete-index',
            name:'/paquete-index',
            component: require('./paquete/Index').default
        },
       {
            path:'/paquete-crear',
            name:'/paquete-crear',
            component: require('./paquete/Crear').default
        },
       {
           path:'/paquete-detalle/:id',
            name:'/paquete-detalle',
            component: require('./paquete/Detalle').default
        }
    ],
    // mode:'history'
});

Vue.component('dashboard', require('./dashboard/Index.vue').default);

Vue.component('paquete-index', require('./paquete/Index.vue').default);
Vue.component('paquete-crear', require('./paquete/Crear.vue').default);
Vue.component('paquete-detalle', require('./paquete/Detalle.vue').default);




const app = new Vue({
    el: '#app',
    router,
});
