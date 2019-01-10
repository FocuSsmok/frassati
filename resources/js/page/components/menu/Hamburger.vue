<template>
  <div class="hamburger" :class="{'hamburger--isActive' : isActive}">
    <button @click="toogleMenu" class="hamburger__button">
      <i v-if="!isActive" class="fas fa-bars"></i>
      <i v-else class="fas fa-times"></i>
    </button>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
export default {
  name: "hamburger",
  computed: {
    ...mapState({
      isActive: state => state.menu.isActive
    })
  },
  methods: {
    ...mapActions({
      toogleMenu: "toogleMenu"
    })
  }
};
</script>

<style lang="scss">
</style>
