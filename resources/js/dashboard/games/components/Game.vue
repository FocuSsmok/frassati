<template>
  <h1>{{this.team}}</h1>
</template>

<script>
export default {
  name: "game",
  data() {
    return {
      team: this.$route.params.team
    };
  },
  watch: {
    $route(to, from) {
      console.log(to);
      this.team = to.params.team;
    }
  }
};
</script>

<style lang="scss">
</style>
