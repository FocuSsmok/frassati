<template>
  <div class="post-wrapper">
    <Post v-for="post in posts" :key="post.id" :post="post"/>
    <!--    <div class="post" v-for="post in posts" :key="post.id">
      <header>
        <h4>
          <span class="post__id">{{post.id}}</span>
          {{post.title}}
        </h4>
      </header>
      <div class="content">{{post.content}}</div>
    </div>-->
    <pagination :pagination="pagination" :offset="5" @paginate="paginate()"/>
  </div>
</template>

<script>
import Pagination from "../pagination/Pagination";
import Post from "./Post";
export default {
  name: "posts2",
  components: { Pagination, Post },
  data() {
    return {
      posts: [],
      pagination: {
        current_page: 1
      }
    };
  },
  methods: {
    fetchPosts() {
      //   page = page.page ? page.page : 1;
      axios
        .get("api/posts?page=" + this.pagination.current_page)
        .then(response => {
          this.posts = response.data.data.data;
          this.pagination = response.data.pagination;
          if (this.pagination.current_page > this.pagination.last_page) {
            this.$router.push("/error/404");
          }
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },
    paginate() {
      // this.pagination.current_page = page.page;
      this.$router.push("/" + this.pagination.current_page);
      this.fetchPosts();
    }
  },
  watch: {
    $route(to, from) {
      if (to.params.page !== "") {
        if (to.params.page > this.pagination.last_page) {
          this.$router.push("/error/404");
        } else {
          this.pagination.current_page = to.params.page;
        }
      }
      this.fetchPosts();
    }
  },
  created() {
    if (this.$route.params.page) {
      this.pagination.current_page = this.$route.params.page;
    }
    this.fetchPosts();
  }
};
</script>

<style lang="scss">
</style>
