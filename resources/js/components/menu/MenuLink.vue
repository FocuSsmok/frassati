<template>
  <div class="menu-item">
    <div class="menu-item__wrapper" :style="indent">
      <a class="menu-item__link" href>{{name}}</a>
      <i @click="toggleChildren" v-if="submenu" class="fas fa-angle-right"></i>
      <menu-link
        v-if="showChildren"
        v-for="(link, index) in submenu"
        :key="index"
        :name="link.name"
        :is-hidden="link.isHidden"
        :submenu="link.submenu"
        :depth="depth + 1"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "menu-link",
  props: ["name", "is-hidden", "submenu", "depth"],
  data() {
    return {
      showChildren: false
    };
  },
  computed: {
    indent() {
      return { transform: `translate(${this.depth * 50}px)` };
    }
  },
  methods: {
    toggleChildren() {
      this.showChildren = !this.showChildren;
    }
  }
};
</script>

<style lang="scss">
.menu-item {
  &__link {
    display: inline-block;
  }
}
</style>
