<template>
  <div class="table_league">
    <table class="table table-league" :class="ownClass">
      <thead>
        <tr>
          <th>
            <abbr title="Pozycja">Msc</abbr>
          </th>
          <th>Drużyna</th>

          <th v-if="!isSmall">
            <abbr title="Played">Mecze</abbr>
          </th>
          <th v-if="!isSmall">
            <abbr title="Won">W</abbr>
          </th>
          <th v-if="!isSmall">
            <abbr title="Drawn">D</abbr>
          </th>
          <th v-if="!isSmall">
            <abbr title="Lost">L</abbr>
          </th>
          <th v-if="!isSmall">
            <abbr title="Goals for">GF</abbr>
          </th>
          <th v-if="!isSmall">
            <abbr title="Goals against">GA</abbr>
          </th>
          <th v-if="!isSmall">
            <abbr title="Goal difference">GD</abbr>
          </th>

          <th>
            <abbr title="Points">Pts</abbr>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          :class="team.team === 'PGKS Frassati Fajsławice'? 'is-selected':''"
          v-for="(team, index) in filteredByPlaceTeams"
          :key="index"
        >
          <th>{{++index}}</th>
          <td>{{team.team}}</td>

          <td v-if="!isSmall">{{team.matches}}</td>
          <td v-if="!isSmall">{{team.wins}}</td>
          <td v-if="!isSmall">{{team.draws}}</td>
          <td v-if="!isSmall">{{team.loses}}</td>
          <td v-if="!isSmall">{{team.goals_scored}}</td>
          <td v-if="!isSmall">{{team.goals_against}}</td>
          <td v-if="!isSmall">{{team.goals_diff}}</td>

          <td>{{team.points}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "table-league",
  props: ["team", "isSmall", "ownClass"],
  data() {
    return {
      tableTeams: []
    };
  },
  methods: {
    fetchTable() {
      axios
        .get(`/api/game/table/${this.team}`)
        .then(response => (this.tableTeams = response.data))
        .catch(error => console.log(error));
    }
  },
  computed: {
    filteredByPlaceTeams() {
      const teams = this.tableTeams;
      return teams.sort(function(a, b) {
        if (a.points === b.points) {
          if (b.goals_diff === a.goals_diff) {
            return b.goals_scored - a.goals_scored;
          }
          return b.goals_diff - a.goals_diff;
        }
        return b.points - a.points;
      });
    }
  },
  created() {
    this.fetchTable();
  }
};
</script>

<style lang="scss" scoped>
$greyish: rgba(80, 81, 79, 1);
$redish: rgba(242, 95, 92, 1);
$secondary_color: rgba(255, 224, 102, 1);
$primary_color: rgba(36, 123, 160, 1);
$greenish: rgba(112, 193, 179, 1);
.table {
  // background-color: $primary_color;
  // color: #fff;
  & thead {
    // background-color: $secondary_color;
  }
}
</style>
