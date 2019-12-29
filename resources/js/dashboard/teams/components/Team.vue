<template>
  <div>
    <h2 class="subtitle">{{$route.params.team}}</h2>
    <!-- <table class="table">
      <edit-player :player="players[0]" v-if="players.length > 0"/>
    </table>-->
    <div class="team__table-wrapper">
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
            <th>Edytuj</th>
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
            <td @click="openModal(player)">
              <span class="player__control">
                <i class="fas fa-user-edit"></i>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <modal-edit-player
      @closeModal="closeModal"
      :player="activePlayer"
      :isActive="modalIsActive"
      :team="team"
    />
    <add-player :team="team"/>
  </div>
</template>

<script>
import AddPlayer from "./AddPlayer";
// import EditPlayer from "./EditPlayer";
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
    ModalEditPlayer
  }
};
</script>

<style lang="scss">
.subtitle::first-letter {
  text-transform: uppercase;
}

.team__table-wrapper {
  overflow-x: scroll;
  @media (min-width: 992px) {
    overflow: auto;
  }
}

.player__control {
  cursor: pointer;
}
</style>
