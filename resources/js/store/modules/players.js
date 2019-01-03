import Axios from "axios";

export default {
    state: {
        players: []
    },
    getters: {},
    actions: {
        fetchPlayers({ commit, state }) {
            let players;
            axios
                .get("api/players")
                .then(response => console.log(response))
                .catch(error => console.log(error));
            // console.log(players);
        }
    },
    mutations: {}
};
