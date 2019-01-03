<template>
  <div>
    <template-app :title="'Seniorzy'">
      <template slot="content">{{}}</template>
    </template-app>
  </div>
</template>

<script>
import { mapState } from "vuex";
import TemplateApp from "../TemplateApp";
export default {
  name: "club-info",
  components: { TemplateApp },
  computed: {
    players: state => state.players.players
  },
  created() {
    this.$store.dispatch("fetchPlayers");
  }
};
</script>
