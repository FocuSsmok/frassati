<template>
  <div class="modal" :class="isActive ? 'is-active' : ''">
    <div class="modal-background"></div>
    <div class="modal-content">
      <div class="player-info">
        <div class="player-info__field">
          <span>{{currentPlayer.player_id}}</span>
        </div>
        <div class="player-info__field">
          <input type="text" v-model="currentPlayer.first_name">
        </div>
        <div class="player-info__field">
          <input type="text" v-model="currentPlayer.surname">
        </div>
        <div class="player-info__field">
          <input type="date" v-model="currentPlayer.date_of_birth">
        </div>
        <select v-model="player.position">
          <option
            v-for="position in positions"
            :value="position.name"
            :key="position.id"
          >{{position.name}}</option>
        </select>
        <div class="player-info__field">
          <input type="number" v-model="currentPlayer.goals">
        </div>
        <div class="player-info__field">
          <input type="number" v-model="currentPlayer.assists">
        </div>
        <div class="player-info__field">
          <input type="number" v-model="currentPlayer.yellow_cards">
        </div>
        <div class="player-info__field">
          <input type="number" v-model="currentPlayer.red_cards">
        </div>
        <button @click="updatePlayer">Zapisz zmiany</button>
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
}
</style>
