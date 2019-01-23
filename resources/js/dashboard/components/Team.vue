<template>
  <div>
    <h1>{{$route.params.team}}</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>Data ur.</th>
          <th>Gole</th>
          <th>Asysty</th>
          <th>Żółte kartki</th>
          <th>Czerwone kartki</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(player, index) in players" :key="index">
          <td>{{player.first_name}}</td>
          <td>{{player.surname}}</td>
          <td>{{player.date_of_birth}}</td>
          <td>{{player.goals}}</td>
          <td>{{player.assists}}</td>
          <td>{{player.yellow_cards}}</td>
          <td>{{player.red_cards}}</td>
        </tr>
      </tbody>
    </table>
    <button>Dodaj zawodnika</button>
    <add-player/>
  </div>
</template>

<script>
import AddPlayer from "./AddPlayer";
export default {
  name: "team",
  data() {
    return {
      team: this.$route.params.team,
      players: {}
    };
  },
  watch: {
    $route(to, from) {
      this.team = to.params.team;
      this.fetchPlayers();
    }
  },
  created() {
    this.fetchPlayers();
  },
  methods: {
    fetchPlayers() {
      axios
        .get(`/api/team/`, { params: { team: this.team } })
        .then(response => {
          this.players = response.data;
        })
        .catch(error => console.log(error));
    }
  },
  components: {
    AddPlayer
  }
};
</script>

<style lang="scss">
</style>
