<template>
  <td>
    <span v-if="!isEditable">{{value}}</span>
    <input type="text" :value="inputValue" @change="changeValue" v-else>
  </td>
</template>

<script>
export default {
  name: "table-field",
  props: ["value", "isEditable", "name"],
  data() {
    return {
      isEditing: false,
      inputValue: this.value
    };
  },
  methods: {
    changeValue(event) {
      this.inputValue = event.target.value;
      this.$emit("changeValue", {
        value: this.inputValue,
        name: this.name
      });
    }
  },
  created() {}
};
</script>

<style lang="scss">
</style>
