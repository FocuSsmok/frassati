<template>
  <div>
    <h1>{{$route.params.team}}</h1>
    <table class="table">
      <edit-player :player="players[0]" v-if="players.length > 0"/>
    </table>
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
          <td @click="openModal(player)">edit</td>
        </tr>
      </tbody>
    </table>
    <modal-edit-player
      @closeModal="closeModal"
      :player="activePlayer"
      :isActive="modalIsActive"
      :team="team"
    />
    <button>Dodaj zawodnika</button>
    <add-player :team="team"/>
  </div>
</template>

<script>
import AddPlayer from "./AddPlayer";
import EditPlayer from "./EditPlayer";
import ModalEditPlayer from "./ModalEditPlayer";

export default {
  name: "team",
  data() {
    return {
      team: this.$route.params.team,
      modalIsActive: false,
      activePlayer: {},
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
          console.log("emitted");
        })
        .catch(error => console.log(error));
    },
    openModal(player) {
      console.log("heelo");
      this.activePlayer = player;
      this.modalIsActive = true;
    },
    closeModal() {
      this.modalIsActive = false;
    }
  },
  components: {
    AddPlayer,
    EditPlayer,
    ModalEditPlayer
  }
};
</script>

<style lang="scss">
</style>
