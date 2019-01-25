<template>
  <td>
    <span @click="editTableData" class="edit">edit</span>
    <span v-if="!isEditing">{{value}}</span>
    <input type="text" v-model="value" v-if="isEditing">
  </td>
</template>

<script>
export default {
  name: "table-field",
  props: ["value"],
  data() {
    return {
      isEditing: false
    };
  },
  methods: {
    editTableData() {
      this.isEditing = !this.isEditing;
    }
  }
};
</script>

<style lang="scss">
</style>
