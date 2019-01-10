<template>
  <div class="footer">
    <div class="footer__wrapper">
      <div class="logo logo--footer">
        <a href="#">
          <img class="logo__img" :src="'./images/logo/logo.png'" alt>
        </a>
      </div>
      <social-media-list/>
      <div class="footer__copyright">Copyright frassati 2019</div>
    </div>
  </div>
</template>

<script>
import SocialMediaList from "../social-media/SocialMediaList";
export default {
  name: "footer-app",
  components: { SocialMediaList }
};
</script>
