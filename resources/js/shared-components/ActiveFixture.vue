<template>
  <div class="active-fixture">
    <div class="fixture">
      <div>
        <span @click="changeFixture('last')" v-if="arrow === 'last'">Poprzednia</span>
        <span v-else @click="changeFixture('next')">Następna</span>
      </div>
      <h4>Kolejka {{fixtureNum}}</h4>
      <ul>
        <li v-for="(fixture, index) in currentFixture" :key="index">
          <span>{{fixture.home_team}}</span>
          <span>{{fixture.home_goals}}</span>
          <span>:</span>
          <span>{{fixture.away_goals}}</span>
          <span>{{fixture.away_team}}</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "active-fixture",
  props: ["team"],
  data() {
    return {
      lastFixture: [],
      nextFixture: [],
      currentFixture: [],
      fixtureNum: "",
      arrow: ""
    };
  },
  methods: {
    fetchRecentlyFixtures() {
      axios
        .get(`/api/game/recentlyFixture`)
        .then(response => {
          this.nextFixture = response.data.next;
          this.lastFixture = response.data.last;
          this.setCurrentFixture();
          console.log(response.data);
        })
        .catch(error => console.log(error));
    },
    setCurrentFixture() {
      if (this.nextFixture.length > 0) {
        for (let i = 0; i < this.nextFixture.length; i++) {
          if (
            typeof this.nextFixture[i].home_goals === "number" &&
            typeof this.nextFixture[i].away_goals === "number"
          ) {
            this.assignValue(
              "last",
              this.nextFixture[0].fixture_num,
              this.nextFixture
            );
          }
        }
        this.assignValue(
          "next",
          this.lastFixture[0].fixture_num,
          this.lastFixture
        );
      } else {
        this.assignValue(
          "next",
          this.lastFixture[0].fixture_num,
          this.lastFixture
        );
      }
    },
    changeFixture(type) {
      if (type === "last" && this.lastFixture.length > 0) {
        this.assignValue(
          "next",
          this.lastFixture[0].fixture_num,
          this.lastFixture
        );
      } else if (type === "next" && this.nextFixture.length > 0) {
        this.assignValue(
          "last",
          this.nextFixture[0].fixture_num,
          this.nextFixture
        );
      }
    },
    assignValue(arrow, num, fixture) {
      this.arrow = arrow;
      this.fixtureNum = num;
      this.currentFixture = fixture;
    }
  },

  created() {
    this.fetchRecentlyFixtures();
  }
};
</script>
