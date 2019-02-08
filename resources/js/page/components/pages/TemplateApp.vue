<template>
  <div class="page">
    <main class="page__main">
      <slot name="content"></slot>
    </main>
    <aside-bar/>
  </div>
</template>

<script>
import AsideBar from "../aside/AsideBar";
export default {
  props: ["title"],
  name: "template-app",
  components: { AsideBar }
};
</script>

