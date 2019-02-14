<template>
  <div class="field">
    <label :for="name" class="label">{{label}}</label>
    <div class="control">
      <input
        :type="type"
        class="input"
        :name="name"
        :value="value"
        @input="$emit('input', $event.target.value)"
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "form-field",
  props: ["name", "type", "label", "value"]
};
</script>

