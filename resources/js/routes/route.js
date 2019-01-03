import ClubInfo from "../components/pages/club/ClubInfo.vue";
import ClubAdministartion from "../components/pages/club/ClubAdministration.vue";

export const routes = [
    { path: "/" },
    { path: "/club_information", component: ClubInfo },
    { path: "/club_administartion", component: ClubAdministartion }
];
