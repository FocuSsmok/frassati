<template>
  <a :href="href" class="social-media__icon">
    <i :class="icon"></i>
  </a>
</template>

<script>
export default {
  name: "social-media-item",
  props: ["href", "icon"]
};
</script>
