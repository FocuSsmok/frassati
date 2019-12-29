<template>
  <div class="game">
    <h1 class="title">Rozgrywki</h1>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "app"
};
</script>

<style lang="scss">
.title {
  color: #293241;
}
</style>
