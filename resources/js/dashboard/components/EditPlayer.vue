<template>
  <tr>
    <table-field :value="player.first_name"></table-field>
    <td>
      {{player.first_name}}
      <input v-model="player.first_name">
    </td>
    <td>{{player.surname}}</td>
    <td>{{player.date_of_birth}}</td>
    <td>{{player.goals}}</td>
    <td>{{player.assists}}</td>
    <td>{{player.yellow_cards}}</td>
    <td>{{player.red_cards}}</td>
    <td>
      <button>Zapisz zmiany</button>
    </td>
  </tr>
</template>

<script>
import TableField from "./TableField";
export default {
  name: "edit-player",
  props: ["player"],
  components: { TableField }
};
</script>

<style lang="scss">
</style>
