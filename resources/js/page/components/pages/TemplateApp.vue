<template>
  <div class="page">
    <!-- <slot name="title"></slot> -->
    <!-- <header class="page__header">
      <h2 class="page__title">{{title}}</h2>
    </header>-->
    <main>
      <slot name="content"></slot>
    </main>
  </div>
</template>

<script>
export default {
  props: ["title"],
  name: "template-app"
};
</script>

