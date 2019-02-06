<template>
  <template-app>
    <template slot="content">
      <div class="table-wrapper">
        <page-title :title="'Tabela '+team"/>
        <table-league :isSmall="false" :team="team"/>
      </div>
    </template>
  </template-app>
</template>

<script>
import PageTitle from "../title/PageTitle";
import TemplateApp from "../TemplateApp";
import TableLeague from "../../../../shared-components/TableLeague";
export default {
  name: "team-table",
  data() {
    return { team: this.$route.params.team };
  },
  watch: {
    $route(to, from) {
      this.team = to.params.team;
    }
  },
  components: { TableLeague, TemplateApp, PageTitle }
};
</script>

