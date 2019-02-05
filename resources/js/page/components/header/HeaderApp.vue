<template>
  <div class="header">
    <div class="logo">
      <a href="/">
        <img class="logo__img logo__img--header" :src="'/images/logo/logo.png'" alt>
      </a>
    </div>
    <hamburger></hamburger>
    <menu-list/>
  </div>
</template>

<script>
import Hamburger from "../menu/Hamburger";
import MenuList from "../menu/MenuList";
export default {
  name: "header-app",
  components: { Hamburger, MenuList }
};
</script>

<style lang="scss">
</style>
