<template>
  <div class="post">
    <div class="post__img-wrapper">
      <a :href="url + post.id" class="post__img-link">
        <img class="post__img" :src="post.image" alt>
      </a>
    </div>
    <header class="post__header">
      <h3 class="post__title">
        <a :href="url + post.id">{{post.title}}</a>
      </h3>
    </header>
    <div class="post__info info">
      <span class="post__author info__field">{{post.author}}</span>
      <span class="post__date info__field">{{post.date.substr(0, 10)}}</span>
    </div>
    <div class="post__content" v-html="post.content.substr(0, 200) + '...'"></div>
  </div>
</template>

<script>
export default {
  props: ["post"],
  data() {
    return {
      url: "/post/"
    };
  },
  created() {
    console.log(typeof this.post.date);
  }
};
</script>
