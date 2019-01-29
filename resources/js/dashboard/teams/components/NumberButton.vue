<template>
  <fragment>
    <button @click="changeNumber">{{type === "increment" ? "+" : "-"}}</button>
  </fragment>
</template>

<script>
export default {
  name: "number-button",
  props: ["type"],
  methods: {
    changeNumber() {
      this.$emit("changeNumber", { type: this.type });
    }
  }
};
</script>

