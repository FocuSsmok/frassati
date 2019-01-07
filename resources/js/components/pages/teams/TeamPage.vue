<template>
  <div>
    <template-app :title="'Seniorzy'">
      <template slot="content">{{team}}</template>
    </template-app>
  </div>
</template>

<script>
import { mapState } from "vuex";
import TemplateApp from "../TemplateApp";
export default {
  name: "club-info",
  components: { TemplateApp },
  // computed: {
  //   players: state => state.players.players
  // },
  data() {
    return {
      team: this.$route.params.team
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
        .get(`api/team`, { params: { team: this.team } })
        .then(response => console.log(response))
        .catch(error => console.log(error));
    }
  }
};
</script>
