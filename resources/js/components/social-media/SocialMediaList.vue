<template>
  <div class="social-media">
    <social-media-item v-for="(icon, index) in icons" :key="index" :icon="icon"/>
  </div>
</template>

<script>
import SocialMediaItem from "./SocialMediaItem";
export default {
  name: "social-media-list",
  data() {
    return {
      icons: ["fab fa-facebook-f", "fab fa-youtube", "fab fa-instagram"]
    };
  },
  components: { SocialMediaItem }
};
</script>
