import App from "./App.vue";
import MenuList from "./components/menu/MenuList.vue";
import Hamburger from "./components/menu/Hamburger.vue";
import VueRouter from "vue-router";
import store from "./store/store";
import { routes } from "./routes/route";
window.Vue = require("vue");
Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: "#app",
    store,
    router,
    render: h => h(App)
    // components: { Hamburger, MenuList }
});
