<template>
  <div class="main__wrapper">
    <main>
      <posts/>
      <aside-bar/>
    </main>
  </div>
</template>

<script>
import Posts from "../../posts/Posts";
import AsideBar from "../../aside/AsideBar";
export default {
  components: { Posts, AsideBar }
};
</script>

<style lang="scss">
</style>
