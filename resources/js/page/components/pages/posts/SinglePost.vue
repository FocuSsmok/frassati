<template>
  <article class="single-post">
    <header class="single-post__header">
      <h2 class="single-post__title">{{post.title}}</h2>
    </header>
    <section class="single-post__content">{{post.content}}</section>
  </article>
</template>

<script>
export default {
  data() {
    return {
      post: {},
      id: null
    };
  },
  watch: {
    $route(to, from) {
      this.id = to.params.id;
    }
  },
  created() {
    this.id = this.$route.params.id;
    this.fetchPost();
  },
  methods: {
    fetchPost() {
      axios
        .get("/api/post?id=" + this.id)
        .then(response => {
          console.log(response);
          this.post = response.data;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  }
};
</script>

<style lang="scss">
</style>
