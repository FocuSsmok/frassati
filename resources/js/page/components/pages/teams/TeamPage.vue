<template>
  <div>
    <template-app :title="team">
      <template slot="content">
        <!-- <div v-for="(players, index) in players" :key="index" class="position"> -->
        <table class="table">
          <thead>
            <tr>
              <th>Imię</th>
              <th>Nazwisko</th>
              <th>Gole</th>
              <th>Asysty</th>
              <th>Żółte kartki</th>
              <th>Czerwone kartki</th>
              <th>Pozycja</th>
            </tr>
          </thead>
          <tr v-for="(player, index) in players" :key="index">
            <td>{{player.first_name}}</td>
            <td>{{player.surname}}</td>
            <td>{{player.goals}}</td>
            <td>{{player.assists}}</td>
            <td>{{player.yellow_cards}}</td>
            <td>{{player.red_cards}}</td>
            <td>{{player.position}}</td>
          </tr>
        </table>
        <!-- </div> -->
      </template>
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
      team: this.$route.params.team,
      /*players: [
        {
          position: {
            players: [],
            polishName: "Bramkarz"
          }
        },
        {
          position: {
            players: [],
            polishName: "Obrońca"
          }
        },
        {
          position: {
            players: [],
            polishName: "Pomocnik"
          }
        },
        {
          position: {
            players: [],
            polishName: "Napastnik"
          }
        }
      ],*/
      players: [],
      positions: ["Bramkarz", "Obrońca", "Pomocnik", "Napastnik"]
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
          // let tmpPlayers = response.data;
          // this.players.forEach(el => {
          //   el.position.players = [];
          // });
          // this.players.forEach(el => {
          //   tmpPlayers.forEach(player => {
          //     if (player.position === el.position.polishName) {
          //       el.position.players.push(player);
          //     }
          //   });
          // });
        })
        .catch(error => console.log(error));
    },
    getPlayersByPosition(position) {
      console.log(position);
    }
  }
};
</script>
