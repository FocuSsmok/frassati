import Vue from "vue";
import Vuex from "vuex";

// imports modules
import menu from "./modules/menu";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        menu
    },
    state: {},
    getters: {},
    actions: {},
    mutations: {}
});
