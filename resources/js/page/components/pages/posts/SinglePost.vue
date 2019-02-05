<template>
  <article v-if="!fetched" class="single-post">
    <header class="single-post__header">
      <h2 class="single-post__title">{{post.title}}</h2>
      <div class="single-post__details">
        <p>
          Autor:
          <span class="single-post__author">{{post.author}}</span>
          <span class="single-post__date">{{post.date}}</span>
        </p>
      </div>
    </header>
    <div class="single-post__image">
      <img :src="'/'+post.image" alt="image post">
    </div>
    <section class="single-post__content" v-html="post.content"></section>
    <vue-disqus shortname="frassati" :identifier="id" :url="url"></vue-disqus>
  </article>
</template>

<script>
export default {
  data() {
    return {
      post: {},
      fetched: true,
      id: null,
      url: "http://localhost:8000/post/" + this.id
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
          this.post.date = this.post.date.substr(0, 10);
          this.fetched = false;
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
