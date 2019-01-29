import App from "./App.vue";
import VueRouter from "vue-router";
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
    el: "#app-vue",
    router,
    components: {
        App
    }
    // render: h => h(App)
});

