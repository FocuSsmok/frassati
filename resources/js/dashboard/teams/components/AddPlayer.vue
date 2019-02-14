<template>
  <div class="player_form">
    <div class="form">
      <button
        :style="{marginBottom: '20px'}"
        class="button is-primary"
        @click.prevent="fetchAvailablePlayers"
      >Wybierz z istniejących</button>
      <div class="field" v-if="isFromAvailable">
        <div class="select">
          <select for="first_name" :value="selectedPlayer" @change="choosePlayer">
            <option
              v-for="(player, index) in availablePlayers"
              :key="player.id"
              :value="player.id"
            >{{player.first_name}} {{player.surname}}</option>
          </select>
        </div>
      </div>
      <div class="field" v-if="isFromAvailable">
        <label for="player_id">ID:</label>
        <div class="control">
          <input
            class="input"
            type="number"
            name="player_id"
            id="player_id"
            :disabled="isFromAvailable"
            :value="playerId"
          >
        </div>
      </div>
      <div class="field">
        <label class="label" for="first_name">Imię</label>
        <div class="control">
          <input
            class="input"
            type="text"
            name="first_name"
            id="first_name"
            v-model="playerName"
            :disabled="isFromAvailable"
          >
        </div>
      </div>
      <div class="field">
        <label class="label" for="surname">Nazwisko</label>
        <div class="control">
          <input
            class="input"
            type="text"
            name="surname"
            id="surname"
            v-model="playerSurname"
            :disabled="isFromAvailable"
          >
        </div>
      </div>
      <div class="field">
        <label class="label" for="date_of_birth">Data urodzenia</label>
        <div class="control">
          <input
            class="input"
            type="date"
            name="date_of_birth"
            id="date_of_birth"
            v-model="playerDateOfBirth"
            :disabled="isFromAvailable"
          >
        </div>
      </div>
      <div class="field">
        <label class="label" for="position">Pozycja</label>
        <div class="select">
          <select v-model="playerPosition">
            <option
              v-for="position in positions"
              :value="position.id"
              :key="position.id"
            >{{position.name}}</option>
          </select>
        </div>
      </div>
      <div class="field">
        <label class="label" for="goals">Gole</label>
        <div class="control">
          <input class="input" type="number" name="goals" id="goals" v-model="playerGoals">
        </div>
      </div>
      <div class="field">
        <label class="label" for="assists">Asysty</label>
        <div class="control">
          <input class="input" type="number" name="assists" id="assists" v-model="playerAssists">
        </div>
      </div>
      <div class="field">
        <label class="label" for="yellow_cards">Żółte kartki</label>
        <div class="control">
          <input
            class="input"
            type="number"
            name="yellow_cards"
            id="yellow_cards"
            v-model="playerYellowCards"
          >
        </div>
      </div>
      <div class="red_cards">
        <label class="label" for="goals">Czerwone kartki</label>
        <div class="control">
          <input
            class="input"
            type="number"
            name="red_cards"
            id="red_cards"
            v-model="playerRedCards"
          >
        </div>
      </div>
      <button
        class="button is-primary"
        :style="{marginTop: '20px'}"
        @click.prevent="addPlayer"
      >Dodaj Zawodnika</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["team"],
  data() {
    return {
      isFromAvailable: false,
      availablePlayers: [],
      positions: [],
      selectedPlayer: "",
      playerName: "",
      playerSurname: "",
      playerDateOfBirth: "",
      playerId: "",
      playerPosition: "",
      playerGoals: 0,
      playerAssists: 0,
      playerYellowCards: 0,
      playerRedCards: 0
    };
  },
  computed: {},
  methods: {
    fetchAvailablePlayers() {
      if (!this.isFromAvailable) {
        axios
          .get(`/api/team/allPlayers`)
          .then(response => {
            if (!this.isFromAvailable) {
              this.availablePlayers = response.data;
              this.isFromAvailable = true;
            }
          })
          .catch(error => console.log(error));
      } else {
        this.isFromAvailable = false;
        this.playerId = "";
      }
    },
    fetchPositions() {
      axios
        .get("/api/positions")
        .then(response => (this.positions = response.data))
        .catch(error => console.log(error));
    },
    addPlayer(e) {
      let url = "";
      if (this.playerId !== "") {
        url = `/${this.playerId}`;
      }
      axios
        .post(`/api/team/addPlayer${url}`, {
          first_name: this.playerName,
          surname: this.playerSurname,
          date_of_birth: this.playerDateOfBirth,
          position_id: this.playerPosition,
          team: this.team,
          goals: this.playerGoals,
          assists: this.playerAssists,
          yellow_cards: this.playerYellowCards,
          red_cards: this.playerRedCards
        })
        .then(response => {
          if (response.data === true) {
            this.$parent.fetchPlayers();
          }
        })
        .catch(error => console.log(error));
    },
    choosePlayer(e) {
      let id = e.target.value;
      let currentPlayer = this.availablePlayers.filter(player => {
        if (player.id == id) {
          return player;
        }
      });
      if (currentPlayer.length > 0 && currentPlayer.length < 2) {
        this.playerName = currentPlayer[0].first_name;
        this.playerSurname = currentPlayer[0].surname;
        this.playerDateOfBirth = currentPlayer[0].date_of_birth;
        this.playerId = currentPlayer[0].id;
      }
    }
  },
  created() {
    this.fetchPositions();
  }
};
</script>

<style lang="scss" scoped>
.player_form {
  margin-top: 20px;
  @media (min-width: 576px) {
    max-width: 500px;
  }
}
</style>
