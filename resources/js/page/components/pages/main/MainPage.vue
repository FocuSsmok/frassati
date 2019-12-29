<template>
  <template-app>
    <template slot="content">
      <posts/>
    </template>
  </template-app>
</template>

<script>
import TemplateApp from "../TemplateApp";
import Posts from "../../posts/Posts";
export default {
  components: { Posts, TemplateApp }
};
</script>

<style lang="scss">
</style>
