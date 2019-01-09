<template>
  <div class="post-wrapper">
    <div class="post" v-for="post in posts" :key="post.id">
      <header>
        <h4>
          <span class="post__id">{{post.id}}</span>
          {{post.title}}
        </h4>
      </header>
      <div class="content">{{post.content}}</div>
    </div>
    <pagination :pagination="pagination" :offset="5" @paginate="paginate($event)"/>
  </div>
</template>

<script>
import Pagination from "../pagination/Pagination";
export default {
  name: "posts2",
  components: { Pagination },
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
          console.log(response.data.data.data);
          this.posts = response.data.data.data;
          this.pagination = response.data.pagination;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },
    paginate(page) {
      this.pagination.current_page = page.page;
      this.$router.push("/" + this.pagination.current_page);
      this.fetchPosts();
    }
  },
  watch: {
    $route(to, from) {
      if (to.params.page) {
        this.pagination.current_page = to.params.page;
      }
    }
  },
  created() {
    this.fetchPosts();
  }
};
</script>

<style lang="scss">
.post-wrapper {
  margin: 20px;
}
.post {
  border: 1px solid #000;
  margin-bottom: 20px;
  max-width: 500px;
  word-wrap: break-word;
  padding: 10px;
  & header h4 {
    font-weight: bold;
  }
  &__id {
    display: inline-block;
    background-color: cadetblue;
    color: #fff;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    text-align: center;
  }
}
</style>
