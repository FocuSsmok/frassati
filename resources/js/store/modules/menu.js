export default {
    state: {
        isActive: false,
        menuLevels: [
            { name: "Aktualności", isHidden: true, submenu: null },
            {
                name: "Klub",
                isHidden: true,
                submenu: [
                    {
                        name: "Władze",
                        isHidden: true,
                        submenu: null
                    },
                    {
                        name: "Stadion",
                        isHidden: true,
                        submenu: null
                    },
                    {
                        name: "Statut",
                        isHidden: true,
                        submenu: null
                    },
                    {
                        name: "O Klubie",
                        isHidden: true,
                        submenu: null
                    }
                ]
            },
            {
                name: "Drużyny",
                isHidden: true,
                submenu: [
                    { name: "Seniorzy", isHidden: true, submenu: null },
                    { name: "Juniorzy", isHidden: true, submenu: null },
                    { name: "Trampkarze", isHidden: true, submenu: null },
                    { name: "Młodzicy", isHidden: true, submenu: null }
                ]
            },
            {
                name: "Rozgrywki",
                isHidden: true,
                submenu: [
                    {
                        name: "Seniorzy",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", isHidden: true, submenu: null },
                            { name: "Terminarz", isHidden: true, submenu: null }
                        ]
                    },
                    {
                        name: "Juniorzy",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", isHidden: true, submenu: null },
                            { name: "Terminarz", isHidden: true, submenu: null }
                        ]
                    },
                    {
                        name: "Trampkarze",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", isHidden: true, submenu: null },
                            { name: "Terminarz", isHidden: true, submenu: null }
                        ]
                    },
                    {
                        name: "Młodzicy",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", isHidden: true, submenu: null },
                            { name: "Terminarz", isHidden: true, submenu: null }
                        ]
                    }
                ]
            }
        ]
    },
    getters: {},
    actions: {
        toogleMenu({ commit, state }) {
            let isActive = false;
            state.isActive ? (isActive = false) : (isActive = true);
            commit("TOOGLE_MENU", isActive);
        }
    },
    mutations: {
        TOOGLE_MENU(state, payload) {
            state.isActive = payload;
        }
    }
};
