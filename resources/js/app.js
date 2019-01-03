import App from "./App.vue";
import MenuList from "./components/menu/MenuList.vue";
import Hamburger from "./components/menu/Hamburger.vue";
import store from "./store/store";
window.Vue = require("vue");

const app = new Vue({
    el: "#app",
    store,
    render: h => h(App)
    // components: { Hamburger, MenuList }
});
