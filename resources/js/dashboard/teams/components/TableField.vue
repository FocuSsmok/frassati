<template>
  <td>
    <span v-if="!isEditable">{{value}}</span>
    <div class="edit__field" v-else>
      <number-button
        type="decrement"
        @changeNumber="changeNumber($event)"
        v-if="type === 'number'"
      />
      <input class="edit__input" :type="type" :value="inputValue" @change="changeValue">
      <number-button
        type="increment"
        @changeNumber="changeNumber($event)"
        v-if="type === 'number'"
      />
    </div>
  </td>
</template>

<script>
import NumberButton from "./NumberButton";
export default {
  name: "table-field",
  props: ["value", "isEditable", "name", "type"],
  data() {
    return {
      isEditing: false,
      inputValue: this.value
    };
  },
  methods: {
    changeValue(event) {
      if (this.type === "number") {
        if (event.target.value > 0) {
          this.inputValue = event.target.value;
        }
      } else {
        this.inputValue = event.target.value;
      }
      this.$emit("changeValue", {
        value: this.inputValue,
        name: this.name
      });
    },
    changeNumber(type) {
      console.log(event.target.value);
      if (type.type === "increment") {
        ++this.inputValue;
      } else {
        if (this.inputValue > 0) {
          --this.inputValue;
        }
      }
      this.$emit("changeValue", {
        value: this.inputValue,
        name: this.name
      });
    }
  },
  created() {},
  components: { NumberButton }
};
</script>

<style lang="scss">
.edit__field {
  display: flex;
  flex-flow: row nowrap;
}
.edit__input[type="number"] {
  max-width: 100px;
}

.edit__input[type="date"] {
  max-width: 200px;
}

.edit__input[type="text"] {
  max-width: 150px;
}
</style>
