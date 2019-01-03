<template>
  <div class="menu" :class="{'is-active':isActive}">
    <social-media-list/>
    <div class="menu__bottom">
      <menu-link
        v-for="(link, index) in menuLevels"
        :key="index"
        :name="link.name"
        :is-hidden="link.isHidden"
        :submenu="link.submenu"
        :depth="0"
      />
    </div>
  </div>
</template>

<script>
import SocialMediaList from "../social-media/SocialMediaList";
import MenuLink from "./MenuLink";
import { mapState } from "vuex";
export default {
  name: "menu-list",
  computed: {
    ...mapState({
      isActive: state => state.menu.isActive,
      menuLevels: state => state.menu.menuLevels
    })
  },
  components: { MenuLink, SocialMediaList }
};
</script>

<style lang="scss" scoped>
</style>
