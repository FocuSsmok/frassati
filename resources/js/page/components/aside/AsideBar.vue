<template>
  <aside class="aside-bar">
    <div class="aside-bar__content">
      <div>
        <header>
          <h4 class="aside-bar__title-table">Tabela</h4>
        </header>
        <table-league team="seniorzy" :isSmall="true" :ownClass="['aside-bar__table']"/>
      </div>
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
