<template>
  <div class="modal" :class="isActive ? 'is-active' : ''">
    <div class="modal-background"></div>
    <div class="modal-content">
      <slot name="content"></slot>
    </div>
    <button class="modal-close is-large" @click="closeModal" aria-label="close"></button>
  </div>
</template>

<script>
import AddTeam from "./AddTeam";
export default {
  name: "modal",
  props: ["openModal"],
  data() {
    return {
      isActive: false
    };
  },
  methods: {
    closeModal() {
      this.$emit("closeModal");
    }
  },
  beforeUpdate() {
    this.isActive = this.openModal;
  },
  components: { AddTeam }
};
</script>

<style lang="scss">
.modal-content {
  background: #fff;
  padding: 20px;
  overflow: auto;
}
</style>