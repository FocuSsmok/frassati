import Vue from "vue";
import Vuex from "vuex";

// imports modules
import menu from "./modules/menu";
import players from "./modules/players";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        menu,
        players
    },
    state: {},
    getters: {},
    actions: {},
    mutations: {}
});
