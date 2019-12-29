<template>
  <div class="modal" :class="isActive ? 'is-active' : ''">
    <div class="modal-background"></div>
    <div class="modal-content">
      <div class="player-info">
        <div class="player-info__field">
          <span>ID: {{currentPlayer.player_id}}</span>
        </div>
        <div class="player-info__field field">
          <label class="label" for="first_name">Imię</label>
          <div class="control">
            <input class="input" type="text" name="first_name" v-model="currentPlayer.first_name">
          </div>
        </div>
        <div class="player-info__field field">
          <label class="label" for="surname">Nazwisko</label>
          <div class="control">
            <input class="input" type="text" name="surname" v-model="currentPlayer.surname">
          </div>
        </div>
        <div class="player-info__field field">
          <label for="date" class="label">Data urodzenia:</label>
          <div class="control">
            <input class="input" type="date" v-model="currentPlayer.date_of_birth">
          </div>
        </div>
        <div class="select">
          <select v-model="player.position">
            <option
              v-for="position in positions"
              :value="position.name"
              :key="position.id"
            >{{position.name}}</option>
          </select>
        </div>
        <div class="player-info__field field">
          <label for="goals" class="label">Gole:</label>
          <div class="control">
            <input name="goals" class="input" type="number" v-model="currentPlayer.goals">
          </div>
        </div>
        <div class="player-info__field field">
          <label for="assists" class="label">Asysty:</label>
          <div class="control">
            <input class="input" name="assists" type="number" v-model="currentPlayer.assists">
          </div>
        </div>
        <div class="player-info__field field">
          <label for="yellow_cards" class="label">Żółte kartki</label>
          <div class="control">
            <input
              class="input"
              name="yellow_cards"
              type="number"
              v-model="currentPlayer.yellow_cards"
            >
          </div>
        </div>
        <div class="player-info__field field">
          <label for="red_cards" class="label">Czerwone kartki</label>
          <div class="control">
            <input class="input" name="red_cards" type="number" v-model="currentPlayer.red_cards">
          </div>
        </div>
        <button class="button is-primary" @click="updatePlayer">Zapisz zmiany</button>
      </div>
    </div>
    <button @click="closeModal" class="modal-close is-large" aria-label="close"></button>
  </div>
</template>

<script>
export default {
  name: "modal-edit-player",
  props: ["player", "isActive", "team"],
  data() {
    return {
      currentPlayer: { ...this.player },
      positions: [],
      position: ""
    };
  },
  computed: {},
  methods: {
    closeModal() {
      this.$emit("closeModal");
    },
    fetchPositions() {
      axios
        .get("/api/positions")
        .then(response => {
          this.positions = response.data;
        })
        .catch(error => console.log(error));
    },
    updatePlayer() {
      axios
        .post(
          `/api/team/updatePlayer/${this.team}/${this.currentPlayer.player_id}`,
          { player: this.currentPlayer }
        )
        .then(response => console.log(response.data));
    }
  },
  watch: {
    player() {
      this.currentPlayer = this.player;
    }
  },
  created() {
    this.fetchPositions();
  }
};
</script>

<style lang="scss">
.player-info {
  background-color: #fff;
  padding: 20px;
  max-width: 500px;
  margin: 0 auto;
}
</style>
