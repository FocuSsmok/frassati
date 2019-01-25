<template>
  <tr>
    <table-field :isEditable="editable" :value="player.first_name" name="first_name"></table-field>
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="surname"
      :isEditable="editable"
      :value="player.surname"
    ></table-field>
    <!-- <td>
      {{player.first_name}}
      <input v-model="player.first_name">
    </td>
    <td>{{player.surname}}</td>
    <td>{{player.date_of_birth}}</td>
    <td>{{player.goals}}</td>
    <td>{{player.assists}}</td>
    <td>{{player.yellow_cards}}</td>
    <td>{{player.red_cards}}</td>-->
    <td @click="editPlayer">edit</td>
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
  data() {
    return {
      editable: false
    };
  },
  methods: {
    editPlayer() {
      this.editable = !this.editable;
    },
    editPlayerAttributes(event) {
      this.player[event.name] = event.value;
    }
  },
  components: { TableField }
};
</script>

<style lang="scss">
</style>
