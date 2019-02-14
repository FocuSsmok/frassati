<template>
  <div>
    <h2 class="subtitle">{{this.team}}</h2>
    <div class="game">
      <div class="options">
        <button
          v-for="(modal, index) in modals"
          @click="openModal(modal.component)"
          :key="index"
          class="button"
        >{{modal.name}}</button>
      </div>
    </div>
    <table-league :team="team" :isSmall="false"/>
    <div class="fixtures__wrapper">
      <div class="fixtures" v-for="(fixture,index) in fixtures" :key="index">
        <h3>
          Kolejka {{++index}}
          <span
            :key="index"
            @click="openModal('edit-fixture', {fixture, teams})"
          >edit</span>
        </h3>
        <!-- {{fixture}} -->
        <ul>
          <li v-for="match in fixture" :key="match.id">
            <span
              :class="teamName(match.team_home_id) === ownTeam ? 'bold' : ''"
            >{{teamName(match.team_home_id)}}</span>
            <span>{{match.home_goals}} :</span>
            <span>{{match.away_goals}}</span>
            <span
              :class="teamName(match.team_away_id) === ownTeam ? 'bold' : ''"
            >{{teamName(match.team_away_id)}}</span>
          </li>
        </ul>
      </div>
    </div>
    <modal :openModal="modalIsOpen" @closeModal="modalIsOpen=false">
      <template slot="content">
        <component :is="currentModal" :data="currentProperties"></component>
      </template>
    </modal>
  </div>
</template>

<script>
import Modal from "./Modal";
import FormField from "./FormField";
import AddTeam from "./AddTeam";
import AddFixture from "./AddFixture";
import EditFixture from "./EditFixture";
import TableLeague from "../../../shared-components/TableLeague";
export default {
  name: "game",
  data() {
    return {
      team: this.$route.params.team,
      modalIsOpen: false,
      currentModal: "add-team",
      currentProperties: {},
      fixtures: [],
      teams: [],
      ownTeam: "PGKS Frassati Fajsławice",
      modals: [
        { component: "add-team", name: "Dodaj Drużynę" },
        { component: "edit-team", name: "Edytuj Drużynę" },
        { component: "add-fixture", name: "Dodaj Kolejkę" }
      ]
    };
  },
  watch: {
    $route(to, from) {
      console.log(to);
      this.team = to.params.team;
    }
  },
  methods: {
    openModal(component, props = {}) {
      this.currentModal = component;
      this.currentProperties = props;
      this.modalIsOpen = true;
    },
    fetchFixtures() {
      axios
        .get(`/api/game/allFixture/${this.team}`)
        .then(response => {
          const fixtures = response.data;
          for (let prop in fixtures) {
            if (fixtures.hasOwnProperty(prop)) {
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
  components: {
    Modal,
    FormField,
    AddTeam,
    AddFixture,
    EditFixture,
    TableLeague
  }
};
</script>

<style lang="scss">
.bold {
  font-weight: bold;
}
.subtitle::first-letter {
  text-transform: uppercase;
}
.options {
  margin-bottom: 20px;
}
</style>
