import ClubInfo from "../components/pages/club/ClubInfo.vue";
import ClubAdministartion from "../components/pages/club/ClubAdministration.vue";
import TeamPage from "../components/pages/teams/TeamPage.vue";
import MainPage from "../components/pages/main/MainPage.vue";

export const routes = [
    { path: "/:page?", component: MainPage },
    { path: "/club_information", component: ClubInfo },
    { path: "/club_administartion", component: ClubAdministartion },
    { path: "/team/:team", component: TeamPage }
];
