<template>
  <div class="edit-fixture">
    <h2>Edytuj kolejkę</h2>
    <ul>
      <li v-for="match in fixture" :key="match.id">
        <select class="input" v-model="match.team_home_id">
          <option v-for="team in teams" :key="team.id" :value="team.id">{{team.name}}</option>
        </select>
        <input class="goals" type="number" v-model="match.home_goals">
        :
        <input class="goals" type="number" v-model="match.away_goals">
        <select v-model="match.team_away_id">
          <option v-for="team in teams" :key="team.id" :value="team.id">{{team.name}}</option>
        </select>
      </li>
    </ul>
    <button class="button is-primary" @click="updateFixtures">Zapisz</button>
  </div>
</template>

<script>
export default {
  name: "edit-fixture",
  props: ["data"],
  data() {
    return {
      fixture: [],
      teams: []
    };
  },
  methods: {
    updateFixtures() {
      axios
        .post(`/api/game/updateFixture/${this.$route.params.team}`, {
          fixture: this.fixture
        })
        .then(response => console.log(response.data))
        .catch(error => console.log(error));
    }
  },
  watch: {
    data(newProps, oldProps) {
      this.fixture = JSON.parse(JSON.stringify(newProps.fixture));
      this.teams = JSON.parse(JSON.stringify(newProps.teams));
    }
  },
  created() {
    this.fixture = JSON.parse(JSON.stringify(this.data.fixture));
    this.teams = JSON.parse(JSON.stringify(this.data.teams));
  }
};
</script>

<style lang="scss">
.goals {
  max-width: 50px;
}
</style>
