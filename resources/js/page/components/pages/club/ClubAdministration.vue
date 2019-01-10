<template>
  <div>
    <template-app :title="'Zarząd'">
      <template slot="content">
        <table class="table is-striped">
          <tr>
            <th colspan="2">Zarząd Klubu</th>
          </tr>
          <tr>
            <td>Prezes:</td>
            <td>Wiesław Policha</td>
          </tr>
          <tr>
            <td>Skarbnik:</td>
            <td>Bartłomiej Sałaga</td>
          </tr>
          <tr>
            <td>Sekretarz:</td>
            <td>Adam Błaziak</td>
          </tr>
          <tr>
            <td>Wizeprezes d/s sportu:</td>
            <td>Piotr Trała</td>
          </tr>
          <tr>
            <td>Wizeprezes d/s organizacyjnych:</td>
            <td>Zbigniew Salecki</td>
          </tr>
          <tr>
            <td>Członek zarządu:</td>
            <td>Krzysztof Madeja</td>
          </tr>
        </table>
      </template>
    </template-app>
  </div>
</template>

<script>
import TemplateApp from "../TemplateApp";
export default {
  name: "club-administartion",
  components: { TemplateApp }
};
</script>
