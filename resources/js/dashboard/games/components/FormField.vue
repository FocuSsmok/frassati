<template>
  <div class="field">
    <label :for="name">{{label}}</label>
    <input
      :type="type"
      class="input"
      :name="name"
      :value="value"
      @input="$emit('input', $event.target.value)"
    >
  </div>
</template>

<script>
export default {
  name: "form-field",
  props: ["name", "type", "label", "value"]
};
</script>

