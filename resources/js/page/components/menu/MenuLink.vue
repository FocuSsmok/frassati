<template>
  <div class="menu-item">
    <div class="menu-item__wrapper" @click="toggleChildren" :style="indent">
      <a class="menu-item__link" :href="link">{{name}}</a>
      <span>
        <i v-if="submenu" class="fas fa-angle-right menu-item__arrow"></i>
      </span>
    </div>
    <transition name="fade">
      <div
        class="menu-item__submenu"
        v-if="showChildren || width > 768"
        :class="showChildren ? 'menu-item__submenu--show' : ''"
      >
        <menu-link
          v-for="(link, index) in submenu"
          :key="index"
          :name="link.name"
          :is-hidden="link.isHidden"
          :submenu="link.submenu"
          :link="link.url"
          :depth="depth + 1"
        />
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "menu-link",
  props: ["name", "is-hidden", "submenu", "depth", "link"],
  data() {
    return {
      showChildren: false,
      width: 0
    };
  },
  computed: {
    indent() {
      return this.width < 768 ? { paddingLeft: `${this.depth * 50}px` } : "";
    }
  },
  watch: {
    width(newWidth, oldWidth) {
      this.width = newWidth;
    }
  },

  methods: {
    toggleChildren() {
      this.showChildren = !this.showChildren;
    },
    onHover() {
      this.showChildren = !this.showChildren;
    },
    handleResize() {
      this.width = window.innerWidth;
    }
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  destroyed() {
    window.addEventListener("resize", this.handleResize);
  }
};
</script>

<style lang="scss">
.menu-item {
  &__link {
    display: inline-block;
  }
}
@media (max-width: 767px) {
  .fade-enter-active,
  .fade-leave-active {
    transition: max-height 0.5s ease-in-out;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    max-height: 0;
    overflow: hidden;
  }
}
</style>
