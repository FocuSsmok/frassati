export default {
    state: {
        isActive: false,
        menuLevels: [
            { name: "Aktualności", isHidden: true, submenu: null, url: "/" },
            {
                name: "Klub",
                isHidden: true,
                submenu: [
                    {
                        name: "Władze",
                        isHidden: true,
                        submenu: null,
                        url: "/club_administration"
                    },
                    {
                        name: "Stadion",
                        isHidden: true,
                        submenu: null,
                        url: "/club_stadium"
                    },
                    {
                        name: "Statut",
                        isHidden: true,
                        submenu: null,
                        url: "/club_statute"
                    },
                    {
                        name: "O Klubie",
                        isHidden: true,
                        submenu: null,
                        url: "/club_information"
                    }
                ]
            },
            {
                name: "Drużyny",
                isHidden: true,
                submenu: [
                    { name: "Seniorzy", url: "/team/seniorzy", isHidden: true, submenu: null },
                    { name: "Juniorzy", url: "/team/juniorzy", isHidden: true, submenu: null },
                    { name: "Trampkarze", url: "/team/trampkarze", isHidden: true, submenu: null },
                    { name: "Młodzicy", url: "/team/młodzicy", isHidden: true, submenu: null }
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
                            { name: "Tabela", isHidden: true, submenu: null, url: "/table/seniorzy" },
                            { name: "Terminarz", isHidden: true, submenu: null, url: "/fixtures/seniorzy" }
                        ]
                    },
                    {
                        name: "Juniorzy",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", url: "/table/juniorzy", isHidden: true, submenu: null },
                            { name: "Terminarz", url: "/fixtures/juniorzy", isHidden: true, submenu: null }
                        ]
                    },
                    {
                        name: "Trampkarze",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", url: "/table/trampkarze", isHidden: true, submenu: null },
                            { name: "Terminarz", url: "/fixtures/trampkarze", isHidden: true, submenu: null }
                        ]
                    },
                    {
                        name: "Młodzicy",
                        isHidden: true,
                        submenu: [
                            { name: "Tabela", url: "/table/młodzicy", isHidden: true, submenu: null },
                            { name: "Terminarz", url: "/fixtures/młodzicy", isHidden: true, submenu: null }
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
