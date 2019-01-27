<template>
  <tr>
    <td>
      <span>{{player.player_id}}</span>
    </td>
    <table-field :isEditable="editable" :value="player.first_name" name="first_name" type="text"></table-field>
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="surname"
      :isEditable="editable"
      :value="player.surname"
      type="text"
    ></table-field>
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="date_of_birth"
      :isEditable="editable"
      :value="player.date_of_birth"
      type="date"
    />
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="goals"
      :isEditable="editable"
      :value="player.goals"
      type="number"
    />
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="assists"
      :isEditable="editable"
      :value="player.assists"
      type="number"
    />
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="yellow_cards"
      :isEditable="editable"
      :value="player.yellow_cards"
      type="number"
    />
    <table-field
      @changeValue="editPlayerAttributes($event)"
      name="red_cards"
      :isEditable="editable"
      :value="player.red_cards"
      type="number"
    />
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
