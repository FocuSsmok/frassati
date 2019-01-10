import App from "./App.vue";
import MenuList from "./components/menu/MenuList.vue";
import Hamburger from "./components/menu/Hamburger.vue";
import VueRouter from "vue-router";
import store from "./store/store";
import { routes } from "./routes/route";
import axios from "axios";
window.Vue = require("vue");
window.axios = axios;
window.axios.defaults.headers.common = {
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
};

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: "#app",
    store,
    router,
    render: h => h(App)
    // components: { Hamburger, MenuList }
});
