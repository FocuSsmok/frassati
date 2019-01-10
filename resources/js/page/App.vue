<template>
  <div class="app">
    <header-app/>
    <router-view></router-view>
    <footer-app/>
  </div>
</template>

<script>
import HeaderApp from "./components/header/HeaderApp";
import FooterApp from "./components/footer/FooterApp";
export default {
  name: "app",
  components: {
    HeaderApp,
    FooterApp
  }
};
</script>

<style lang="scss">
</style>
