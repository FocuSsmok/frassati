<template>
  <div class="active-fixture">
    <div class="fixture">
      <div class="fixture__change">
        <span
          class="fixture__last fixture__arrow"
          :class="arrow === 'last'?'last':''"
          @click="changeFixture('last')"
        >Poprzednia</span>
        <!-- v-if="arrow === 'last'" -->
        <span
          class="fixture__next fixture__arrow"
          @click="changeFixture('next')"
          :class="arrow === 'next'?'next':''"
        >Następna</span>
        <!-- v-else -->
      </div>
      <h4 class="fixture__title">Kolejka {{fixtureNum}}</h4>
      <ul>
        <li class="fixture__row" v-for="(fixture, index) in currentFixture" :key="index">
          <span class="fixture__col fixture__col--team fixture__col--home">{{fixture.home_team}}</span>
          <span class="fixture__col fixture__col--right">{{fixture.home_goals}}</span>
          <span>:</span>
          <span class="fixture__col fixture__col--away">{{fixture.away_goals}}</span>
          <span class="fixture__col fixture__col--team">{{fixture.away_team}}</span>
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
