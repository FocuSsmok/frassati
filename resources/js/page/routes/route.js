import ClubInfo from "../components/pages/club/ClubInfo.vue";
// import ClubAdministration from "../components/pages/club/ClubAdministration.vue";
import TeamPage from "../components/pages/teams/TeamPage.vue";
import MainPage from "../components/pages/main/MainPage.vue";
import SinglePost from "../components/pages/posts/SinglePost.vue";
import PageNotFound from "../components/pages/error/PageNotFound.vue";
import TeamTable from "../components/pages/games/TeamTable.vue";
import TeamFixtures from "../components/pages/games/TeamFixtures.vue";

export const routes = [{
        path: "/:page(\\d+)?",
        name: "home",
        component: MainPage
    },
    {
        path: "/post/:id(\\d+)",
        component: SinglePost
    },
    {
        path: "/club_information",
        component: ClubInfo
    },
    // { path: "/club_administration", component: ClubAdministration },
    {
        path: "/team/:team",
        component: TeamPage
    },
    {
        path: "/table/:team",
        component: TeamTable
    },
    {
        path: "/fixtures/:team",
        component: TeamFixtures
    },
    {
        path: "/error/404",
        component: PageNotFound
    },
    {
        path: "*",
        component: PageNotFound
    }
];
