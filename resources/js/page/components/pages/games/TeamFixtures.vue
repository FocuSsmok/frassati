<template>
  <template-app :title="'Terminarz ' + team">
    <template slot="content">
      <div class="team-fixtures">
        <page-title :title="'Terminarz '+team"/>
        <div class="fixture" v-for="(fixture, index) in fixtures" :key="fixture[0].fixture_num">
          <h3 class="fixture__num">Kolejka {{fixture[0].fixture_num}}</h3>
          <ul>
            <li
              class="fixture__match"
              :class="(ownTeam == match.team_home_id || ownTeam == match.team_away_id) ? 'fixture__match--bolder' : ''"
              v-for="match in fixture"
              :key="match.id"
            >
              <span
                class="home_team fixture__column fixture__column--team"
              >{{teamName(match.team_home_id)}}</span>
              <span class="home_goals fixture__column">{{match.home_goals}}</span>
              <span>:</span>
              <span class="away_goals fixture__column">{{match.away_goals}}</span>
              <span
                class="away_team fixture__column fixture__column--team"
              >{{teamName(match.team_away_id)}}</span>
            </li>
          </ul>
        </div>
      </div>
    </template>
  </template-app>
</template>

<script>
import PageTitle from "../title/PageTitle";
import TemplateApp from "../TemplateApp";
export default {
  name: "team-fixtures",
  data() {
    return {
      team: this.$route.params.team,
      fixtures: [],
      teams: [],
      ownTeam: ""
    };
  },
  watch: {
    $route(to, from) {
      this.team = to.params.team;
    }
  },
  methods: {
    fetchFixtures() {
      axios
        .get(`/api/game/allFixture/${this.team}`)
        .then(response => {
          const fixtures = response.data;
          for (let prop in fixtures) {
            if (fixtures.hasOwnProperty(prop) && fixtures[prop].length > 0) {
              this.fixtures.push([...fixtures[prop]]);
            }
          }
        })
        .catch(error => console.log(error));
    },
    fetchTeams() {
      axios
        .get(`/api/game/getTeams/${this.team}`)
        .then(response => {
          console.log("helo");
          this.teams = response.data;
          let frassati = /(frassati|Frassati)|(fajsławice|Fajsławice)/;
          this.teams.filter(team => {
            if (frassati.test(team.name)) {
              this.ownTeam = team.id;
            }
          });
        })
        .catch(error => console.log(error));
    },
    teamName(id) {
      let name = "";
      this.teams.filter(team => {
        if (id === team.id) name = team.name;
      });
      return name;
    }
  },
  created() {
    this.fetchFixtures();
    this.fetchTeams();
  },
  components: { TemplateApp, PageTitle }
};
</script>