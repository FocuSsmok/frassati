<template>
  <header>
    <h2 class="page_title">{{title}}</h2>
  </header>
</template>

<script>
export default {
  props: ["title"],
  name: "page-title"
};
</script>
