<template>
  <aside class="aside-bar">
    <div class="content">
      <table-league team="seniorzy" :isSmall="true"/>
      <active-fixture/>
    </div>
  </aside>
</template>

<script>
import TableLeague from "../../../shared-components/TableLeague";
import ActiveFixture from "../../../shared-components/ActiveFixture";
export default {
  components: { TableLeague, ActiveFixture }
};
</script>
