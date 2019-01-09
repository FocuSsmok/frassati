<template>
  <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
    <ul class="pagination-list">
      <li v-for="(page, index) in pages" :key="index">
        <a
          class="pagination-link"
          :class="isCurrentPage(page) ? 'is-current' : ''"
          @click.prevent="changePage(page)"
        >{{ page }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: ["pagination", "offset"],
  computed: {
    pages() {
      let pages = [];
      let from = this.pagination.current_page - Math.floor(this.offset / 2);

      if (from < 1) {
        from = 1;
      }

      let to = from + this.offset - 1;

      if (to > this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      while (from <= to) {
        pages.push(from);
        from++;
      }
      return pages;
    }
  },
  methods: {
    isCurrentPage(page) {
      return this.pagination.current_page === page;
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.$emit("paginate", { page });
    }
  }
};
</script>

<style lang="scss">
</style>
