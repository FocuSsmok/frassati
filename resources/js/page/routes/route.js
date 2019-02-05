import ClubInfo from "../components/pages/club/ClubInfo.vue";
import ClubAdministartion from "../components/pages/club/ClubAdministration.vue";
import TeamPage from "../components/pages/teams/TeamPage.vue";
import MainPage from "../components/pages/main/MainPage.vue";
import SinglePost from "../components/pages/posts/SinglePost.vue";
import PageNotFound from "../components/pages/error/PageNotFound.vue";

export const routes = [
    { path: "/:page(\\d+)?", name: "home", component: MainPage },
    { path: "/post/:id(\\d+)", component: SinglePost },
    { path: "/club_information", component: ClubInfo },
    { path: "/club_administration", component: ClubAdministartion },
    { path: "/team/:team", component: TeamPage },
    { path: "/error/404", component: PageNotFound },
    { path: "*", component: PageNotFound }
];
