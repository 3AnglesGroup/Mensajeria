/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vue from "vue";
import Router from "vue-router";
Vue.use(Router);

let router = new Router({
    routes: [
        {
            path: "/",
            name: "/",
            component: require("./dashboard/Index").default
        },
        {
            path: "/paquete-index",
            name: "/paquete-index",
            component: require("./paquete/Index").default
        },
        {
            path: "/paquete-crear",
            name: "/paquete-crear",
            component: require("./paquete/Crear").default
        },
        {
            path: "/paquete-detalle/:id",
            name: "/paquete-detalle",
            component: require("./paquete/Detalle").default
        },
        {
            path: "/cliente-crear",
            name: "/cliente-crear",
            component: require("./cliente/Crear").default
        },
        {
            path: "/cliente-lista",
            name: "/cliente-lista",
            component: require("./cliente/Lista").default
        },
        {
            path: "/producto-crear",
            name: "/prodcuto-crear",
            component: require("./producto/Crear").default
        },
        {
            path: "/producto-lista",
            name: "/producto-lista",
            component: require("./producto/Lista").default
        }
    ]
    // mode:'history'
});

Vue.component("dashboard", require("./dashboard/Index.vue").default);

Vue.component("paquete-index", require("./paquete/Index.vue").default);
Vue.component("paquete-crear", require("./paquete/Crear.vue").default);
Vue.component("paquete-detalle", require("./paquete/Detalle.vue").default);
//Cliente
Vue.component("cliente-crear", require("./cliente/Crear.vue").default);
Vue.component("cliente-lista", require("./cliente/Lista.vue").default);
//Producto
Vue.component("producto-crear", require("./producto/Crear.vue").default);
Vue.component("producto-lista", require("./producto/Lista.vue").default);

const app = new Vue({
    el: "#app",
    router
});
