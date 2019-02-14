<template>
  <div class="fixture">
    <form-field
      type="number"
      name="fixture_num"
      label="Nr. Kolejki"
      :value="fixtureNum"
      @input="fixtureNum = $event"
    />
    <div class="fixtures">
      <div v-for="n in numbersOfFixtures" :key="n" class="fixtures__match match">
        <div class="select match__item">
          <select
            v-model="matches[n-1].home.team"
            @change="pickTeam($event.target.value, n - 1,'home')"
          >
            <option v-for="(team, index) in remainTeams" :key="index" :value="team.id">{{team.name}}</option>
          </select>
        </div>
        <input
          class="input goals match__item"
          type="number"
          name="home_goals"
          v-model="matches[n-1].home.goals"
        >
        <span :style="{marginRight:'5px'}">:</span>
        <input
          class="input goals match__item"
          type="number"
          name="away_goals"
          v-model="matches[n-1].away.goals"
        >
        <div class="select match__item">
          <select
            v-model="matches[n-1].away.team"
            @change="pickTeam($event.target.value, n - 1,'away')"
          >
            <option>Wybierz</option>
            <option v-for="(team, index) in remainTeams" :key="index" :value="team.id">{{team.name}}</option>
          </select>
        </div>
        <input class="input match__item" type="date" name="match_date" v-model="matches[n-1].date">
        <vue-timepicker class="match__item" v-model="matches[n-1].time" format="HH:mm"></vue-timepicker>
      </div>
    </div>
    <button @click="addFixture" class="button is-primary">Dodaj Kolejkę</button>
  </div>
</template>

<script>
import FormField from "./FormField";
import VueTimepicker from "vue2-timepicker";

export default {
  name: "add-fixture",
  data() {
    return {
      fixtureNum: "",
      teams: [],
      numbersOfFixtures: "",
      matches: [],
      loading: false
    };
  },
  methods: {
    pickTeam(teamId, index, place) {
      let matches = [...this.matches];
      matches[index][place]["team"] = teamId;
      this.matches = matches;
    },
    addFixture() {
      axios
        .post(`/api/game/addFixture/${this.$route.params.team}`, {
          matches: [...this.matches],
          num: this.fixtureNum
        })
        .then(response => console.log(response.data))
        .catch(error => console.log(error));
    },
    fetchTeams() {
      axios
        .get(`/api/game/getTeams/${this.$route.params.team}`)
        .then(response => {
          console.log("helo");
          this.teams = response.data;
          this.teams.map(team => {
            if (team["chosen"] === undefined) {
              team["chosen"] = false;
            }
          });
          this.numbersOfFixtures = Math.floor(this.teams.length / 2);
          for (let i = 0; i < this.numbersOfFixtures; i++) {
            this.matches[i] = {
              home: { team: "", goals: "" },
              away: { team: "", goals: "" },
              date: "",
              time: { HH: "15", mm: "00" }
            };
          }
          this.loading = true;
        })
        .catch(error => console.log(error));
    }
  },
  computed: {
    remainTeams() {
      let teams = this.teams.filter(team => {
        return team;
      });
      console.log(teams);
      return teams;
    }
  },
  mounted() {
    console.log("hello");
    this.fetchTeams();
  },
  components: { FormField, VueTimepicker }
};
</script>

<style lang="scss">
.goals {
  width: 60px;
  &:last-child {
    margin-left: 5px;
  }
}
.match {
  display: flex;
  flex-flow: row nowrap;
  margin-bottom: 10px;
  // overflow: scroll;
  &__item {
    flex-basis: 20%;
    margin-bottom: 5px;
    margin-right: 5px;
  }
}
input[type="date"] {
  min-width: 150px;
}
</style>
